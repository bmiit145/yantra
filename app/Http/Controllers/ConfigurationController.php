<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityTypes;
use App\Models\RecurringPlans;
use App\Models\Tag;
use App\Models\LostReason;

class ConfigurationController extends Controller
{
    public function index()
    {
        $data = ActivityTypes::all();
        return view('Configuration.activityypes', compact('data'));
    }
    
    public function Store_activity_types(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $activity_types = new ActivityTypes();
        $activity_types->name = $request->name;
        $activity_types->action = $request->activity_type;
        $activity_types->save();
        return redirect()->back()->with('message', 'Activity Type Added Successfully');
    }

    public function update_activity_types($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $activity_types = ActivityTypes::find($id);
        $activity_types->name = $request->name;
        $activity_types->action = $request->activity_type;
        $activity_types->update();
        return redirect()->back()->with('message', 'Activity Type Updated Successfully');
    }

    public function delete_activity_types($id)
    {
        $activity_types = ActivityTypes::find($id);
        $activity_types->delete();
        return redirect()->back()->with('message', 'Activity Type Deleted Successfully');
    }

    public function recurring_index()
    {
        $data = RecurringPlans::all();
        return view('Configuration.recurringplans', compact('data'));

    }

    public function store_recurring(Request $request)
    {
        $request->validate([
            'plan_name' => 'required',
        ]);
        $recurring = new RecurringPlans();
        $recurring->plan_name = $request->plan_name;
        $recurring->months = $request->months;
        $recurring->save();
        return redirect()->back()->with('message', 'Recurring Plan Added Successfully');
    }

    public function update_recurring($id, Request $request)
    {
        $request->validate([
            'plan_name' => 'required',
        ]);
        $recurring = RecurringPlans::find($id);
        $recurring->plan_name = $request->plan_name;
        $recurring->months = $request->months;
        $recurring->update();
        return redirect()->back()->with('message', 'Recurring Plan Updated Successfully');
    }

    public function delete_recurring($id)
    {
        $recurring = RecurringPlans::find($id);
        $recurring->delete();
        return redirect()->back()->with('message', 'Recurring Plan Deleted Successfully');
    }

    public function tag_index()
    {
        $data = Tag::where('tage_type', 2)->get();
        return view('Configuration.tag', compact('data'));
    }

    public function store_tag(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->color = $request->color;
        $tag->tage_type = 2;
        $tag->save();
        return redirect()->back()->with('message', 'Tag Added Successfully');
    }

    public function update_tag($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->color = $request->color;
        $tag->update();
        return redirect()->back()->with('message', 'Tag Updated Successfully');
    }

    public function delete_tag($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()->back()->with('message', 'Tag Deleted Successfully');
    }

    public function lostreasons_index()
    {
        $data = LostReason::all();
        return view('Configuration.lostreasons', compact('data'));
    }

    public function store_lostreasons(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $lostreasons = new LostReason();
        $lostreasons->name = $request->name;
        $lostreasons->save();
        return redirect()->back()->with('message', 'Lost Reason Added Successfully');
    }

    public function update_lostreasons($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $lostreasons = LostReason::find($id);
        $lostreasons->name = $request->name;
        $lostreasons->update();
        return redirect()->back()->with('message', 'Lost Reason Updated Successfully');
    }

    public function delete_lostreasons($id)
    {
        $lostreasons = LostReason::find($id);
        $lostreasons->delete();
        return redirect()->back()->with('message', 'Lost Reason Deleted Successfully');
    }
  
}
