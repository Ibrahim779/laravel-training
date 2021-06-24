<a href="#" class="header-wrapicon1 dis-block">
    <img style="border-radius: 20px" src="{{auth()->user()->image??asset('site/assets/images/icons/icon-header-01.png')}}" class="header-icon1" alt="ICON">
</a>

<span class="linedivide2"></span>

<div class="header-wrapicon2">
    <img src="{{asset('site/assets/images/icons/icon-header-02.png')}}" class="header-icon1 js-show-header-dropdown" alt="ICON">
    <span class="cartCount header-icons-noti">{{$cartItems->count()}}</span>

    <!-- Header cart noti -->
    <div class="header-cart header-dropdown">
        <ul class="header-cart-wrapitem">
            @forelse($cartItems as $cartItem)
                <li class="header-cart-item">
                    <div class="header-cart-item-img">
                        <img src="{{$cartItem->product->image}}" alt="IMG">
                    </div>

                    <div class="header-cart-item-txt">
                        <a href="{{route('site.products.show',$cartItem->product->id)}}" class="header-cart-item-name">
                            {{$cartItem->product->name}}
                        </a>

                        <span class="header-cart-item-info">
                            {{$cartItem->count}} x ${{$cartItem->product->price}}
                        </span>
                    </div>
                </li>
            @empty
                No Items In Cart
            @endforelse
        </ul>

        <div class="header-cart-total">
            Total: ${{\App\Models\Cart::getTotal()}}
        </div>

        <div class="header-cart-buttons">
            <div class="header-cart-wrapbtn">
                <!-- Button -->
                <a href="{{route('site.cart.index')}}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                    View Cart
                </a>
            </div>

            <div class="header-cart-wrapbtn">
                <!-- Button -->
                <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                    Check Out
                </a>
            </div>
        </div>
    </div>
</div>
