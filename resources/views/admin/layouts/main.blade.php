<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
{{--    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">--}}
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
{{--    <!-- Tempusdominus Bootstrap 4 -->--}}
{{--    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">--}}
{{--    <!-- iCheck -->--}}
{{--    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">--}}
{{--    <!-- JQVMap -->--}}
{{--    <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">--}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">

    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">

    <link href="{{asset('assets/fonts/fontawesome-free-6.4.2-web/css/all.min.css')}}" rel="stylesheet">
{{--    <!-- summernote -->--}}
{{--    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">--}}
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <div class="col-12 d-flex justify-content-between">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="">
                    <div class="dropdown">
                        <a class="btn dropdown-nav-theme-btn dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            {{ $getLocaleName }}
                        </a>

                        <ul class="dropdown-menu">
                            @foreach ($locales as $index => $localeName)
                                <li class="dropdown-item">
                                    <a class="nav-link" href="{{ UrlLocal::localize($index, 'admin') }}">{{ $localeName }}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <input class="btn btn-outline-primary" type="submit" value="Вийти">
                    </form>
                </li>

            </ul>
        </div>
    </nav>
    <!-- /.navbar -->



    @include('admin.includes.sidebar')
    @yield('content')

    <footer class="main-footer">
        <strong>Copyright &copy; 2023 <a href="https://crypto-ambassador.com">crypto-ambassador.com</a>.</strong>
        All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
{{--<!-- Bootstrap 4 -->--}}
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
{{--<!-- ChartJS -->--}}
{{--<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>--}}
{{--<!-- Sparkline -->--}}
{{--<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>--}}
{{--<!-- JQVMap -->--}}
{{--<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>--}}
{{--<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>--}}
{{--<!-- jQuery Knob Chart -->--}}
{{--<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>--}}
{{--<!-- daterangepicker -->--}}
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
{{--<!-- Tempusdominus Bootstrap 4 -->--}}
{{--<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>--}}
{{--<!-- Summernote -->--}}
{{--<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>--}}
{{--<!-- overlayScrollbars -->--}}
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('plugins/summernote/lang/summernote-ru-RU.min.js')}}"></script>
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
{{--<!-- AdminLTE for demo purposes -->--}}
{{--<script src="{{asset('dist/js/demo.js')}}"></script>--}}
{{--<!-- AdminLTE dashboard demo (This is only for demo purposes) -->--}}
{{--<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>--}}
{{--<script src="https://kit.fontawesome.com/dbc1ab50bd.js" crossorigin="anonymous"></script>--}}
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 300,
            lang: 'ru-RU',
            lineHeights: ['0.2', '0.3', '0.4', '0.5', '0.6', '0.8', '1.0', '1.2', '1.4', '1.5', '2.0', '3.0'],
            styleTags: [
                'p',
                { title: 'Blockquote', tag: 'blockquote', className: 'blockquote', value: 'blockquote' },
                'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
            ],
            popover: {
                image: [
                    ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']]
                ],
                link: [
                    ['link', ['linkDialogShow', 'unlink']]
                ],
                table: [
                    ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                    ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
                ],
                air: [
                    ['color', ['color']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['para', ['ul', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']]
                ]
            },


            toolbar: [
                // [groupName, [list of button]]
                ['insert', ['link', 'picture', 'video', 'table', 'hr']],
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize', 'fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph', 'style']],
                ['height', ['height', 'codeview']]
            ]

        });
        $('#summernote_m_d').summernote({
            height: 300,
            lang: 'ru-RU',
             toolbar: [
            //     [groupName, [list of button]]
            //     ['style', ['bold', 'italic', 'underline', 'clear']],
            //     ['font', ['strikethrough', 'superscript', 'subscript']],
            //     ['fontsize', ['fontsize']],
            //     ['color', ['color']],
                 ['para', ['ul', 'ol', 'paragraph']],
            //     ['height', ['height']]
             ]
        });
    });

    $(function () {
        convert = () => { alert('TEST');
            let t = $("#form-title").val();
            t = t.toLowerCase(); //t is the title received
            t = t.trim(); // trim the spaces from start and end
            let slug = t.replace(/[^a-z0-9]+/g, '-'); // replace all the spaces with "-"
             $("#urlSlug").val(slug);
            // document.getElementById('urlSlug').value = slug;
            // document.getElementById('urlSlug').style.border="0.1px solid green";
        }
    });

    $(function () {

        bsCustomFileInput.init();
    });
    $('.select2').select2()
</script>
<style>
    .custom-file-input:lang(en)~.custom-file-label::after {
        content: "Вибрати Зображення";
    }
</style>
</body>
</html>
