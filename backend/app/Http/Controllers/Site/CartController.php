<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $cartItems = Cart::userCart()->OrderIsNull()->get();

        return view('site.cart.index', compact('cartItems'));
    }

    public function store()
    {
        $productId = request()->productId;

        if (!Cart::exist($productId)) {
            $this->saveData(new Cart, $productId);
        }

        return response()->json(['cartCount' => $this->getCartCount()]);
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();

        return response()->json(['cartCount' => $this->getCartCount()]);
    }

    public function saveData(Cart $cart, $productId)
    {
        $cart->product_id = $productId;

        $cart->user_id = auth()->id();

        $cart->save();
    }

    private function getCartCount()
    {
        return Cart::userCart()->OrderIsNull()->count();
    }

}
