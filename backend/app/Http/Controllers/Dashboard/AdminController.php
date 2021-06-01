<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('dashboard.admins.index', compact('admins'));
    }
    public function create()
    {
        $roles = Role::all();
        return view('dashboard.admins.create', compact('roles'));
    }
    public function store(AdminRequest $request)
    {
        $this->saveData(new Admin, $request);
        return redirect()->route('dashboard.admins.index');
    }
    public function edit(Admin $admin)
    {
        $roles = Role::all();
        return view('dashboard.admins.edit', compact('admin', 'roles'));
    }
    public function update(Admin $admin, AdminRequest $request)
    {
        $this->saveData($admin, $request);
        return redirect()->route('dashboard.admins.index');
    }
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return back();
    }
    private function saveData($admin ,$request)
    {
//        dd($request->roles);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = $request->password?Hash::make($request->password):$admin->password;
        $admin->syncRoles($request->roles);
        $admin->save();
    }
}
