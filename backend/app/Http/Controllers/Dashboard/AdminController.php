<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('dashboard.admins.index', compact('admins'));
    }
    public function create()
    {
        return view('dashboard.admins.create');
    }
    public function store(AdminRequest $request)
    {
        $this->saveData(new Admin, $request);
        return redirect()->route('dashboard.admins.index');
    }
    public function edit(Admin $admin)
    {
        return view('dashboard.admins.edit', compact('admin'));
    }
    public function update(Admin $admin, AdminRequest $request)
    {
        $this->saveData($admin, $request);
        return redirect()->route('dashboard.admin.index');
    }
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return back();
    }
    private function saveData($admin ,$request)
    {

    }
}
