<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\FailedAttempt;
use App\Models\User;
use App\Services\EncryptionService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $maxAttempts = 3; // Max failed attempts
    protected $lockoutTime = 10; // Lockout time in minutes

    public function  loginPage()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

//    public function login(Request $request)
//    {
////        dd($request->all());
//        $validator = Validator::make($request->all(), [
//            'email' => 'required|email',
//            'password' => 'required|min:8',
//        ]);
//
//        if ($validator->fails()) {
//            return redirect()->back()->withErrors($validator)->withInput();
//        }
//
//        $credentials = $request->only('email', 'password');
////        $credentials['email'] = Crypt::encryptString($credentials['email']);
//        $credentials['email'] = EncryptionService::encrypt($credentials['email']);
//
//        if (Auth::attempt($credentials)) {
//            $request->session()->regenerate();
//
//            // add last login time and ip
//            $user = Auth::user();
//            $user->last_login_at = now();
//            $user->last_login_ip = $request->ip();
//            $user->save();
//
//            return redirect()->intended('dashboard');
//        }
//
//        return back()->withErrors([
//            'email' => 'The provided credentials do not match our records.',
//        ]);
//    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $email = EncryptionService::encrypt($request->input('email'));
        $credentials = [
            'email' => $email,
            'password' => $request->input('password'),
        ];

        $failedAttempt = FailedAttempt::where('email', $email)->first();

        if ($failedAttempt && $failedAttempt->locked_until && Carbon::now()->lt(Carbon::parse($failedAttempt->locked_until))) {
//            $minutesLeft = (Carbon::now()->diffInMinutes(Carbon::parse($failedAttempt->locked_until)));
//            return redirect()->back()->withErrors(['email' => "Too many failed attempts. Try again in $minutesLeft minutes."]);

            $lockoutTime = Carbon::parse($failedAttempt->locked_until)->diffForHumans(null, true, false);
            return redirect()->back()->withErrors(['email' => "Too many failed attempts. Try again in $lockoutTime."]);

        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            $user->last_login_at = now();
            $user->last_login_ip = $request->ip();
            $user->save();

            FailedAttempt::where('email', $email)->delete();

            return redirect()->intended('dashboard');
        }

        $this->recordFailedAttempt($email);

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    protected function recordFailedAttempt($email)
    {
        $failedAttempt = FailedAttempt::where('email', $email)->first();

        if ($failedAttempt) {
            $attempts = $failedAttempt->attempts + 1;
            $lockoutUntil = null;

            if ($attempts >= $this->maxAttempts) {
                $lockoutUntil = Carbon::now()->addMinutes($this->lockoutTime);
                $attempts = 0; // Reset attempts after lockout
            }

            $failedAttempt->update([
                'attempts' => $attempts,
                'last_attempt_at' => Carbon::now(),
                'locked_until' => $lockoutUntil,
            ]);
        } else {
            FailedAttempt::create([
                'email' => $email,
                'attempts' => 1,
                'last_attempt_at' => Carbon::now(),
            ]);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
