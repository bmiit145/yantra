<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Services\EncryptionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InviteMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Helpers\PasswordResetHelper;


class SettingController extends Controller
{
    public function index()
    {
        $panddingUsers = User::where('email_verified_at' , null)
            ->where('role' , '!=' , 2 )
            ->get();

        $totalUsers = User::where('role' , '!=' , 2)->count();

        return view('settings.index' , compact('panddingUsers' , 'totalUsers'));
    }

    public function userIndex()
    {
        $users = User::where('role' , '!=' , 2)->get();

        return view('settings.users.index' , compact('users'));
    }

    public function UserEdit($id = null)
    {
        $user = $id ? User::find($id) : new User();
        return view('settings.users.edit' , compact('user'));
    }

    public function usercreate()
    {
        return view('settings.users.create');
    }

    public function invitMail(Request $request)
    {
        $email = $request->input('mail');

        //check for email
        $encEmail = EncryptionService::encrypt($email);

        $exuser = User::where('email', $encEmail)->first();

        if($exuser){
            return redirect()->back()->with('error', 'User already Exits!');
        }

        // dd($email);
        $name = strstr($email, '@', true);
        $user = new User;
        $user->email = $email;
        $user->name = $name;
        $user->role = 1;
        $user->save();

        $response = PasswordResetHelper::sendResetPasswordLink($encEmail);

//        $link = route('login.showPassword', ['token' => $user->remember_token]);

//        Mail::to($email)->send(new InviteMail($link , $user));

        if(!$response){
            return redirect()->back()->with('error', 'User Not Found!');
        }

        return redirect()->back()->with('success', 'Invitation sent successfully!');
    }

    public function showPassword($token)
    {
        $user = User::where('remember_token' , $token)->first();
        if(!$user){
            // return 404 error
            return redirect()->route('error_404')->with('error', 'User Not Found!');
        }
        return view('settings.users.passowrdupdate', compact('user'));
    }

    public function resetPassword($email){

        if (!$email) {
            return back()->with('error', 'Invalid Email.');
        }

        $encEmail = EncryptionService::encrypt($email);

        $response = PasswordResetHelper::sendResetPasswordLink($encEmail);

//        $link = route('login.showPassword', ['token' => $user->remember_token]);

//        Mail::to($email)->send(new InviteMail($link , $user));

        if(!$response){
            return redirect()->route('error_404')->with('error', 'User Not Found!');
        }

        return redirect()->back()->with('success', 'reset link sent successfully!');
    }

    public function updatePassword(Request $request)
    {
        // $request->validate([
        //     'password' => 'required|confirmed|min:8',
        //     'token' => 'required'
        // ]);

        // Find user by remember_token
        $user = User::where('remember_token', $request->token)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Invalid token.');
        }

        // Update password
        $user->password = Hash::make($request->input('password'));
        $user->is_confirmed = true;
        $user->remember_token = null;
        $user->email_verified_at = now();
        $user->update();

        // Redirect to showPassword route with token
        return redirect()->route('loginPage')
                        ->with('success', 'Password updated successfully.');
    }

    public function error_404()
    {
        return view('errors.404');
    }

    public function error_500()
    {
        return view('errors.500');
    }

}
