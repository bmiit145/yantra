<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Experience;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = Employee::all();
        return view('employees.index', compact('employee'));
    }

    public function show($id)
    {
        $employee = Employee::find($id);
        $experiences = Experience::all(); 
        $experience = Experience::where('employee_id', $id)->first(); 
    
        return view('employees.create', ['employee' => $employee, 'experience' => $experience, 'experiences' => $experiences]);
    }
    
    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        // Find the employee by ID, or create a new instance
        $employee = Employee::find($request->input('employee_id')); 
        if (!$employee) {
            $employee = new Employee();
        }

        // Update or set employee details
        $employee->name = $request->input('name');
        $employee->job_title = $request->input('job_title');
        $employee->work_mobile = $request->input('work_mobile');
        $employee->work_phone = $request->input('work_phone');
        $employee->work_email = $request->input('work_email');
        $employee->tags = $request->input('tags');
        $employee->department = $request->input('department');
        $employee->job_position = $request->input('job_position');
        $employee->manager = $request->input('manager');
        $employee->coach = $request->input('coach');

        // Handle image deletion and upload
        if ($request->input('delete_image')) {
            if ($employee->profile_image && file_exists(public_path('uploads/' . $employee->profile_image))) {
                unlink(public_path('uploads/' . $employee->profile_image));
            }
            $employee->profile_image = null;
        } elseif ($request->hasFile('profile_image')) {
            if ($employee->profile_image && file_exists(public_path('uploads/' . $employee->profile_image))) {
                unlink(public_path('uploads/' . $employee->profile_image));
            }

            $file = $request->file('profile_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);

            $employee->profile_image = $filename;
        }

        if ($employee->save()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }

        
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, $id)
    {
       //
    }    

    public function destroy(string $id)
    {
        $employee = Experience::findOrFail($id); 
        $employee->delete(); 
        return back();
    }

    public function getEmployeeNames()
    {
        $employees = Employee::select('id', 'name')->get();
        return response()->json($employees);
    }

     // Handle Save & Close
    public function save(Request $request)
    {
        $experience = Experience::find($request->input('experience_id')) ?? new Experience();

        $data = [
            'employee_id' => $request->input('experience_id'), 
            'title' => $request->input('experience_title'),
            'start_date' => $request->input('experience_start_date'),
            'end_date' => $request->input('experience_end_date'),
            'type' => $request->input('experience_type'),
            'display_type' => $request->input('experience_display_type'),
            'description' => $request->input('experience_description'),
        ];

        $experience->fill($data)->save();

        return response()->json(['success' => true]);
    }

    // Handle Discard
    public function discard(Request $request)
    {
        return response()->json(['success' => true]);
    }



}
