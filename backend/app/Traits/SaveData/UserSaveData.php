<?php


namespace App\Traits\SaveData;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

trait UserSaveData
{
    protected function saveDate($user, $request)
    {
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->password){
            $user->password = Hash::make($request->password);
        }
        if ($request->img){
            if ($user->img) {
                Storage::delete($user->img);
                $user->img = $request->img->store('users','public');
            } else {
                $user->img = $request->img->store('users','public');
            }
        }
        $user->save();
    }
}
