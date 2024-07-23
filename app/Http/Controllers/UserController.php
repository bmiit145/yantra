<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = User::where('role', '!=', 2);

        return DataTables::of($users)
//            ->addIndexColumn()
////            ->editColumn('status', function($row) {
////                return $row->is_confirmed != null
////                    ? '<span class="badge rounded-pill text-bg-success">Confirmed</span>'
////                    : '<span class="badge rounded-pill text-bg-info">Never Connected</span>';
////            })
//            ->rawColumns(['status'])
            ->make(true);

    }

    public function userUpdate(Request $request){


        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::find($request->input('id'));
        if (!$user) {
            if($request->ajax()){
                return response()->json(['error' => 'User not found'], 404);
            }
            return redirect()->back()->with('error', 'User not found');
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        if($request->ajax()){
            return response()->json(['success' => 'User updated successfully'], 200);
        }
        return redirect()->back()->with('success', 'User updated successfully');
    }
}
