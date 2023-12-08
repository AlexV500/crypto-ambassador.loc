<!-- Side widgets-->
<div class="col-lg-3 side-widgets">
    <!-- Search widget-->
{{--    <div class="card mb-4">--}}
{{--        <div class="card-header">Search</div>--}}
{{--        <div class="card-body">--}}
{{--            <div class="input-group">--}}
{{--                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />--}}
{{--                <button class="btn btn-primary" id="button-search" type="button">Go!</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- Categories widget-->
    <div class="card categories-widget shadow-custom-1 mb-4">
        <div class="card-header">{{__('lang.Categories')}}</div>
        <div class="card-body">
            <div class="row">

                <div class="col-sm-12">
                    <ul class="list-group list-group-flush mb-0">
                        @foreach ($categories as $category)

                            <li class="list-group-item"><a @if(request()->url() == route('category.post.index', $category->uri)) class="categories-widget-link-active" @else class="categories-widget-link" @endif href="{{ route('category.post.index', $category->uri) }}">{{ $category->title }}</a></li>
                        @endforeach
                    </ul>
                </div>

{{--                <div class="col-sm-6 categories-widget">--}}
{{--                    <ul class="list-group mb-0">--}}
{{--                        @foreach ($categories->chunk(ceil($categories->count() / 2))->first() as $category)--}}
{{--                            <li class="list-group-item"><a href="{{ route('category.post.index', $category->id) }}">{{ $category->title }}</a></li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6 categories-widget">--}}
{{--                    <ul class="list-unstyled mb-0">--}}
{{--                        @foreach ($categories->chunk(ceil($categories->count() / 2))->last() as $category)--}}
{{--                            <li><a href="{{ route('category.post.index', $category->id) }}">{{ $category->title }}</a></li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>

    <!-- Tags widget-->
    <div class="card shadow-custom-1 mb-4">
        <div class="card-header">{{__('lang.Tags')}}</div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 tags-widget">
                    <ul class="list-inline mb-0">
                    @foreach ($tags as $tag)
                        <li class="list-inline-item"><a class="badge text-decoration-none link-light" style="background-color: {{ $tag->color }}; opacity: 0.9" href="{{ route('tag.post.index', $tag->uri) }}">{{ $tag->title }}</a></li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Side widget-->
    <div class="card shadow-custom-1 mb-4">
        <div class="card-header">Side Widget</div>
        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
    </div>

        <!-- Recent post widget START -->
    <div class="card p-post-widget shadow-custom-1 mb-4">
        <div class="card-header">{{__('lang.Popular posts')}}</div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
            @foreach($likedPosts as $likedPost)
                <li class="list-group-item">
            <!-- Recent post item -->
                <div class="row">
                    <div class="col-3 col-xl-3 col-md-5 col-sm-2">
                        <a href="{{route('blog.post.show', $likedPost->uri)}}"><img src="{{asset(Storage::url($likedPost->preview_image))}}" height="60" width="60" class="" alt="..."/></a>
                    </div>
                    <div class="col-9 col-xl-7 col-md-7 col-sm-10">

                        <h6><a href="{{route('blog.post.show', $likedPost->uri)}}" class="text-reset fw-bold">{{ $likedPost->title }}</a></h6>
{{--                        <div class="small mt-1">May 17, 2022</div>--}}

                            <div class="text-muted small">{{$likedPost->category->title}}</div>
                            <div class="text-muted small"><i
                                    class="fa-solid fa-clock"></i> {{ $likedPost->dateAsCarbon->diffForHumans() }}

                        </div>
                    </div>
                </div>
                </li>
            @endforeach
            </ul>
        </div>
    </div>
        <!-- Recent post widget END -->

</div>
