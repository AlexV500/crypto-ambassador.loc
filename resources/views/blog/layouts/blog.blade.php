<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog Post - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome -->
{{--    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">--}}
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('assets/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
{{--    <link href="{{asset('assets/css/blog/styles.css')}}" rel="stylesheet">--}}
    <link href="{{asset('assets/css/blog/custom.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/LineIcons.2.0.css')}}" rel="stylesheet">
{{--    <link href="{{asset('assets/fonts/fontawesome/css/all.min.css')}}" rel="stylesheet">--}}
    <link href="{{asset('assets/fonts/fontawesome-free-6.4.2-web/css/all.min.css')}}" rel="stylesheet">

</head>
<body>

<x-blog-header :siteEntity="$siteEntity"></x-blog-header>

<section id="home" class="hero-section">
    <div class="shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-7 col-lg-7">
                <div class="hero-content-wrapper">
                    <h1 class="text-white wow fadeInDown" data-wow-delay=".2s">Blog</h1>

                </div>
            </div>
            <div class="col-xl-5 col-lg-5">
{{--                <div class="hero-img">--}}
{{--                    <img src="{{asset('assets/img/hero-img.svg')}}" alt class="wow fadeInRight" data-wow-delay=".5s">--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</section>
<!-- Page content-->
<div class="container blog-content pt-80 mb-5">
    <div class="row">


        @yield('content')
        @include('blog.includes.blogsidebar')


    </div>
</div>

{{--<footer class="footer pt-100 img-bg" style="background-image: url({{asset('assets/img/common-bg.jpg')}})">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-xl-4 col-lg-4 col-md-6">--}}
{{--                <div class="footer-widget mb-60 wow fadeInLeft" data-wow-delay=".2s">--}}
{{--                    <a href="index-2.html" class="logo mb-40"><img src="{{asset('assets/img/logo.svg')}}" alt></a>--}}
{{--                    <p class="mb-30">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed dianonumy eirmod--}}
{{--                        tempor invidunt ut labore.</p>--}}
{{--                    <div class="footer-social-links">--}}
{{--                        <ul>--}}
{{--                            <li><a href="#"><i class="lni lni-facebook-filled"></i></a></li>--}}
{{--                            <li><a href="#"><i class="lni lni-twitter-filled"></i></a></li>--}}
{{--                            <li><a href="#"><i class="lni lni-linkedin-original"></i></a></li>--}}
{{--                            <li><a href="#"><i class="lni lni-instagram-original"></i></a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-2 col-lg-2 col-md-6">--}}
{{--                <div class="footer-widget mb-60 wow fadeInUp" data-wow-delay=".4s">--}}
{{--                    <h4>Company</h4>--}}
{{--                    <ul class="footer-links">--}}
{{--                        <li>--}}
{{--                            <a href="javascript:void(0)">Home</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="javascript:void(0)">About</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="javascript:void(0)">Service</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="javascript:void(0)">Team</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="javascript:void(0)">Contact</a>--}}
{{--                        </li>--}}

{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-3 col-lg-3 col-md-6">--}}
{{--                <div class="footer-widget mb-60 wow fadeInUp" data-wow-delay=".6s">--}}
{{--                    <h4>Resource</h4>--}}
{{--                    <ul class="footer-links">--}}
{{--                        <li>--}}
{{--                            <a href="javascript:void(0)">Documentation</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="javascript:void(0)">IOS & Android Apps</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="javascript:void(0)">Privacy Policy</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="javascript:void(0)">Support Forum</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="javascript:void(0)">Terms Conditions</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-3 col-lg-3 col-md-6">--}}
{{--                <div class="footer-widget mb-60 wow fadeInRight" data-wow-delay=".8s">--}}
{{--                    <h4>Resource</h4>--}}
{{--                    <ul>--}}
{{--                        <li class="mb-30">--}}
{{--                            <p>Company No: C5B345 <br>--}}
{{--                                CSINE GROUP LTD.</p>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <p>Address: M-321 Volunt Ave, <br> Staten Islandm, NY 201526</p>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="copyright-area">--}}
{{--            <p class="mb-0 text-white text-center">Designed and Developed By <a href="https://uideck.com/"--}}
{{--                                                                                rel="nofollow"--}}
{{--                                                                                target="_blank">UIdeck</a></p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</footer>--}}

<!-- Footer-->
<footer class="footer pt-100 img-bg" style="background-image: url({{asset('assets/img/common-bg.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="footer-widget mb-60 wow fadeInLeft" data-wow-delay=".2s">
                    <a href="index-2.html" class="logo mb-40"><img src="{{asset('assets/img/logo.svg')}}" alt></a>
                    <p class="mb-30">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed dianonumy eirmod
                        tempor invidunt ut labore.</p>

                </div>
            </div>
        </div>
        <div class="copyright-area">
            <p class="mb-0 text-white text-center">Designed and Developed By <a href="https://uideck.com/"
                                                                                rel="nofollow"
                                                                                target="_blank">UIdeck</a></p>
        </div>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="{{asset('assets/bootstrap/dist/js/bootstrap.bundle.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<!-- Core theme JS-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>
