<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="js">

<!-- Mirrored from demo.themenio.com/appsland/index-half-header.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Oct 2023 09:50:40 GMT -->
<head>
    <meta charSet="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AppsLand is a powerful App Landing HTML Template with full of customization options and features">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="images/favicon.png">
    <!-- Site Title  -->
    <title>AppsLand - App Landing HTML Template</title>
    <!-- Vendor Bundle CSS -->
    <!--  <link rel="stylesheet" href="assets/css/vendor.bundle.css" >-->
     <!-- Custom styles for this template -->
{{--    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet">--}}

    <link href="{{asset('assets/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap-social.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/LineIcons.2.0.css')}}" rel="stylesheet">
    <link href="{{asset('assets/fonts/fontawesome/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
{{--    @livewireStyles--}}
{{--    <link href="{{asset('assets/js/particlesJS/particles.min.js')}}" rel="stylesheet">--}}
{{--    <link href="{{asset('assets/js/particlesJS/app.js')}}" rel="stylesheet">--}}


</head>
<body>

<!-- Start .header-section -->

{{--<div id="particles-js"></div>--}}

    <!-- stats - count particles -->

<x-header></x-header>

@yield('content')

<footer class="footer pt-100 img-bg" style="background-image: url({{asset('assets/img/common-bg.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="footer-widget mb-60 wow fadeInLeft" data-wow-delay=".2s">
                    <a href="index-2.html" class="logo mb-40"><img src="{{asset('assets/img/logo.svg')}}" alt></a>
                    <p class="mb-30">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed dianonumy eirmod
                        tempor invidunt ut labore.</p>
                    <div class="footer-social-links">
                        <ul>
                            <li><a href="#"><i class="lni lni-facebook-filled"></i></a></li>
                            <li><a href="#"><i class="lni lni-twitter-filled"></i></a></li>
                            <li><a href="#"><i class="lni lni-linkedin-original"></i></a></li>
                            <li><a href="#"><i class="lni lni-instagram-original"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6">
                <div class="footer-widget mb-60 wow fadeInUp" data-wow-delay=".4s">
                    <h4>Company</h4>
                    <ul class="footer-links">
                        <li>
                            <a href="javascript:void(0)">Home</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">About</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">Service</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">Team</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">Contact</a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="footer-widget mb-60 wow fadeInUp" data-wow-delay=".6s">
                    <h4>Resource</h4>
                    <ul class="footer-links">
                        <li>
                            <a href="javascript:void(0)">Documentation</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">IOS & Android Apps</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">Support Forum</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">Terms Conditions</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="footer-widget mb-60 wow fadeInRight" data-wow-delay=".8s">
                    <h4>Resource</h4>
                    <ul>
                        <li class="mb-30">
                            <p>Company No: C5B345 <br>
                                CSINE GROUP LTD.</p>
                        </li>
                        <li>
                            <p>Address: M-321 Volunt Ave, <br> Staten Islandm, NY 201526</p>
                        </li>
                    </ul>
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


<a href="#" class="scroll-top">
    <i class="lni lni-chevron-up"></i>
</a>
    <!-- Portfolio Modals-->

    <!-- Bootstrap core JS-->

    <!-- Core theme JS-->
{{--    <script src="{{asset('assets/js/scripts.js')}}js/scripts.js"></script>--}}

{{--<script src="https://www.google.com/recaptcha/api.js?render={{config('services.recaptcha.site_key')}}"></script>--}}
    <script src="{{asset('assets/bootstrap/dist/js/bootstrap.bundle.js')}}"></script>

    <script src="{{asset('assets/js/main.js')}}"></script>
{{--    @livewireScripts--}}
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
{{--    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>--}}
</body>
</html>
