<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InviteMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index()
    {
        return view('settings.index');
    }

    public function userIndex()
    {
        return view('settings.users.index');
    }

    public function usercreat()
    {
        return view('settings.users.creat');
    }

    public function invitMail(Request $request)
    {
        $email = $request->input('mail');
        $name = strstr($email, '@', true);

        $user = new User;
        $user->email = $email;
        $user->name = $name; 
        $user->role = 1; 
        $user->remember_token = Str::random(60);
        $user->save();
       
        $link = route('login.showPassword', ['token' => $user->remember_token]);
       
        Mail::to($email)->send(new InviteMail($link , $user));

        return redirect()->back()->with('success', 'Invitation sent successfully!');
    }

    public function showPassword($token)
    {
        $user = User::where('remember_token' , $token)->first();
        return view('settings.users.passowrdupdate', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        // $request->validate([
        //     'password' => 'required|confirmed|min:8',
        //     'token' => 'required'
        // ]);

        // Find user by remember_token
        $user = User::where('remember_token', $request->token)->first();
        // dd($user->toArray());

        if (!$user) {
            return redirect()->back()->with('error', 'Invalid token.');
        }

        // Update password
        $user->password = Hash::make($request->input('password'));
        $user->update();

        // Redirect to showPassword route with token
        return redirect()->route('loginPage')
                        ->with('success', 'Password updated successfully.');
    }



}
