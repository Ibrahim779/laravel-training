<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function forms()
    {
        return $this->belongsToMany(Form::class);
    }

    public function fields()
    {
        return $this->belongsToMany(Field::class);
    }

    public function deleteForms()
    {
        $this->forms()->detach();
    }

    public function insertFieldsValue($request)
    {
        $this->fields()->detach();
        foreach ($request->except(['forms','_token','name']) as $key => $value) {
            $this->fields()->attach([
                $key => ['value' => $value]
            ]);
        }
    }
}
