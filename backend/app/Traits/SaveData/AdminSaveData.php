<?php


namespace App\Traits\SaveData;


use Illuminate\Support\Facades\Hash;

trait AdminSaveData
{
    private function saveData($admin ,$request)
    {
        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->password){
            $admin->password = Hash::make($request->password);
        }
        $admin->syncRoles($request->roles);
        $admin->save();
    }
}
