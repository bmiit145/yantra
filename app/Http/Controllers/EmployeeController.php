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
        return view('employees.create', ['employee' => $employee]);
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        // Find or create the employee record
        $employee = Employee::find($request->input('employee_id')); 
        if (!$employee) {
            $employee = new Employee();
        }
    
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
    
        // Check if the request indicates that the image should be deleted
        if ($request->input('delete_image')) {
            // Delete old image if exists
            if ($employee->profile_image && file_exists(public_path('uploads/' . $employee->profile_image))) {
                unlink(public_path('uploads/' . $employee->profile_image));
            }
            // Set profile_image to null
            $employee->profile_image = null;
        } elseif ($request->hasFile('profile_image')) {
            // Handle new image upload
            // Delete old image if exists
            if ($employee->profile_image && file_exists(public_path('uploads/' . $employee->profile_image))) {
                unlink(public_path('uploads/' . $employee->profile_image));
            }
    
            // Save new image
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

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function getEmployeeNames()
    {
        $employees = Employee::select('id', 'name')->get();
        return response()->json($employees);
    }

     // Handle Save & Close
    public function saveAndClose(Request $request)
    {
        // dd($request->all());
        $data = [
            'employee_id' => $request->input('experience_id'), 
            'title' => $request->input('experience_title'),
            'start_date' => $request->input('experience_start_date'),
            'end_date' => $request->input('experience_end_date'),
            'type' => $request->input('experience_type'),
            'display_type' => $request->input('experience_display_type'),
            'description' => $request->input('experience_description'),
        ];

        // Create a new experience record
        Experience::create($data);

        return response()->json(['success' => true]);
    }

    // Handle Save & New
    public function saveAndNew(Request $request)
    {
        // Validate and save the data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'employee_id' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'type' => 'required|string',
            'display_type' => 'required|string',
            'description' => 'nullable|string',
        ]);

        // Save the data
        Experience::create($validatedData);

        return response()->json(['success' => true]);
    }

    // Handle Discard
    public function discard(Request $request)
    {
        // You might not need to do anything specific for discard other than closing the modal
        return response()->json(['success' => true]);
    }



}
