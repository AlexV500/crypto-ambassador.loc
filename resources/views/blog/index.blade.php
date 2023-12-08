@extends('blog.layouts.blog')

@section('content')


            <div class="col-lg-9">
                <!-- Post content-->
                <section class="relposts-area pb-100">
                <div class="row g-3">
                    @foreach($posts as $key => $post)
                        <div class="col-xl-4 col-md-4 col-sm-6 col-xs-6">
                            <div class="card shadow-custom-1">
                                <a href="{{route('blog.post.show', $post->uri)}}"><img src="{{asset(Storage::url($post->preview_image))}}" height="200" class="card-img-top" alt="..."/></a>
                                <div class="card-body">
                                    <div class="card-title-container">
                                    <a class="card-title" href="{{route('blog.post.show', $post->uri)}}"
                                       class="">{{$post->title}}</a>
                                    </div>
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

                </section>
                <div class="mt-5">
                    {{ $posts->links() }}
                </div>
            </div>

@endsection
