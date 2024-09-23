<?php

namespace App\Http\Controllers;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Services\EncryptionService;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::leftjoin('generate_lead', 'activities.lead_id', '=', 'generate_lead.id')
            ->select('activities.*', 'generate_lead.product_name', 'generate_lead.probability', 'activities.activity_type') // Assuming 'type' column holds activity type
            ->get()
            ->groupBy('lead_id');
            $users = User::all();
            $currentUser = auth()->user();

        // $dueDate = \Carbon\Carbon::parse($activities->due_date);
        // $daysDiff = \Carbon\Carbon::now()->diffInDays($dueDate, false);
        // return $daysDiff;


        return view('lead.viewactivity', compact('activities','users','currentUser'));
    }

    public function create()
    {
        return view('lead.createactivity');
    }

    public function allActivities()
    {
        try {
            $getAssignedTo = User::orderBy('id', 'DESC')->get();
            return view('lead.activity.index', compact('getAssignedTo'));
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'Something Went wrong!');
        }
    }

    public function AllActivitiesGetLeads(Request $request)
    {
        // Page Length
        $pageNumber = ($request->start / $request->length) + 1;
        $pageLength = $request->length;
        $skip = ($pageNumber - 1) * $pageLength;

        // Page Order
        $orderColumnIndex = $request->order[0]['column'] ?? '0';
        $orderBy = $request->order[0]['dir'] ?? 'desc';

        // Build Query
        $query = Activity::where('status', '0')
            ->whereHas('getLead', function ($query) {
                $query->where('is_lost', '1');
            });

        // Determine Order By Column
        $orderByName = 'activity_type';
        switch ($orderColumnIndex) {
            case '0':
                $orderByName = 'activity_type';
                break;
            case '1':
                $orderByName = 'assigned_to';
                break;
            case '2':
                $orderByName = 'summary';
                break;
            case '3':
                $orderByName = 'due_date';
                break;
            // Add more cases as needed
            default:
                $orderByName = 'activity_type';
                break;
        }
        $query = $query->orderBy($orderByName, $orderBy);

        // Get Total Records
        $recordsTotal = $query->count();

        // Get Filtered Records
        $recordsFiltered = $recordsTotal; // Will be updated after applying search

        // Get Paginated Results
        $activity = $query->with('getLead', 'getUser')->skip($skip)->take($pageLength)->get();

        return response()->json([
            "draw" => $request->draw,
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            'data' => $activity
        ], 200);
    }

    // Update activity status to 'done'
    public function markAsDone($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->status = 1;
        $activity->save();

        return response()->json(['success' => true]);
    }

    // Delete activity
    public function cancelActivity($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();

        return response()->json(['success' => true]);
    }

    // Snooze activity by 7 days
    public function snoozeActivity($id)
    {
        $activity = Activity::findOrFail($id);
        $dueDate = Carbon::parse($activity->due_date);
        $newDueDate = $dueDate->copy()->addDays(7);
        $activity->due_date = $newDueDate->format('Y-m-d');
        $activity->save();

        return response()->json(['success' => true]);
    }

    public function kanbanIndex()
    {
        $activityKanban = Activity::orderBy('id', 'desc')->where('status', '0')
            ->whereHas('getLead', function ($query) {
                $query->where('is_lost', '1');
            })
            ->get();
        $currentUser = auth()->user();
        return view('lead.activity.kanban', compact('currentUser', 'activityKanban'));
    }

    public function activityFilter(Request $request)
    {
        // Get all tags from the request
        $tags = $request->tags ?? [];

        $normalizedTags = array_map('trim', array_map('strtolower', $tags));
        // Initialize variables to determine which filters to apply
        $includeMyActivities = in_array('my activities', $normalizedTags);
        $includeOverdue = in_array('overdue', $normalizedTags);
        $includeToday = in_array('today', $normalizedTags);
        $includeFuture = in_array('future', $normalizedTags);
        $includeDone = in_array('done', $normalizedTags);

        // Start building the query
        $leadsQuery = Activity::query();

        // Apply status filters
        $leadsQuery->where(function ($query) use ($includeOverdue, $includeToday, $includeFuture, $includeDone) {
            if ($includeOverdue) {
                $query->orWhere(function ($query) {
                    $query->where('status', '0')
                        ->where('due_date', '<', now());
                });
            }

            if ($includeToday) {
                $query->orWhere(function ($query) {
                    $query->where('status', '0')->whereDate('due_date', now()->format('Y-m-d'));
                });
            }

            if ($includeFuture) {
                $query->orWhere(function ($query) {
                    $query->where('status', '0')->where('due_date', '>', now());
                });
            }

            if ($includeDone) {
                $query->orWhere(function ($query) {
                    $query->where('status', '1'); // Adjust based on how 'done' is represented in your database
                });
            }
        });

        $currentUserId = auth()->id(); // For Laravel, use auth()->id() or appropriate method for your framework

        // Apply 'My Activities' filter if included
        if ($includeMyActivities) {
            $leadsQuery->where(function ($query) use ($currentUserId) {
                $query->where('assigned_to', $currentUserId)
                    ->where(function ($query) {
                        $query->where('status', '0')
                            ->orWhere('status', '!=', '1'); // Ensure correct logic for 'done' status
                    });
            });
        }

        // Exclude records where related 'getLead' has 'is_lost' set to 2
        $leadsQuery->whereDoesntHave('getLead', function ($query) {
            $query->where('is_lost', 2);
        });

        // Always include necessary relationships
        $leadsQuery->with('getLead', 'getUser');

        // Fetch results
        $generateLeads = $leadsQuery->get();

        // Return results as JSON
        return response()->json([
            'success' => true,
            'data' => $generateLeads
        ], 200);
    }


    public function activityCustomFilter(Request $request)
    {
        // Retrieve filter parameters
        $filterType = $request->input('filterType');
        $operatesValue = $request->input('operatesValue');
        $filterValue = $request->input('filterValue');

        // Create a query
        $query = Activity::whereHas('getLead', function ($q) {
            $q->where('is_lost', 1);
        });

        // Apply filters based on filter type
        switch ($filterType) {
            case 'Action':
                if ($filterValue === 'None') {
                    // Apply filter to only return activities with 'to-do' activity_type
                    $query->where('status', '0')->where('activity_type', 'to-do');
                } else {
                    $query->where('status', '0')->where('activity_type', $operatesValue, $filterValue);
                }
                break;
            case 'Activity Type':
                $query->where('status', 0)->where('activity_type', $operatesValue, $filterValue);
                break;
            case 'Assigned to':
                $AssignedToID = EncryptionService::encrypt($filterValue);
                $user = User::where('email', $AssignedToID)->first();
                $query->whereHas('getUser', function ($q) use ($operatesValue, $AssignedToID) {
                    $q->where('email', $operatesValue, $AssignedToID);
                })->whereHas('getLead', function ($q) {
                    $q->where('is_lost', 1);
                })->where('status', '0');
                break;
            case 'Created on':
                $query->where('status', '0')->whereDate('created_at', $filterValue);
                break;
            case 'Done Date':
                $query->whereDate('done_date', $filterValue);
                break;
            case 'Due Date':
                $query->where('status', '0')->whereDate('due_date', $operatesValue, $filterValue);
                break;
            case 'ID':
                $query->where('status', '0')->where('id', $operatesValue, $filterValue);
                break;
            case 'Last Updated on':
                $query->where('status', 0)->whereDate('updated_at', $operatesValue, $filterValue);
                break;
            case 'Note':
                $query->where('status', '0')->where('note', $operatesValue, $filterValue);
                break;
            case 'Summary':
                $query->where('status', '0')->where('summary', $operatesValue, $filterValue);
                break;
            default:
                // Handle cases where the filterType does not match any case
                break;
        }

        // Execute the query with relationships
        $query->with('getLead', 'getUser');

        // Fetch results
        $customFilter = $query->where('status', '0')->get();

        // Return JSON response
        return response()->json([
            'success' => true,
            'data' => $customFilter
        ], 200);
    }


    public function submitFeedback(Request $request)
    {
        
        $activity = Activity::where('id', $request->activity_id)->first();

        if ($activity) {
            $activity->status_feedback = $request->feedback;
            $activity->status = 1;
            $activity->save();

            return response()->json(['message' => 'Feedback submitted successfully.']);
        }

        return response()->json(['message' => 'Activity not found.'], 404);
    }

    public function feedbackActivityShow($id)
    {
        $activity = Activity::findOrFail($id);
        return response()->json($activity);
    }

    public function feedbackActivityUpdate(Request $request)
    {
        $activity = Activity::find($request->id);
        $activity->activity_type = $request->activity_type;
        $activity->due_date = $request->due_date;
        $activity->summary = $request->summary;
        $activity->assigned_to = $request->assigned_to;
        $activity->note = $request->log_note; // Assuming you want to save this too
        $activity->save();

        return response()->json(['message' => 'Activity updated successfully!', 'status' => $activity->status]);
    }

    public function feedbackActivityDelete($id)
    {
        $activity = Activity::find($id);

        if ($activity) {
            $activity->delete();
            return response()->json(['message' => 'Activity deleted successfully!']);
        } else {
            return response()->json(['message' => 'Activity not found.'], 404);
        }
    }

}
