<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function index()
    {
        $wishList = Wishlist::userWishList()->get();
        return view('site.wishList.index', compact('wishList'));
    }

    public function store()
    {
        $productId = request()->productId;
        if (!Wishlist::exist($productId)) {
            $this->saveData(new Wishlist, $productId);
        }
        return response()->json(['cartCount' => Wishlist::userWishList()->count()]);
    }

    public function saveData(Wishlist $wishlist, $productId)
    {
        $wishlist->product_id = $productId;
        $wishlist->user_id = auth()->id();
        $wishlist->save();
    }
}
