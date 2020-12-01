<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link @if(Request::is('admin')) active @else '' @endif">
    <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('users.index') }}" class="nav-link @if(Request::is('users')) active @else '' @endif">
        <i class="nav-icon fas fa-users"></i>
        <p>Users</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('products.index') }}" class="nav-link @if(Request::is('products')) active @else '' @endif">
    <i class="nav-icon fab fa-product-hunt"></i>
        <p>Products</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('categories.index') }}" class="nav-link @if(Request::is('categories')) active @else '' @endif">
    <i class="nav-icon fab fa-product-hunt"></i>
        <p>Categories</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('labels.index') }}" class="nav-link @if(Request::is('labels')) active @else '' @endif">
    <i class="nav-icon fab fa-product-hunt"></i>
        <p>Labels</p>
    </a>
</li>

