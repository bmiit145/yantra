<?php

namespace App\Http\Controllers;

use App\Helpers\PasswordResetHelper;
use App\Models\User;
use App\Services\EncryptionService;
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

    public function userNewOrUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'sometimes|exists:users,id',
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return $request->ajax() ?
                response()->json(['error' => $validator->errors()->first()], 422) :
                redirect()->back()->withErrors($validator)->withInput();
        }

        $user = $request->input('id') ? User::find($request->input('id')) : new User();
        if (!$user) {
            return $request->ajax() ?
                response()->json(['error' => 'User not found'], 404) :
                redirect()->back()->with('error', 'User not found');
        }

        $user->fill($request->only(['name', 'email']))->save();
        $user->role = 1;
        //    $user->save();

        if (!$request->input('id')) {
            $encEmail = EncryptionService::encrypt($request->input('email'));
            $newUser = User::where('email', $encEmail)->first();
            $res = PasswordResetHelper::sendResetPasswordLink($encEmail);

            if ($res) {
                $response = ['success' => 'User created successfully', 'create' => route('setting.user', ['id' => $newUser->id])];
                return $request->ajax() ? response()->json($response, 200) : redirect()->route('setting.user', ['id' => $newUser->id])->with('success', 'User created successfully');
            }
        }

        $successMessage = ['success' => $request->input('id') ? 'User updated successfully' : 'User created successfully'];
        return $request->ajax() ? response()->json($successMessage, 200) : redirect()->back()->with('success', $successMessage['success']);
    }

}
