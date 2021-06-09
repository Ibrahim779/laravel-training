<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getNameAttribute()
    {
        return (app()->getLocale() == 'ar') ? $this->name_ar : $this->name_en;
    }

    public function getImageAttribute()
    {
        return str_contains($this->img, 'categories')? url('storage/' . $this->img) : url($this->img);
    }

}
