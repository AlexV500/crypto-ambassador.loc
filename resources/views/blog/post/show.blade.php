@extends('blog.layouts.blog')

@section('content')

    <div class="col-lg-9">


{{--    <section class="mb-5">--}}
{{--        <div class="card shadow-custom-1 bg-light">--}}
{{--            <div class="card-header">Posted on {{$date->format('F')}} {{$date->day}} {{$date->year}} {{$date->format('H:i')}} / {{$post->comments->count()}} Comments</div>--}}
{{--            <div class="card-body">--}}
{{--                <!-- Post content-->--}}
{{--                <article>--}}
{{--                    <!-- Post header-->--}}
{{--                    <header class="mb-4">--}}
{{--                        <!-- Post title-->--}}
{{--                        <h1 class="fw-bolder mb-1">{{$post->title}}</h1>--}}
{{--                        <!-- Post meta content-->--}}
{{--                        <div class="text-muted fst-italic mb-2">Posted on {{$date->format('F')}} {{$date->day}} {{$date->year}} {{$date->format('H:i')}} / {{$post->comments->count()}} Comments</div>--}}
{{--                        <!-- Post categories-->--}}
{{--                        @foreach($postTags as $tag)--}}
{{--                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{ $tag->title }}</a>--}}
{{--                        @endforeach--}}
{{--                    </header>--}}
{{--                    <!-- Preview image figure-->--}}
{{--                    <figure class="mb-4"><img class="img-fluid rounded" src="{{asset(Storage::url($post->main_image))}}" alt="..." /></figure>--}}
{{--                    <section class="mb-5">--}}
{{--                        <!-- Preview image figure-->--}}
{{--                        --}}{{--                        <img src="{{asset(Storage::url($post->main_image))}}" height="300" class="rounded float-left" alt="..."/>--}}
{{--                        <!-- Post content-->--}}
{{--                        {!! $post->content !!}--}}
{{--                    </section>--}}
{{--                    <div class="mb-5 d-flex justify-content-between">--}}
{{--                        <form action="{{ route('blog.like.store', $post->id) }}" method="POST">--}}
{{--                            @csrf--}}
{{--                            <button type="submit" class="border-0 bg-transparent">--}}
{{--                                @auth()--}}
{{--                                    @if(auth()->user()->likedPosts->contains($post->id))--}}
{{--                                        <i class="fas fa-heart"></i>--}}
{{--                                    @else--}}
{{--                                        <i class="far fa-heart"></i>--}}
{{--                                    @endif--}}
{{--                                @endauth--}}
{{--                            </button>--}}
{{--                        </form>--}}
{{--                        Likes: {{ $post->liked_users_count }}--}}
{{--                    </div>--}}
{{--                </article>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}



                <!-- Post content-->
                <article class="article-area">
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">{{$post->title}}</h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">Posted on {{$date->format('F')}} {{$date->day}} {{$date->year}} {{$date->format('H:i')}} / {{$post->comments->count()}} Comments</div>
                        <!-- Post categories-->
                        @foreach($postTags as $tag)
                            <a class="badge text-decoration-none link-light" style="background-color: {{ $tag->color }}" href="{{ route('tag.post.index', $tag->id) }}">{{ $tag->title }}</a>
                        @endforeach
                    </header>
                    <!-- Preview image figure-->
                    <figure class="mb-4"><img class="img-fluid rounded" src="{{asset(Storage::url($post->main_image))}}" alt="..." /></figure>
                    <section class="mb-5">
                        <!-- Preview image figure-->

                        <!-- Post content-->
                        {!! $post->content !!}
                    </section>
                    <div class="mb-5 d-flex justify-content-end">
                        <form action="{{ route('blog.like.store', $post->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="border-0 bg-transparent icon-color-1">
                                @auth()
                                    @if(auth()->user()->likedPosts->contains($post->id))
                                        <i class="fas fa-heart"></i>
                                     @else
                                        <i class="far fa-heart"></i>
                                     @endif
                                @endauth
                            </button>
                        </form>
                        &nbsp; Likes: {{ $post->liked_users_count }}
                    </div>
                </article>




{{--        <!-- Comments section-->--}}
{{--        <section class="mb-5">--}}
{{--            <div class="card bg-light">--}}
{{--                <div class="card-body">--}}
{{--                    <!-- Comment form-->--}}
{{--                    @auth()--}}
{{--                        <form action="{{ route('blog.comment.store', $post->id) }}" method="POST" class="mb-4">--}}
{{--                            @csrf--}}
{{--                            <div class="form-group">--}}
{{--                                        <textarea class="form-control" name="message" rows="3"--}}
{{--                                                  placeholder="Join the discussion and leave a comment!"></textarea>--}}
{{--                            </div>--}}
{{--                            <div class="form-group mt-3">--}}
{{--                                <button type="submit" class="btn btn-primary">Post comment</button>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    @endauth--}}
{{--                    <h5 class="section-title mb-3" data-aos="fade-up">Comments ({{ $post->comments->count() }})</h5>--}}
{{--                    @foreach($post->comments as $comment)--}}
{{--                        <!-- Comment -->--}}
{{--                        <!-- Single comment-->--}}
{{--                        <div class="d-flex mb-3">--}}
{{--                            <div class="flex-shrink-0"><img class="rounded-circle"--}}
{{--                                                            src="https://dummyimage.com/50x50/ced4da/6c757d.jpg"--}}
{{--                                                            alt="..."/></div>--}}
{{--                            <div class="ms-3">--}}
{{--                                <div class="fw-bold">{{$comment->user->name}}--}}
{{--                                    <span--}}
{{--                                        class="fw-normal text-muted float-right">{{$comment->dateAsCarbon->diffForHumans()}}</span>--}}
{{--                                </div>--}}
{{--                                {{$comment->message}}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}


                <!-- Comments section-->
                <section class="mb-5 comments-area">
                    <div class="card shadow-custom-1 bg-light">
                        <div class="card-header">Comments ({{ $post->comments->count() }})</div>
                        <div class="card-body">
                            <!-- Comment form-->
                            @auth()
                                <form action="{{ route('blog.comment.store', $post->id) }}" method="POST" class="mb-4">
                                    @csrf
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" rows="3"
                                                  placeholder="Join the discussion and leave a comment!"></textarea>
                                    </div>
                                    <div class="form-group mt-3">
                                        <button type="submit" class="btn post-comment-btn">Post comment</button>
                                    </div>
                                </form>
                            @endauth

                            @foreach($post->comments as $comment)
                                <!-- Comment -->
                                <!-- Single comment-->
                                <div class="d-flex mb-3">
                                    <div class="flex-shrink-0"><img class="rounded-circle"
                                                                    src="https://dummyimage.com/50x50/ced4da/6c757d.jpg"
                                                                    alt="..."/></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">{{$comment->user->name}}
                                            <span
                                                class="fw-normal text-muted float-right">{{$comment->dateAsCarbon->diffForHumans()}}</span>
                                        </div>
                                        {{$comment->message}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                @if($relatedPosts->count() > 0)
                    <section class="mb-5 relposts-area">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            @foreach($relatedPosts as $relatedPost)
                                <div class="col">
                                    <div class="card shadow-custom-1">
                                        <a href="{{route('blog.post.show', $relatedPost->uri)}}"><img
                                                src="{{asset(Storage::url($relatedPost->preview_image))}}" height="210"
                                                class="card-img-top" alt="..."/></a>
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="{{route('blog.post.show', $relatedPost->uri)}}" class="">{{$relatedPost->title}}</a>
                                            </h5>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h6>{{$relatedPost->category->title}}</h6>
                                                <a href="" class=""><i class="fa-solid fa-clock"></i> April 10,2021</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif

            </div>

@endsection
