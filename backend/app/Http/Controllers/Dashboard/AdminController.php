<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdminRequest;
use App\Models\Admin;
use App\Traits\SaveData\AdminSaveData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    use AdminSaveData;

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

}
