<nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
    <div class="container">

        <div class="navbar-left">
            <button class="navbar-toggler text-dark" type="button">&#9776;</button>
            <a class="navbar-brand" href="/">
                <img class="logo-dark" src="{{ asset('img/logo-dark.png') }}" alt="logo">
                <img class="logo-light" src="{{ asset('img/logo-dark.png') }}" alt="logo">
            </a>
        </div>


        <section class="navbar-mobile">
            <span class="navbar-divider d-mobile-none"></span>
            <ul class="nav nav-navbar">
                <a class="navbar-brand sm-nav" href="/" style="display:none">
                    <img class="logo-dark" src="{{ asset('img/logo-dark.png') }}" alt="logo">
                    <img class="logo-light" src="{{ asset('img/logo-dark.png') }}" alt="logo">
                </a>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Categories <span class="arrow"></span></a>
                    <ul class="nav">

                        @foreach($categories as $category)
                        <li class="nav-item text-capitalize">
                            <a class="nav-link" href="{{ route('shop-categories.show', $category->slug) }}" class="text-capitalize">{{ $category->name }}</a>
                        </li>
                        @endforeach

                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('orders.index') }}">Orders </a>
                </li>
            </ul>
            <ul class="nav nav-navbar ml-auto">

                @guest
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @if(auth()->user()->hasAdminAccess())
                        <a href="{{ route('home') }}" class="dropdown-item">Go to admin</a>
                        @endif
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest

                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link text-dark" href="{{ route('carts.index') }}">
                        <i class="fa fa-shopping-cart cart-icon" aria-hidden="true"></i>
                    </a>
                    <span class="badge badge-danger d-flex align-items-center justify-content-center cart-count" style="width:15px; height:15px">
                        @auth
                        {{ Cart::session(auth()->id())->getContent()->count() }}
                        @else
                        0
                        @endauth
                    </span>
                </li>


            </ul>
        </section>





    </div>
</nav>