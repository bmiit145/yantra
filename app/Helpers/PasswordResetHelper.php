<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Services\EncryptionService;
use App\Mail\InviteMail;

class PasswordResetHelper
{
    public static function sendResetPasswordLink($encEmail)
    {
//        $encEmail = EncryptionService::encrypt($email);

        $user = User::where('email', $encEmail)->first();

        if(!$user){
            return false;
        }

        $user->remember_token = Str::random(60);
        $user->email_verified_at = null;
        $user->save();

        $link = route('login.showPassword', ['token' => $user->remember_token]);

        Mail::to($user->email)->send(new InviteMail($link , $user));

        return true;
    }
}
