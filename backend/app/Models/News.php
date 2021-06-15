<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function getTitleAttribute()
    {
        return (app()->getLocale() == 'ar') ? $this->title_ar : $this->title_en;
    }

    public function getDescriptionAttribute()
    {
       return (app()->getLocale() == 'ar') ? $this->description_ar : $this->description_en;
    }

    public function getSubDescriptionAttribute()
    {
        return substr($this->description, 0, 150);
    }

    public function getDateAttribute()
    {
        return date_format($this->created_at, 'F j, Y');
    }

    public function getImageAttribute()
    {
       return str_contains($this->img, 'news')? url('storage') .'/'. $this->img : url($this->img);
    }

}
