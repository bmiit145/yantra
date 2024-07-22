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
        $panddingUsers = User::where('email_verified_at' , null)
            ->where('role' , '!=' , 2 )
            ->get();

        return view('settings.index' , compact('panddingUsers'));
    }

    public function userIndex()
    {
        return view('settings.users.index');
    }

    public function usercreate()
    {
        return view('settings.users.create');
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
