<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function fields()
    {
        return $this->hasMany(Field::class);
    }

    public function documents()
    {
        return $this->belongsToMany(Document::class);
    }

}
