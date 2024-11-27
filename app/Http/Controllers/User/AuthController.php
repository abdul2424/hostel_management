<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\ForgetPasswordOtp;
use App\Models\ForgetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function storeUser(Request $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'occupation' => $request->occupation,
            'address' => $request->address
        ]);
        if ($user) {
            // toastr()->success('Success', 'Registration Done Successfully');
            alert()->success('Success', 'Register Successfully');
            return redirect()->route('user.login');
        } else {
            alert()->error('Opps!', 'Please Try again');
        }
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');
        if (Auth::guard('user')->attempt($credentials, $remember)) {
          
            alert()->success('Success', 'Login Successfully');
            return redirect()->route('user.dashboard');
        }
        alert()->error('Error', 'Invalid Email and Password');
        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
            'approve' => 'Wrong password or this account not approved yet.',
        ]);
    }
    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect()->route('user.web');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.auth.edit')->with('user', $user);
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user =  $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'occupation' => $request->occupation,
            'address' => $request->address
        ]);
        if ($user) {
            return redirect()->route('user.dashboard');
        } else {
            // toastr()->error('room Not Update', 'Oops!');
            return redirect()->route('user.dashboard');
        }
    }


    public function forgetPassword(Request $request)
    {

        $user = User::where('email', $request->email)->first();
        if ($user) {

            $existingOtp = ForgetPassword::where('email', $request->email)->first();
            if ($existingOtp) {
                $existingOtp->delete();
            }
            $otp = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
            $mailData = [
                'title' => 'Mobile user-Request Forget Password',
                'name' => $user->name,
                'otp' => $otp,
            ];
            ForgetPassword::create([
                'email' => $request->email,
                'otp' => $otp
            ]);
            Mail::to($request->email)->send(new ForgetPasswordOtp($mailData));
            return view('user.auth.verifyotp')->with('user', $user);
        } else {
            return redirect()->back()->with('error', 'Email not found');
        }
    }
    public function verifyOtp(Request $request)
    {
        $otp = ForgetPassword::where('otp', $request->otp)->where('email', $request->email)->first();
        $user = User::where('email', $request->email)->first();

        if ($otp) {
            $otp->delete();
            return view('user.auth.updatepassword')->with('user', $user);
        } else {
            return redirect()->back()->with('Error', 'OTP not matched');
        }
    }

    public function forgetupdatePassword(Request $request)
    {

        $data = User::where('email', $request->email)->first();

        $data->update([
            'password' => $request->password
        ]);
        return redirect()->route('user.login');
    }
}
