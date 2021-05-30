<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))){
            return redirect()->route('dashboard.main');
        }
        return back()->withErrors('email or password is not correct');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('dashboard.loginForm');
    }
}
