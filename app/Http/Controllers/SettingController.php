<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InviteMail;
use Illuminate\Support\Str;

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

        

       
        $link = route('login.updatePassword', ['id' => $user->remember_token]);
       

       
        Mail::to($email)->send(new InviteMail($link , $user));

        return redirect()->back()->with('success', 'Invitation sent successfully!');
    }

    public function updatePassword($id)
    {
        dd($id, "11111");
        $user = User::where('remember_token' , $id)->first();
        return view('settings.users.passowrdupdate', compact('user'));
    }

}
