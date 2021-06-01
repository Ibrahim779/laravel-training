<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $this->saveDate(new User, $request);
        return redirect()->route('dashboard.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param User $user
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param User $user
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(User $user, UserRequest $request)
    {
        $this->saveDate($user, $request);
        return redirect()->route('dashboard.users.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
    protected function saveDate($user, $request)
    {

    }
}
