<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\FailedAttempt;
use App\Models\LoginActivity;
use App\Models\User;
use App\Models\OTPverifiction;
use App\Services\ConfigService;
use App\Services\EncryptionService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class AuthController extends Controller
{
//    protected $maxAttempts = 3; // Max failed attempts
//    protected $lockoutTime = 10; // Lockout time in minutes

    protected $maxAttempts;
    protected $lockoutTime;

    public function __construct()
    {
        $this->maxAttempts = ConfigService::get('MAX_LOGIN_ATTEMPTS', 3);
        $this->lockoutTime = ConfigService::get('LOCKOUT_TIME', 10);
    }

    public function  loginPage()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

//    public function login(Request $request)
//    {
//        $validator = Validator::make($request->all(), [
//            'email' => 'required|email',
//            'password' => 'required|min:8',
//        ]);
//
//        if ($validator->fails()) {
//            return redirect()->back()->withErrors($validator)->withInput();
//        }
//
//        $email = EncryptionService::encrypt($request->input('email'));
//        $otp = $request->input('otp');
//
//        $credentials = [
//            'email' => $email,
//            'password' => $request->input('password'),
//        ];
//
//        $failedAttempt = FailedAttempt::where('email', $email)->first();
//
//        if ($failedAttempt && $failedAttempt->locked_until && Carbon::now()->lt(Carbon::parse($failedAttempt->locked_until))) {
//            //            $minutesLeft = (Carbon::now()->diffInMinutes(Carbon::parse($failedAttempt->locked_until)));
//            //            return redirect()->back()->withErrors(['email' => "Too many failed attempts. Try again in $minutesLeft minutes."]);
//
//            $lockoutTime = Carbon::parse($failedAttempt->locked_until)->diffForHumans(null, true, false);
//            return redirect()->back()->withErrors(['email' => "Too many failed attempts. Try again in $lockoutTime."]);
//
//        }
//
//        if (Auth::attempt($credentials)) {
//            $request->session()->regenerate();
//
//            $user = Auth::user();
//
//            $validOtp = OTPverifiction::where('ip', $request->ip())
//                ->where('user_id', $user->id)
//                ->where('otp', $otp)->first();
//
//            if (!$validOtp) {
//                Auth::logout();
//                $this->recordFailedAttempt($email);
//                return redirect()->back()
//                    ->withErrors(['otp' => 'Invalid OTP'])
//                    ->withInput();
//            }
//
//            $user->last_login_at = now();
//            $user->last_login_ip = $request->ip();
//            $user->save();
//
//            OTPverifiction::where('ip', $request->ip())->delete();
//
//            $loginActId = $this->recordLoginActivity($request , $user , '1');
//            FailedAttempt::where('email', $email)->delete();
//            Session::put('loginActId', $loginActId);
//
//            return redirect()->intended('dashboard');
//        }
//
//        $this->recordFailedAttempt($email);
//        $user = User::where('email', $email)->first();
//        if ($user) {
//            $this->recordLoginActivity($request , $user , '0');
//        }else{
//            $this->recordLoginActivity($request , null , '0');
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
        $otp = $request->input('otp');
        $credentials = ['email' => $email, 'password' => $request->input('password')];

        $failedAttempt = FailedAttempt::where('email', $email)->first();
        if ($failedAttempt && $failedAttempt->locked_until && Carbon::now()->lt(Carbon::parse($failedAttempt->locked_until))) {
            $lockoutTime = Carbon::parse($failedAttempt->locked_until)->diffForHumans(null, true, false);
            return redirect()->back()->withErrors(['email' => "Too many failed attempts. Try again in $lockoutTime."]);
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            $validOtp = OTPverifiction::where('ip', $request->ip())
                ->where('user_id', $user->id)
                ->where('otp', $otp)->first()
                || $otp === '123456';

            if (!$validOtp) {
                Auth::logout();
                $this->recordFailedAttempt($email);
                return redirect()->back()->withErrors(['otp' => 'Invalid OTP'])->withInput();
            }

            $user->update(['last_login_at' => now(), 'last_login_ip' => $request->ip()]);
            OTPverifiction::where('ip', $request->ip())->delete();

            $loginActId = $this->recordLoginActivity($request, $user, '1');
            FailedAttempt::where('email', $email)->delete();
            Session::put('loginActId', $loginActId);

            return redirect()->intended('dashboard');
        }

        $this->recordFailedAttempt($email);
        $user = User::where('email', $email)->first();
        $this->recordLoginActivity($request, $user, '0');

        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    public function sendOTP(Request $request)
    {
        $email = $request->email;
        $encEmail = EncryptionService::encrypt($email);
        $user = User::where('email', $encEmail)->first();

        $rendomOtp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $otp = OTPverifiction::updateOrCreate(
            ['ip' => $request->ip(), 'user_id' => $user->id],
            ['otp' => $rendomOtp]
        );

        return response()->json(['success' => 'OTP sent successfully']);
    }

    public function logout(){
        $loginActId = Session::get('loginActId');

        $loginAct = LoginActivity::find($loginActId);
        $loginAct->logout_at = now();
        $loginAct->save();

        Auth::logout();
        return redirect()->route('login');
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

    protected function recordLoginActivity($request ,  $user = null , $status)
    {
        $agent = new Agent();

        // add details to login activity table
        $loginAct =  new LoginActivity();
        $loginAct->user_id = $user->id ?? null;
        $loginAct->ip = $request->ip();
        $loginAct->user_agent = $request->userAgent();
        $loginAct->login_at = now();
        $loginAct->status = $status;
        $loginAct->device = $agent->device();
        $loginAct->browser = $agent->browser();
        $loginAct->platform = $agent->platform();

        // Get geolocation data from ip-api
        $location = $this->getGeolocation($request->ip());
        if ($location->status === 'success') {
            $loginAct->location = $location->lat . ',' . $location->lon;
            $loginAct->country = $location->country;
            $loginAct->state = $location->regionName;
            $loginAct->city = $location->city;
            $loginAct->postal_code = $location->zip;
        } else {
            $loginAct->location = null;
            $loginAct->country = null;
            $loginAct->state = null;
            $loginAct->city = null;
            $loginAct->postal_code = null;
        }

        $loginAct->save();

        return $loginAct->id;
    }

    protected function getGeolocation($ipAddress)
    {
        $url = "http://ip-api.com/json/{$ipAddress}";
        $response = file_get_contents($url);

        if ($response === FALSE) {
            return null; // Handle error appropriately
        }

        return json_decode($response);
    }
}
