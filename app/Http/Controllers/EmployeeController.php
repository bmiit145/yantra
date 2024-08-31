<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Experience;
use Illuminate\Support\Facades\Storage;
use App\Models\Skill;
use App\Models\SkillLevel;
use App\Models\SkillType;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    // EMPLOYEE SECTION START------------------------------------------------

    public function index()
    {
        $employee = Employee::all();
        return view('employees.index', compact('employee'));
    }

    public function show($id)
    {
        $skillTypes = SkillType::all();
        $skills = Skill::where('skill_type_id', $id)->get();
        $skillLevels = SkillLevel::where('skill_type_id', $id)->get();

        $employee = Employee::find($id);
        $experiences = Experience::where('employee_id', $id)->get();
<<<<<<< HEAD

        $skillTypes = SkillType::all(); 
        $skills = Skill::all(); 
        $skillLevels = SkillLevel::all(); 

=======
>>>>>>> d1415120bf6556097ea9c8cf15b63dce9c167815
        return view('employees.create', ['employee' => $employee, 'experiences' => $experiences] , compact('skillTypes', 'skills', 'skillLevels'));
    }

    public function create()
    {
        $skillTypes = SkillType::with(['skills', 'skillLevels'])->get();
        return view('employees.create', compact('skillTypes'));
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
    // EMPLOYEE SECTION END------------------------------------------------


    // EXPERIENCE SECTION START------------------------------------------------
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
            'employee_id' => $request->input('employee_id'),
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
    // EXPERIENCE SECTION END------------------------------------------------


    // SKILLS SECTION START--------------------------------------------------
    
    public function skill_add($skillType)
    {
        if ($skillType == 'new' || $skillType == null) {
            return view('employees.configuration.skill_type.add');
        }

        $skillType = SkillType::findOrFail($skillType); 
        $skills = Skill::where('skill_type_id', $skillType->id)->get();
        $skillLevels = SkillLevel::where('skill_type_id', $skillType->id)->get();

        return view('employees.configuration.skill_type.add', compact('skills', 'skillType', 'skillLevels'));
    }


    public function skill_view()
    {
        $skillTypes = SkillType::with(['skills', 'skillLevels'])->get();
        
        return view('employees.configuration.skill_type.index', compact('skillTypes'));
    }
    


    public function skill_store(Request $request)
    {
        $skillType = SkillType::find($request->skill_type_id) ?? new SkillType();
        $skillType->name = $request->name;
        $skillType->user_id = Auth::id();
        $skillType->save();

        // Handle Skills
        $skills = $request->input('skills', []);
        foreach ($skills as $skill) {
            $skillModel = Skill::find($skill['id']) ?? new Skill();
            $skillModel->skill_type_id = $skillType->id;
            $skillModel->name = $skill['name'];
            $skillModel->sequence = $skill['sequence'] ?? 0;
            $skillModel->save();
        }

        // Handle SkillLevels
        $skillLevels = $request->input('skill_levels', []);
        foreach ($skillLevels as $skillLevel) {
            $skillLevelModel = SkillLevel::find($skillLevel['id']) ?? new SkillLevel();
            $skillLevelModel->skill_type_id = $skillType->id;
            $skillLevelModel->name = $skillLevel['name'];
            $skillLevelModel->level = $skillLevel['level'];
            $skillLevelModel->is_default = $skillLevel['is_default'] ?? 0;
            $skillLevelModel->save();
        }

        return response()->json(['success' => true, 'skillType' => $skillType]);
    }


    public function skillLevelDelete($id)
    {
        $skillLevel = SkillLevel::find($id);

        if ($skillLevel) {
            $skillLevel->delete();
            return response()->json(['success' => true, 'message' => 'Skill level deleted successfully.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Skill level not found.'], 404);
        }
    }

    public function skill_delete($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();

        return response()->json(['success' => true]);
    }

    public function saveSelectedSkill(Request $request)
    {
        dd('saveSelectedSkill');
        // Validate the incoming data
        $request->validate([
            'skill_type' => 'required',
            'skill_name' => 'required|string|max:255',
            'skill_level' => 'required|string|max:255',
        ]);

        // Create or update the skill in the database
        Skill::create([
            'skill_type' => $request->skill_type,
            'skill_name' => $request->skill_name,
            'skill_level' => $request->skill_level,
        ]);

        // Return a success response
        return response()->json(['message' => 'Skill saved successfully'], 200);
    }

    public function getSkillsByType(Request $request)
    {
        $skillTypeId = $request->get('skill_type_id');

        $skills = Skill::where('skill_type_id', $skillTypeId)->get();

        $assign_skilllevel = SkillLevel::where('skill_type_id', $skillTypeId)->get();
        $skillLevels = SkillLevel::where('skill_type_id', $skillTypeId)->get();
        
        

        return response()->json([
            'skills' => $skills,
            'skill_levels' => $skillLevels,
            'assign_skilllevel' => $assign_skilllevel
        ]);
    }


}
