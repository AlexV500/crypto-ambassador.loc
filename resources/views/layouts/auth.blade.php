<!DOCTYPE html>
<html lang="zxx" class="js">

<!-- Mirrored from demo.themenio.com/appsland/index-half-header.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Oct 2023 09:50:40 GMT -->
<head>
    <meta charset="utf-8">
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
    <link href="{{asset('assets/fonts/fontawesome/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">

{{--    <link href="{{asset('assets/js/particlesJS/particles.min.js')}}" rel="stylesheet">--}}
{{--    <link href="{{asset('assets/js/particlesJS/app.js')}}" rel="stylesheet">--}}


</head>
<body id="page-top">

<!-- Start .header-section -->

{{--<div id="particles-js"></div>--}}

    <!-- stats - count particles -->

<header class="header navbar-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="index-2.html">
                        <img src="assets/img/logo.svg" alt="Logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                        <ul id="nav" class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="{{route('main.index')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a @if(request()->url() == route('login')) class="page-scroll active" @else class="page-scroll" @endif href="{{route('login')}}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a @if(request()->url() == route('register')) class="page-scroll active" @else class="page-scroll" @endif href="{{route('register')}}">Register</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

@yield('content')


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
    <!-- Portfolio Modals-->

    <!-- Bootstrap core JS-->

    <!-- Core theme JS-->
{{--    <script src="{{asset('assets/js/scripts.js')}}js/scripts.js"></script>--}}
    <script src="{{asset('assets/bootstrap/dist/js/scripts.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>
