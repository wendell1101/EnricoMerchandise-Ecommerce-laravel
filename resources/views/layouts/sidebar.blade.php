<aside class="main-sidebar sidebar-light-success elevation-4">
    <a href="/" class="brand-link d-flex align-items-center">
        <img src="{{ asset('img/admin.png') }}"
             alt="logo"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light"><img src="{{ asset('img/logo-dark.png') }}" alt=""></span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside>
