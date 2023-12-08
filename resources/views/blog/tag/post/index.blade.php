@extends('blog.layouts.blog')

@section('content')

    <header class="mb-4">
        <!-- Post title-->
        <h1 class="fw-bolder mb-1">Posts with tag: {{$tag->title}}</h1>

    </header>
            <div class="col-lg-9">
                <!-- Post content-->
                <section class="relposts-area">
                    <div class="row g-3">
                        @foreach($posts as $post)
                            <div class="col-xl-4 col-md-4 col-sm-6 col-xs-6">
                                <div class="card shadow-custom-1">
                                    <a href="{{route('blog.post.show', $post->uri)}}"><img src="{{asset(Storage::url($post->preview_image))}}" height="200" class="card-img-top" alt="..."/></a>
                                    <div class="card-body">
                                        <a class="card-title" href="{{route('blog.post.show', $post->uri)}}"
                                           class="">{{$post->title}}</a>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class=""><h6>{{$post->category->title}}</h6></div>
                                            <div class="posted-time"><i
                                                    class="fa-solid fa-clock"></i> {{ $post->dateAsCarbon->diffForHumans() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-5">
                        {{ $posts->links() }}
                    </div>
                </section>
            </div>

@endsection
