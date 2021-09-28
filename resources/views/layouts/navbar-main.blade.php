<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background: rgba(12, 12, 12, 0.2)">
    <div class="container">
        <a class="navbar-brand fs-1 pt-0 pb-0 font-bold" href="{{ route('welcome', app()->getLocale()) }}">CVAARS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
            @auth
            <div class="d-flex ms-4">
                <a href="{{ route('home') }}" class="btn btn-outline-dark rounded-full px-3">Home</a>
            </div>
            @else
            <div class="d-flex ms-4">
                <a href="{{ route('login') }}" class="btn btn-outline-dark rounded-full px-3">Login</a>
            </div>
            @endauth

        </div>
    </div>
</nav>
