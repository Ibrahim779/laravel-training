<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $cartItems = Cart::userCart()->get();
        return view('site.cart.index', compact('cartItems'));
    }

    public function store()
    {
        $productId = request()->productId;
        if (!Cart::exist($productId)) {
            $this->saveData(new Cart, $productId);
        }
        return response()->json(['cartCount' => Cart::userCart()->count()]);
    }

    public function saveData(Cart $cart, $productId)
    {
        $cart->product_id = $productId;
        $cart->user_id = auth()->id();
        $cart->save();
    }

}
