<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');
        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            alert()->success('Success', 'Login Successfully');
            return redirect()->intended('/dashboard/admin');
        }
        alert()->error('error', 'Invalid Email and Password');
        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
            'approve' => 'Wrong password or this account not approved yet.',
        ]);
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin');
    }
}
