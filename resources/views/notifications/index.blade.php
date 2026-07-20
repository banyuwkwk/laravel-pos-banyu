@extends('layouts.app')

@section('title', 'Notifications')

@section('content')

<div class="card border-0 shadow-sm">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h5 class="mb-1">
                    Notifications
                </h5>

                <p class="text-muted mb-0">
                    Manage your notifications
                </p>

            </div>

<div class="d-flex gap-2">

    <form
        action="{{ route('notifications.read-all') }}"
        method="POST">

        @csrf
        @method('PATCH')

        <button
            class="btn btn-dark">

            Mark All Read

        </button>

    </form>


    <form
        action="{{ route('notifications.clear-read') }}"
        method="POST"
        onsubmit="return confirm('Clear all read notifications?')">

        @csrf
        @method('DELETE')

        <button
            class="btn btn-outline-danger">

            Clear Read

        </button>

    </form>

</div>

        </div>

        <div class="mb-4 d-flex gap-2">

            <a href="{{ route('notifications.index') }}"
            class="btn {{ empty($status) ? 'btn-dark' : 'btn-outline-dark' }}">

                All

            </a>

            <a href="{{ route('notifications.index', ['status' => 'unread']) }}"
            class="btn {{ ($status ?? '') == 'unread'
                    ? 'btn-dark'
                    : 'btn-outline-dark' }}">

                Unread

            </a>

            <a href="{{ route('notifications.index', ['status' => 'read']) }}"
            class="btn {{ ($status ?? '') == 'read'
                    ? 'btn-dark'
                    : 'btn-outline-dark' }}">

                Read

            </a>

        </div>

        <div class="row g-3 mb-4">

    <div class="col-md-4">

        <div class="card border-0 bg-light">

            <div class="card-body">

                <small class="text-muted">

                    Total Notifications

                </small>

                <h3 class="mb-0">

                    {{ $statistics['total'] }}

                </h3>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card border-0 bg-warning-subtle">

            <div class="card-body">

                <small class="text-muted">

                    Unread

                </small>

                <h3 class="mb-0">

                    {{ $statistics['unread'] }}

                </h3>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card border-0 bg-success-subtle">

            <div class="card-body">

                <small class="text-muted">

                    Read

                </small>

                <h3 class="mb-0">

                    {{ $statistics['read'] }}

                </h3>

            </div>

        </div>

    </div>

</div>

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>

                        <th>Notification</th>

                        <th>Date</th>

                        <th>Status</th>

                        <th width="120">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody>

                @forelse($notifications as $notification)

                    <tr>

                        <td>

                        @if(isset($notification->data['url']))

                        <a
                            href="{{ $notification->data['url'] }}"
                            class="text-decoration-none text-dark d-block">

                        @endif

                        <div class="d-flex align-items-start gap-3 notification-link">

                                <div
                                    class="rounded-circle d-flex align-items-center justify-content-center
                                    bg-{{ $notification->data['color'] ?? 'secondary' }}-subtle"
                                    style="width:44px;height:44px;">

                                    <i class="bi {{ $notification->data['icon'] ?? 'bi-bell' }}
                                    text-{{ $notification->data['color'] ?? 'secondary' }}"></i>

                                </div>

                                <div>

                                    <div class="fw-semibold">

                                        {{ $notification->data['title'] ?? 'Notification' }}

                                    </div>

                                    <small class="text-muted d-block">

                                        {{ $notification->data['message'] ?? '-' }}

                                    </small>

                                    <span class="badge bg-light text-dark mt-1">

                                        {{ ucfirst(str_replace('_', ' ', $notification->data['type'] ?? 'general')) }}

                                    </span>

                                </div>

                            </div>

                                @if(isset($notification->data['url']))
                                </a>
                                @endif

                            </td>

                        <td>

                            {{ $notification->created_at->diffForHumans() }}

                        </td>

<td>

    @if($notification->read_at)

        <span class="badge bg-success">
            Read
        </span>

    @else

        <span class="badge bg-warning text-dark">
            Unread
        </span>

    @endif

</td>

<td>

    <div class="d-flex gap-2">

        @if(!$notification->read_at)

            <form
                method="POST"
                action="{{ route('notifications.read', $notification->id) }}">

                @csrf
                @method('PATCH')

                <button
                    class="btn btn-sm btn-outline-dark">

                    Read

                </button>

            </form>

        @endif


        <form
            method="POST"
            action="{{ route('notifications.destroy', $notification->id) }}"
            onsubmit="return confirm('Delete this notification?')">

            @csrf
            @method('DELETE')

            <button
                class="btn btn-sm btn-outline-danger">

                <i class="bi bi-trash"></i>

            </button>

        </form>

    </div>

</td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="4"
                            class="text-center py-5">

                            No notifications found.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">

            {{ $notifications->links() }}

        </div>

    </div>

</div>

@endsection