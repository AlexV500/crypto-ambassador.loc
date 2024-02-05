<header class="header navbar-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="index-2.html">
                        <img src="assets/img/logo.svg" alt="Logo">
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                        <ul id="nav" class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="page-scroll active" href="#home">{{__('lang.Home')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="page-scroll" href="#about">{{__('lang.About')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="page-scroll" href="#blog">{{__('lang.Blog')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="page-scroll" href="#partnership">{{__('lang.Partnership')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="page-scroll" href="#ambassadors">{{__('lang.Ambassadors')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="page-scroll" href="#roadmap">{{__('lang.Roadmap')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="page-scroll" href="#contact">{{__('lang.Contact')}}</a>
                            </li>


                            @guest()
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('login')}}">Login</a>
                                </li>
                            @endguest
                            @auth()
                                <li class="">
                                    <div class="dropdown">
                                        <a class="btn dropdown-nav-theme-btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="lni lni-user"></i>
                                        </a>

                                        <ul class="dropdown-menu">

                                            @if($isAdmin)
                                                <li class="dropdown-item">
                                                    <a class="nav-link" href="{{route('admin')}}">Admin Panel</a>
                                                </li>
                                            @endif
                                            <li class="dropdown-item">
                                                Welcome, {{ auth()->user()->name }}
                                            </li>
                                            <li class="dropdown-item">
                                                <a class="nav-link" href="{{route('personal.main.index')}}">Personal Cabinet</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <input class="btn btn-sm btn-primary" type="submit" value="Logout">
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endauth

                            <li class="">
                                <div class="dropdown">
                                    <a class="btn dropdown-nav-theme-btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ $getLocaleName }}
                                    </a>

                                    <ul class="dropdown-menu">
                                        @foreach ($locales as $index => $localeName)
                                            <li class="dropdown-item">
                                                <a class="nav-link" href="{{ UrlLocal::localize($index) }}">{{ $localeName }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
