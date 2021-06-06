<?php


namespace App\Traits\SaveData;


trait RoleSaveData
{
    protected function saveData($role ,$request)
    {
        $role->name = $request->name;
        $role->guard_name = 'admin';
        $role->syncPermissions($request->permissions);
        $role->save();
    }
}
