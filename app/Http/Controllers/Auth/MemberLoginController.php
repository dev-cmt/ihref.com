<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Registration;

class MemberLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('member.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'mobile' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt login using the member guard
        if (Auth::guard('member')->attempt([
            'mobile' => $request->mobile,
            'password' => $request->password,
        ])) {
            return redirect()->route('member.dashboard'); // member dashboard route
        }

        return back()->withErrors([
            'mobile' => 'Invalid phone or password.',
        ])->withInput();
    }

    public function logout()
    {
        Auth::guard('member')->logout();
        return redirect()->route('member.login');
    }
}
