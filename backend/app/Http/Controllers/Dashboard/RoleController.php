<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\RoleRequest;
use App\Traits\SaveData\RoleSaveData;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    use RoleSaveData;
    public function index()
    {
        $roles = Role::all();
        return view('dashboard.roles.index', compact('roles'));
    }
    public function create()
    {
        $permissions = Permission::all();
        return view('dashboard.roles.create', compact('permissions'));
    }
    public function store(RoleRequest $request)
    {
        $this->saveData(new Role, $request);
        return redirect()->route('dashboard.roles.index');
    }
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('dashboard.roles.edit', compact('role', 'permissions'));
    }
    public function update(Role $role, RoleRequest $request)
    {
        $this->saveData($role, $request);
        return redirect()->route('dashboard.roles.index');
    }
    public function destroy(Role $role)
    {
        $role->delete();
        return back();
    }

}
