<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background: rgba(12, 12, 12, 0.2)">
    <div class="container">
        <a class="navbar-brand fs-1 pt-0 pb-0 font-bold" href="{{ route('welcome', app()->getLocale()) }}">CVAARS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                {{-- <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li> --}}
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li> --}}
            </ul>
            <ul class="navbar-nav" style="font-weight: bolder; color: black">
                <li class="nav-item">
                    <a class="nav-link @if(App::isLocale('si')) active @endif"
                        href="{{ route(Route::currentRouteName(), 'si') }}">සිංහල</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">/</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(App::isLocale('ta')) active @endif" href="
                        {{ route(Route::currentRouteName(), 'ta') }}">தமிழ்</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">/</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(App::isLocale('en')) active @endif" href="
                        {{ route(Route::currentRouteName(), 'en') }}">English</a>
                </li>
            </ul>
            <div class="d-flex ms-4">
                <a href="{{ route('login') }}" class="btn btn-outline-dark rounded-full px-3">Login</a>
            </div>
        </div>
    </div>
</nav>
