<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
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

    public function scopeUserCart($query)
    {
        return $query->whereUserId(auth()->id());
    }

    public static function exist($productId)
    {
        if (self::userCart()->whereProductId($productId)->first())
            return true;
        return false;
    }

    public function getTotalPriceAttribute()
    {
        return $this->product->price * $this->count;
    }

    public static function getTotal()
    {
        $total = 0;
        foreach (self::userCart()->get() as $cartItem) {
            $total += $cartItem->totalPrice;
        }
        return $total;
    }
}
