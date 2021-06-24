<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function wishList()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function getNameAttribute()
    {
        return (app()->getLocale() == 'ar') ? $this->name_ar : $this->name_en;
    }

    public function getDescriptionAttribute()
    {
        return (app()->getLocale() == 'ar') ? $this->description_ar : $this->description_en;
    }

    public function getImageAttribute()
    {
        return str_contains($this->img, 'products')? url('storage') .'/'. $this->img :
            ($this->img?url($this->img):url('dashboard/assets/dist/img/photo1.png'));
    }

    public function scopeSearch($query, $keyword)
    {
        return $query->where('name_ar', '%LIKE%', $keyword)
            ->orWhere('name_en', '%LIKE%', $keyword)
            ->orWhere('price', '%LIKE%', $keyword)
            ->orWhere('description_ar', '%LIKE%', $keyword)
            ->orWhere('description_en', '%LIKE%', $keyword);
    }

}
