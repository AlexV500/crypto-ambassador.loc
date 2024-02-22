<li class="">
    <div class="dropdown">
        <a class="btn dropdown-nav-theme-btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ $getLocaleName }}
        </a>

        <ul class="dropdown-menu">
            @foreach ($locales as $localeName => $link)
                <li class="dropdown-item">
                    <a class="nav-link" href="{{$link}}">{{ $localeName }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</li>
