<!-- Blog -->
<section class="blog bgwhite p-t-94 p-b-65">
    <div class="container">
        <div class="sec-title p-b-52">
            <h3 class="m-text5 t-center">
                Our Blog
            </h3>
        </div>

        <div class="row">
            @forelse($news as $new)
            <div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
                <!-- Block3 -->
                <div class="block3">
                    <a href="{{route('site.news.show', $new->id)}}" class="block3-img dis-block hov-img-zoom">
                        <img src="{{$new->image}}" alt="IMG-BLOG">
                    </a>

                    <div class="block3-txt p-t-14">
                        <h4 class="p-b-7">
                            <a href="{{route('site.news.show', $new->id)}}" class="m-text11">
                                {{$new->title}}
                            </a>
                        </h4>

                        <span class="s-text6">on</span> <span class="s-text7">{{$new->date}}</span>

                        <p class="s-text8 p-t-16">
                            {{$new->subDescription}}
                        </p>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>
</section>
