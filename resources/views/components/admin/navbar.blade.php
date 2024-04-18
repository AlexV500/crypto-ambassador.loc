<div>
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
                        @foreach ($locales as $localeName => $localeLink)
                            <li class="dropdown-item">
                                <a class="nav-link" href="{{$localeLink}}">{{ $localeName }}</a>
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
</div>
