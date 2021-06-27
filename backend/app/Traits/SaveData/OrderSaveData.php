<?php


namespace App\Traits\SaveData;


use App\Models\Cart;
use App\Models\Order;

trait OrderSaveData
{

    public function saveData(Order $order, $request)
    {
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->total_price = Cart::getTotal();
        $order->user_id = auth()->id();
        $order->save();
        foreach (Cart::userCart()->whereOrderId(null)->get() as $cart){
            $cart->order_id = $order->id;
            $cart->save();
        }
    }

}
