<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\LoginRequest;
use App\Http\Requests\Dashboard\UserRequest;
use App\Models\User;
use App\Traits\SaveData\UserSaveData;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use UserSaveData;

    public function login(LoginRequest $request)
    {
        if (auth()->attempt($request->only('email', 'password'))){
            return redirect()->route('site.index');
        }
        return back()->withErrors('email or password is not correct');
    }

    public function register(UserRequest $request)
    {
        $user = new User;
        $this->saveDate($user, $request);
        auth()->login($user);
        return redirect()->route('site.index');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('site.loginForm');
    }

}
