@extends('layouts.site')
@section('title', 'Blog')
@section('content')
    @include('site.includes.pageTitle', ['title' => 'Blog'])
    <!-- content page -->
    <section class="bgwhite p-t-60">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9 p-b-75">
                    <div class="p-r-50 p-r-0-lg">
                        <!-- item blog -->
                        @forelse($news as $new)
                        <div class="item-blog p-b-80">
                            <a href="{{route('site.news.show', $new->id)}}" class="item-blog-img pos-relative dis-block hov-img-zoom">
                                <img src="{{$new->image}}" alt="IMG-BLOG">

                                <span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1">
									28 Dec, 2018
								</span>
                            </a>

                            <div class="item-blog-txt p-t-33">
                                <h4 class="p-b-11">
                                    <a href="blog-detail.html" class="m-text24">
                                        {{$new->title}}
                                    </a>
                                </h4>

                                <p class="p-b-12">
                                    {{$new->description}}
                                </p>

                                <a href="{{route('site.news.show', $new->id)}}" class="s-text20">
                                    Continue Reading
                                    <i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                            @empty
                            No Blog
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="pagination flex-m flex-w p-r-50">
                        <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
                        <a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
