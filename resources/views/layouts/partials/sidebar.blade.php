<div class="sidebar">

    <div class="sidebar-logo">
        Laravel POS
    </div>

    {{-- Dashboard --}}
    @can('view dashboard')
    <li class="nav-item">

        <a
            href="{{ route('dashboard') }}"
            class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">

            <i class="bi bi-speedometer2"></i>

            <span>Dashboard</span>

        </a>

    </li>
    @endcan

    {{-- Categories --}}
    @can('view categories')
    <li class="nav-item">

        <a
            href="{{ route('categories.index') }}"
            class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">

            <i class="bi bi-tags"></i>

            <span>Categories</span>

        </a>

    </li>
    @endcan

    {{-- Products --}}
    @can('view products')
    <li class="nav-item">

        <a
            href="{{ route('products.index') }}"
            class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}">

            <i class="bi bi-box-seam"></i>

            <span>Products</span>

        </a>

    </li>
    @endcan

    {{-- Sales --}}
    @can('create sales')
    <li class="nav-item">

        <a
            href="{{ route('sales.create') }}"
            class="nav-link {{ request()->routeIs('sales.*') ? 'active' : '' }}">

            <i class="bi bi-cart-plus"></i>

            <span>Sales</span>

        </a>

    </li>
    @endcan

    {{-- Transactions --}}
    @can('view sales')
    <li class="nav-item">

        <a
            href="{{ route('transactions.index') }}"
            class="nav-link {{ request()->routeIs('transactions.*') ? 'active' : '' }}">

            <i class="bi bi-receipt"></i>

            <span>Transactions</span>

        </a>

    </li>
    @endcan

    @can('view reports')

<li class="nav-item">

    <a
        href="{{ route('reports.sales') }}"
        class="nav-link {{ request()->routeIs('reports.*') ? 'active' : '' }}">

        <i class="bi bi-graph-up-arrow me-2"></i>

        Sales Report

    </a>

</li>

@endcan

<form method="POST" action="{{ route('logout') }}">
    @csrf

    <button class="btn btn-outline-danger w-100">

        <i class="bi bi-box-arrow-right"></i>

        Logout

    </button>

</form>
</div>

