@extends('layouts.main')

@section('content')

    <section id="home" class="hero-section">
        <div class="shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>
        <div class="container">
            {!! Snippet::getSnippet('Home') !!}
        </div>
    </section>
    <section id="feature" class="feature-section pt-150">
        <div class="container">
        {!! Snippet::getSnippet('Our-Specialities') !!}
    </div>
</section>
<section id="about" class="about-section pt-150 pb-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6">
                <div class="about-img mb-30">
                    <img src="{{asset('assets/img/about-img.svg')}}" alt="image" class=" wow fadeInLeft" data-wow-delay=".4s">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                {!! Snippet::getSnippet('About') !!}
            </div>
        </div>
    </div>
</section>

<section id="blog" class="atf-blog-area pt-120 pb-80">
    <div class="container">

        <div class="row">
            <div class="col-xl-11 col-lg-11 col-md-11 mx-auto">
    {!! Snippet::getSnippet('Our-Latest-Blog') !!}
</div>
</div>

<div class="row g-3">

    @foreach($posts as $post)
        <div class="col-xl-3 col-md-4 col-sm-6 col-xs-6">
            <div class="card shadow-custom-1">
                <a href="{{route('blog.post.show', $post->uri)}}"><img
                        src="{{asset(Storage::url($post->preview_image))}}" height="200" class="card-img-top"
                        alt="..."/></a>
                <div class="card-body">
                    <div class="card-title-container">
                    <a class="card-title" href="{{route('blog.post.show', $post->uri)}}" class="">{{$post->title}}</a>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class=""><h6>{{$post->category->title}}</h6></div>
                        <div class=""><a href="{{route('blog.post.show', $post->uri)}}" class=""></a></div>
                        <div class="posted-time"><i
                                class="fa-solid fa-clock"></i> {{ $post->dateAsCarbon->diffForHumans() }}</div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
    </div>
</section>
    <div class="container">
        <div class="row justify-content-center pb-20">
            <div class="text-center">
                <a href="{{route('blog.index')}}" class="theme-btn theme-btn-2 wow fadeInRight"
                   data-wow-delay=".8s">{{__('lang.Read More')}}</a>
            </div>
        </div>
    </div>

<section id="partnership" class="service-section pt-100 pb-70">
{!! Snippet::getSnippet('Partnership') !!}
    </section>

    <section id="ambassadors" class="team-section pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-11 col-lg-11 mx-auto">

                    {!! Snippet::getSnippet('Meat-Our-Team') !!}

                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single-team text-center mb-120 wow fadeInUp" data-wow-delay=".2s">
                        <div class="team-img mb-20">
                            <img src="{{asset('assets/img/team-1.png')}}" alt>
                            <div class="team-social-links">
                                <ul>
                                    <li><a href="#"><i class="lni lni-facebook-filled"></i></a></li>
                                    <li><a href="#"><i class="lni lni-twitter-filled"></i></a></li>
                                    <li><a href="#"><i class="lni lni-linkedin-original"></i></a></li>
                                </ul>
                            </div>
                            <div class="team-info">
                                <h5>Mdisdh Dksdd</h5>
                                <span>CEO</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single-team text-center mb-120 wow fadeInUp" data-wow-delay=".4s">
                        <div class="team-img mb-20">
                            <img src="{{asset('assets/img/team-2.png')}}" alt>
                            <div class="team-social-links">
                                <ul>
                                    <li><a href="#"><i class="lni lni-facebook-filled"></i></a></li>
                                    <li><a href="#"><i class="lni lni-twitter-filled"></i></a></li>
                                    <li><a href="#"><i class="lni lni-linkedin-original"></i></a></li>
                                </ul>
                            </div>
                            <div class="team-info">
                                <h5>Rdisdh Yksdd</h5>
                                <span>Product Manager</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single-team text-center mb-120 wow fadeInUp" data-wow-delay=".6s">
                        <div class="team-img mb-20">
                            <img src="{{asset('assets/img/team-3.png')}}" alt>
                            <div class="team-social-links">
                                <ul>
                                    <li><a href="#"><i class="lni lni-facebook-filled"></i></a></li>
                                    <li><a href="#"><i class="lni lni-twitter-filled"></i></a></li>
                                    <li><a href="#"><i class="lni lni-linkedin-original"></i></a></li>
                                </ul>
                            </div>
                            <div class="team-info">
                                <h5>Qdisdh Eksdd</h5>
                                <span>Business Manager</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single-team text-center mb-120 wow fadeInUp" data-wow-delay=".8s">
                        <div class="team-img mb-20">
                            <img src="{{asset('assets/img/team-4.png')}}" alt>
                            <div class="team-social-links">
                                <ul>
                                    <li><a href="#"><i class="lni lni-facebook-filled"></i></a></li>
                                    <li><a href="#"><i class="lni lni-twitter-filled"></i></a></li>
                                    <li><a href="#"><i class="lni lni-linkedin-original"></i></a></li>
                                </ul>
                            </div>
                            <div class="team-info">
                                <h5>Shdjsiw Sdklj</h5>
                                <span>Digital Marketer</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="roadmap" class="roadmap-section mt-60 pt-80 pb-70 img-bg"
             style="background-image: url({{asset('assets/img/common-bg.jpg')}})">
        <div class="container">

            {!! Snippet::getSnippet('Roadmap') !!}

        </div>
    </section>


    <!-- Contact-->
    <section id="contact" class="contact-section pt-120 pb-105">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xl-11 col-lg-11">
                    <div class="contact-wrapper mb-30">
                    {!! Snippet::getSnippet('Contacts') !!}
{{--                        <x-contacts></x-contacts>--}}
                        @livewire('contact-form')
                    </div>
                </div>
                <div class="col-xl-6 col-lg-5">
                    <div class="contact-map mb-30">
{{--                        <div class="map-canvas">--}}
{{--                            <iframe class="map" id="gmap_canvas"--}}
{{--                                    src="https://maps.google.com/maps?q=Mission%20District%2C%20San%20Francisco%2C%20CA%2C%20USA&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"--}}
{{--                                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
