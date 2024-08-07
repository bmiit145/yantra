<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employees.index');
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        // dd('store:', $request->all());
        $employee = new Employee();
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

        // Save the uploaded image
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $employee->image = $filename;
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
}
