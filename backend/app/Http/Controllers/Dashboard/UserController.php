<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\UserRequest;
use App\Models\User;
use App\Traits\SaveData\UserSaveData;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    use UserSaveData;

    public function index()
    {
        $users = User::all();
        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(UserRequest $request)
    {
        $user = new User;
        $this->saveDate($user, $request);
        return response()->json(['user' => $user, 'status' => 'success']);
    }

    public function edit(User $user)
    {
        return response()->json(['user' => $user]);
    }

    public function update(User $user, UserRequest $request)
    {
        $this->saveDate($user, $request);
        return response()->json(['user' => $user, 'status' => 'success']);
    }

    public function destroy(User $user)
    {
        Storage::disk('public')->delete($user->img);
        $user->delete();
        return response()->json(['user' => $user, 'status' => 'success']);
    }

}
