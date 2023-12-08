@extends('blog.layouts.blog')

@section('content')

            <div class="col-lg-9">
                <!-- Post content-->
                <div class="row">
                    <h1 class="">Categories</h1>
                    <ul>
                    @foreach($categories as $category)
                        <li><a href="{{ route('category.post.index', [$getLocale, $category->uri]) }}">{{ $category->title }}</a> </li>
                    @endforeach
                    </ul>
                </div>
            </div>

@endsection
