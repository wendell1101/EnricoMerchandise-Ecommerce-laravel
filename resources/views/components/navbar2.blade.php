<nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
    <div class="container">

        <div class="navbar-left">
            <button class="navbar-toggler" type="button">&#9776;</button>
            <a class="navbar-brand" href="/">
                <img class="logo-dark" src="{{ asset('img/logo-dark.png') }}" alt="logo">
                <img class="logo-light" src="{{ asset('img/logo-dark.png') }}" alt="logo">
            </a>
        </div>

        <section class="navbar-mobile">
            <span class="navbar-divider d-mobile-none"></span>

            <ul class="nav nav-navbar ml-auto">
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