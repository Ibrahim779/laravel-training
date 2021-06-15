@extends('layouts.site')
@section('title', 'Products')
@section('content')

    <!-- Title Page -->
    @include('site.includes.pageTitle', ['title' => 'Shop'])

    <!-- Content page -->
    <section class="bgwhite p-t-55 p-b-65">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                    <div class="leftbar p-r-20 p-r-0-sm">
                         <!-- Search -->
                        <div class="search-product pos-relative bo4 of-hidden mb-4">
                            <input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">

                            <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
                                <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                            </button>
                        </div>

                        <!-- Categories -->
                        <h4 class="m-text14 p-b-7">
                            Categories
                        </h4>

                        <ul class="p-b-54">
                            <li class="p-t-4">
                                <a href="{{route('site.products.index')}}" class="s-text13 active1">
                                    All
                                </a>
                            </li>
                            @forelse($categories as $category)
                            <li class="p-t-4">
                                <a href="{{route('site.products.getCategoryProducts', $category->id)}}" class="s-text13 active1">
                                    {{$category->name}}
                                </a>
                            </li>
                            @empty
                                <li class="p-t-4">
                                    No Categories
                                </li>
                            @endforelse
                        </ul>

                        <!--  -->
                        <h4 class="m-text14 p-b-32">
                            Filters
                        </h4>

                        <div class="filter-price p-t-22 p-b-50 bo3">
                            <div class="m-text15 p-b-17">
                                Price
                            </div>

                            <div class="wra-filter-bar">
                                <div id="filter-bar"></div>
                            </div>

                            <div class="flex-sb-m flex-w p-t-16">
                                <div class="w-size11">
                                    <!-- Button -->
                                    <button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
                                        Filter
                                    </button>
                                </div>

                                <div class="s-text3 p-t-10 p-b-10">
                                    Range: $<span id="value-lower">610</span> - $<span id="value-upper">980</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                    <!--  -->
                    <div class="flex-sb-m flex-w p-b-35">
                        <div class="flex-w">
                            <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                                <select class="selection-2" name="sorting">
                                    <option>Default Sorting</option>
                                    <option>Popularity</option>
                                    <option>Price: low to high</option>
                                    <option>Price: high to low</option>
                                </select>
                            </div>

                            <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                                <select class="selection-2" name="sorting">
                                    <option>Price</option>
                                    <option>$0.00 - $50.00</option>
                                    <option>$50.00 - $100.00</option>
                                    <option>$100.00 - $150.00</option>
                                    <option>$150.00 - $200.00</option>
                                    <option>$200.00+</option>

                                </select>
                            </div>
                        </div>

                        <span class="s-text8 p-t-5 p-b-5">
							Showing 1–12 of 16 results
						</span>
                    </div>

                    <!-- Product -->
                    <div class="row">
                        @forelse($products as $product)
                        <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                    <img src="{{$product->image}}" alt="IMG-PRODUCT">

                                    <div class="block2-overlay trans-0-4">
                                        <a href="#" productId="{{$product->id}}" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                            @if($product->wishList()->userWishList()->count())
                                                <i class="icon-wishlist is-added icon_heart" aria-hidden="true"></i>
                                            @else
                                                <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                            @endif
                                            <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                        </a>

                                        <div productId="{{$product->id}}" class="block2-btn-addcart w-size1 trans-0-4">
                                            <!-- Button -->
                                            <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="block2-txt p-t-20">
                                    <a href="{{route('site.products.show', $product->id)}}" class="block2-name dis-block s-text3 p-b-5">
                                        {{$product->name}}
                                    </a>

                                    <span class="block2-price m-text6 p-r-5">
										${{$product->price}}
									</span>
                                </div>
                            </div>
                        </div>
                            @empty
                            <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                                No Products
                            </div>
                            @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="pagination flex-m flex-w p-t-26">
                        @for($i=1; $i<=$products->lastPage(); $i++)
                        <a href="{{$products->url($i)}}" class="item-pagination flex-c-m trans-0-4 {{$i==$products->currentPage()?'active-pagination':''}}">{{$i}}</a>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
