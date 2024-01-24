@extends('blog.layouts.blog')

@section('content')

    <div class="col-lg-9">


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


                <!-- Comments section-->
                <section class="mb-5 comments-area">
                    <div class="card shadow-custom-1 bg-light">
                        <div class="card-header">
                             <livewire:blog.post.comments.count-comments :post="$post"/>
                        </div>
                        <div class="card-body">
                            @auth()
                              <livewire:blog.post.comments.store-comment :post="$post" />
                            @endauth
                        <livewire:blog.post.comments.show-comments :post="$post"/>
                        </div>
                    </div>
                </section>

                @if($relatedPosts->count() > 0)
                    <section class="mb-5 relposts-area">

                        <x-posts :posts="$relatedPosts"></x-posts>

                    </section>
                @endif

            </div>

@endsection
