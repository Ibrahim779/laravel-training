@extends('layouts.site')
@section('title', 'WishList')
@section('content')

    <!-- Title Page -->
    @include('site.includes.pageTitle', ['title' => 'WishList'])

    <!-- Cart -->
    <section class="cart bgwhite p-t-70 p-b-100">
        <div class="container">
            <!-- Cart item -->
            <div class="container-table-cart pos-relative">
                <div class="wrap-table-shopping-cart bgwhite">
                    <table class="table-shopping-cart">
                        <tr class="table-head">
                            <th class="column-1"></th>
                            <th class="column-2">Product</th>
                            <th class="column-3">Price</th>
                            <th class="column-3">Add To Cart</th>
                        </tr>
                        @forelse($wishList as $wishListItem)
                        <tr class="table-row">
                            <td class="column-1">
                                <div class="cart-img-product b-rad-4 o-f-hidden">
                                    <img src="{{$wishListItem->product->image}}" alt="IMG-PRODUCT">
                                </div>
                            </td>
                            <td class="column-2">{{$wishListItem->product->name}}</td>
                            <td class="column-3">${{$wishListItem->product->price}}</td>
                            <td class="column-5">
                                <div productId="{{$wishListItem->product->id}}" class="addToCart w-size1 trans-0-4">
                                    <!-- Button -->
                                    <button  class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                        Add to Cart
                                    </button>
                                </div>
                            </td>
                        </tr>
                            @empty
                            No Items In WishList
                        @endforelse
                    </table>
                </div>
            </div>

        </div>
    </section>

@endsection
