<div class="sidebar">

<div class="sidebar-logo">

Laravel POS

</div>

<a href="#">
🏠 Dashboard
</a>

<a href="#">
💰 Sales
</a>

<a href="#">
👤 Users
</a>
    
<a href="#">
🛡 Roles
</a>

<a href="#">
🔑 Permissions
</a>

<li class="nav-item">

    <a
        href="{{ route('products.index') }}"
        class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}">

        <i class="bi bi-box-seam"></i>

        <span>Products</span>

    </a>

</li>

@can('view sales')

<li class="nav-item">

    <a
        href="{{ route('transactions.index') }}"
        class="nav-link {{ request()->routeIs('transactions.*') ? 'active' : '' }}">

        <i class="bi bi-cart-check me-2"></i>

        Sales

    </a>

</li>

@endcan

<li class="nav-item">

    <a
        href="{{ route('categories.index') }}"
        class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">

        <i class="bi bi-tags"></i>

        <span>Categories</span>

    </a>

</li>

@can('view sales')

<li class="nav-item">

    <a
        href="{{ route('transactions.index') }}"
        class="nav-link {{ request()->routeIs('transactions.*') ? 'active' : '' }}">

        <i class="bi bi-cart-check"></i>

        <span>Transactions</span>

    </a>

</li>

@endcan

</div>