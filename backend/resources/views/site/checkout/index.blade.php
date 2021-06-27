@extends('layouts.site')
@section('title', 'Checkout')
@section('content')

    <!-- Title Page -->
    @include('site.includes.pageTitle', ['title' => 'Checkout'])

    <!-- content page -->
    <section class="bgwhite p-t-66 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6 p-b-30">
                    <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
                        @include('site.cart.parts.cartTotals')
                    </div>
                </div>
                <div class="col-md-6 p-b-30">
                    <form method="post" action="{{route('site.checkout.store')}}" class="leave-comment">
                        @csrf
                        <h4 class="m-text26 p-b-36 p-t-15">
                            Checkout Details
                        </h4>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="material-icons">&times;</i>
                                </button>
                                <span>
                                            {{$errors->first()}}
                                        </span>
                            </div>
                        @endif
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Full Name">
                        </div>

                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone" placeholder="Phone Number">
                        </div>

                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="Email Address">
                        </div>

                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="address" placeholder="Address">
                        </div>
                        @foreach($paymentMethods as $paymentMethod)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" value="{{$paymentMethod->PaymentMethodId}}" name="paymentMethodId" id="{{$paymentMethod->PaymentMethodId}}">
                            <label class="form-check-label pr-5" for="{{$paymentMethod->PaymentMethodId}}">
                                <img style="width: 50px; height: auto"  class="img-thumbnail" src="{{$paymentMethod->ImageUrl}}" alt="PaymentMethod">
                            </label>
                        </div>
                        @endforeach

                        <div class="w-size25">
                            <!-- Button -->
                            <button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                                Checkout
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
