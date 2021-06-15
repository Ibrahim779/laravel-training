<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeUserWishList($query)
    {
        return $query->whereUserId(auth()->id());
    }

    public static function exist($productId)
    {
        if (self::userWishList()->whereProductId($productId)->first())
            return true;
        return false;
    }
}
