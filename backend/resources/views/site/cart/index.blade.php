@extends('layouts.site')
@section('title', 'Cart')
@section('content')

    <!-- Title Page -->
    @include('site.includes.pageTitle', ['title' => 'Cart'])

    <!-- Cart -->
    <section class="cart bgwhite p-t-70 p-b-100">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">&times;</i>
                    </button>
                    <span>
                        {{session('success')}}
                    </span>
                </div>
            @endif
            <!-- Cart item -->
            <div class="container-table-cart pos-relative">
                <div class="wrap-table-shopping-cart bgwhite">
                    <table class="table-shopping-cart">
                        <tr class="table-head">
                            <th class="column-1"></th>
                            <th class="column-2">Product</th>
                            <th class="column-3">Price</th>
                            <th class="column-4 p-l-70">Count</th>
                            <th class="column-5">Total</th>
                        </tr>
                        @forelse($cartItems as $cartItem)
                        <tr class="table-row">
                            <td class="column-1">
                                <div productName="{{$cartItem->product->name}}" cartId="{{$cartItem->id}}" class="deleteCart cart-img-product b-rad-4 o-f-hidden">
                                    <img src="{{$cartItem->product->image}}" alt="IMG-PRODUCT">
                                </div>
                            </td>
                            <td class="column-2">{{$cartItem->product->name}}</td>
                            <td class="column-3">${{$cartItem->product->price}}</td>
                            <td class="column-4">
                                <div class="flex-w bo5 of-hidden w-size17">
                                    <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                        <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                    </button>

                                    <input class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="1">

                                    <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                        <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </td>
                            <td class="column-5">${{$cartItem->totalPrice}}</td>
                        </tr>
                            @empty
                            No Items In Cart
                        @endforelse
                    </table>
                </div>
            </div>

            <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                <div class="flex-w flex-m w-full-sm">
                    <div class="size11 bo4 m-r-10">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Coupon Code">
                    </div>

                    <div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
                        <!-- Button -->
                        <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                            Apply coupon
                        </button>
                    </div>
                </div>

                <div class="size10 trans-0-4 m-t-10 m-b-10">
                    <!-- Button -->
                    <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                        Update Cart
                    </button>
                </div>
            </div>

            <!-- Total -->
            <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
               @include('site.cart.parts.cartTotals')
                <a href="{{route('site.checkout.index')}}">
                    <div class="size15 trans-0-4">
                        <!-- Button -->
                        <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                            Proceed to Checkout
                        </button>
                    </div>
                </a>

            </div>
        </div>
    </section>

@endsection
