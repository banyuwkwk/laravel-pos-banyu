<nav class="navbar-custom">

    <h5 class="mb-0">
        @yield('title')
    </h5>

    <div class="d-flex align-items-center gap-3">

        {{-- Notification --}}
        <div class="dropdown">

            <button
                type="button"
                class="btn btn-light position-relative"
                data-bs-toggle="dropdown"
                aria-expanded="false">

                <i class="bi bi-bell fs-5"></i>

                @if($notifications->count())

                    <span
                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                        {{ $notifications->count() }}

                    </span>

                @endif

            </button>

            <div
                class="dropdown-menu dropdown-menu-end shadow border-0 p-0"
                style="min-width: 320px;">

                <div class="px-3 py-2 border-bottom">

                    <strong>

                        Low Stock Notification

                    </strong>

                </div>

                @forelse($notifications as $product)

                    <div class="dropdown-item py-3">

                        <div class="d-flex justify-content-between align-items-center">

                            <strong>

                                {{ $product->name }}

                            </strong>

                            <span class="badge {{ $product->stock <= 2 ? 'bg-danger' : 'bg-warning text-dark' }}">

                                {{ $product->stock }}

                            </span>

                        </div>

                        <small class="text-muted">

                            Restock recommended.

                        </small>

                    </div>

                @empty

                    <div class="dropdown-item text-center py-4">

                        <i class="bi bi-check-circle text-success fs-3"></i>

                        <br>

                        No low stock products.

                    </div>

                @endforelse

                @if($notifications->count())

                    <div class="border-top">

                        <a
                            href="{{ route('products.index') }}"
                            class="dropdown-item text-center py-2">

                            View Inventory

                        </a>

                    </div>

                @endif

            </div>

        </div>

        {{-- User --}}
        <span class="fw-semibold">

            Administrator

        </span>

    </div>

</nav>