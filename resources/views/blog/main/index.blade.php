@extends('blog.layouts.blog')

@section('content')

            <div class="col-lg-9">
                <!-- Post content-->
                <section class="relposts-area pb-100">

                    <x-posts :posts="$posts"></x-posts>
                    <div class="mt-5">
                        {{ $posts->links() }}
                    </div>
                </section>
            </div>

@endsection
