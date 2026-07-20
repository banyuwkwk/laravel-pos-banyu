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

                @if($navbarNotifications->count())

                    <span
                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                        {{ $navbarNotifications->count() }}

                    </span>

                @endif

            </button>

            <div
                class="dropdown-menu dropdown-menu-end shadow border-0 p-0"
                style="min-width: 320px;">

                <div class="px-3 py-2 border-bottom">

                    <strong>

                        Notifications

                    </strong>

                </div>

                @forelse($navbarNotifications as $notification)

                <form
                    class="m-0"
                    method="POST"
                    action="{{ route('notifications.read', $notification->id) }}">

                    @csrf
                    @method('PATCH')

                    <button
                        type="submit"
                        class="dropdown-item py-3 border-0 bg-transparent text-start w-100">

                        <div class="d-flex align-items-start gap-2">

                            <i class="bi {{ $notification->data['icon'] ?? 'bi-bell' }}
                                text-{{ $notification->data['color'] ?? 'secondary' }}"></i>

                            <div class="flex-grow-1">

                                <div class="fw-semibold">
                                    {{ $notification->data['title'] ?? 'Notification' }}
                                </div>

                                <small class="text-muted d-block">
                                    {{ $notification->data['message'] ?? '-' }}
                                </small>

                                <small class="text-muted">
                                    {{ $notification->created_at->diffForHumans() }}
                                </small>

                            </div>

                        </div>

                    </button>

                </form>

                @empty

                <div class="dropdown-item text-center py-4">

                    <i class="bi bi-check-circle text-success fs-3"></i>

                    <br>

                    No Notifications

                </div>

                @endforelse

                        <div class="border-top">

                            <a
                                href="{{ route('notifications.index') }}"
                                class="dropdown-item text-center py-2">

                                View All Notifications

                            </a>

                        </div>

            </div>

        </div>

        {{-- User --}}
        <span class="fw-semibold">

            Administrator

        </span>

    </div>

</nav>