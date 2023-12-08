@extends('blog.layouts.blog')

@section('content')

    <div class="col-lg-9">
        <!-- Post content-->
        <section class="relposts-area">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($posts as $post)
                    <div class="col">
                        <div class="card shadow-custom-1">
                            <a href="{{route('blog.post.show', $post->uri)}}"><img
                                    src="{{asset(Storage::url($post->preview_image))}}" height="200"
                                    class="card-img-top" alt="..."/></a>
                            <div class="card-body">
                                <div class="card-title-container">
                                    <a class="card-title" href="{{route('blog.post.show', $post->uri)}}"
                                       class="">{{$post->title}}</a>
                                </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        @foreach ($post->categories as $postCategory)
                                            @if(request()->url() == route('category.post.index', $postCategory->uri))
                                                <h6>{{$postCategory->title}}</h6>
                                            @endif
                                        @endforeach
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
