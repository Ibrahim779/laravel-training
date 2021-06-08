<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('admin')){
   function admin(){
       return Auth::guard('admin');
   }
}
if (!function_exists('attrValue')){
    function attrValue($attribute, $object = null){
        if ($object){
           return old($attribute)??$object->$attribute;
        }
        return old($attribute);
    }
}
