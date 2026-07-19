@extends('layouts.app')

@section('title', 'Activity Logs')

@section('content')

<div class="card border-0 shadow-sm">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h5 class="mb-1">
                    Activity Logs
                </h5>

                <p class="text-muted mb-0">
                    Monitor user activity in system
                </p>
            </div>

        </div>

        <form method="GET"
      class="card p-3 mb-4">

<div class="row g-3">


<div class="col-md-3">

<select name="user"
class="form-select">

<option value="">
All Users
</option>


@foreach($users as $user)

<option value="{{ $user->id }}"
@if(($filters['user'] ?? '') == $user->id)
selected
@endif
>

{{ $user->name }}

</option>

@endforeach

</select>

</div>



<div class="col-md-3">

<select name="action"
class="form-select">


<option value="">
All Actions
</option>


<option value="created"
{{ ($filters['action'] ?? '') == 'created'
? 'selected'
: '' }}>
Created
</option>


<option value="updated"
{{ ($filters['action'] ?? '') == 'updated'
? 'selected'
: '' }}>
Updated
</option>


<option value="deleted"
{{ ($filters['action'] ?? '') == 'deleted'
? 'selected'
: '' }}>
Deleted
</option>


</select>

</div>



<div class="col-md-2">

<input type="date"
name="start_date"
class="form-control"
value="{{ $filters['start_date'] ?? '' }}">

</div>



<div class="col-md-2">

<input type="date"
name="end_date"
class="form-control"
value="{{ $filters['end_date'] ?? '' }}">

</div>



<div class="col-md-2 d-flex gap-2">

<button class="btn btn-dark w-100">
Filter
</button>

<a href="{{ route('activity-logs.index') }}"
class="btn btn-light border w-100">
Reset
</a>

</div>


</div>

</form>


        <div class="table-responsive">

            <table class="table align-middle">

                <thead>
                    <tr>
                        <th>User</th>
                        <th>Activity</th>
                        <th>Description</th>
                        <th>Time</th>
                        <th width="80">Action</th>
                    </tr>
                </thead>


                <tbody>

                @forelse($logs as $log)

                    <tr>

                        <td>

                            @if($log->causer)

                                <strong>
                                    {{ $log->causer->name }}
                                </strong>

                            @else

                                <span class="text-muted">
                                    System
                                </span>

                            @endif

                        </td>


                        <td>

@php

    $action = strtolower(
        explode(' ', $log->description)[0] ?? ''
    );


    $badge = match($action) {

        'created' => 'bg-success',

        'updated' => 'bg-warning text-dark',

        'deleted' => 'bg-danger',

        'login' => 'bg-primary',

        'upgrade' => 'bg-info text-dark',

        default => 'bg-secondary',

    };


    $icon = match($action) {

        'created' => 'bi-plus-circle',

        'updated' => 'bi-pencil-square',

        'deleted' => 'bi-trash',

        'login' => 'bi-box-arrow-in-right',

        'upgrade' => 'bi-arrow-up-circle',

        default => 'bi-clock-history',

    };

@endphp


<span class="badge {{ $badge }} d-inline-flex align-items-center gap-1">

    <i class="bi {{ $icon }}"></i>

    {{ ucfirst($action ?: 'action') }}

</span>

                        </td>


                        <td>

                            <div class="fw-medium">
    {{ $log->description }}
</div>

<small class="text-muted">
    {{ class_basename($log->subject_type ?? '') }}
</small>

                        </td>


                        <td>

                            <span class="text-muted">

                                {{ $log->created_at->diffForHumans() }}

                            </span>

                        </td>

                        <td>

<button
class="btn btn-sm btn-light border"
data-bs-toggle="modal"
data-bs-target="#activityModal{{ $log->id }}">

<i class="bi bi-eye"></i>

</button>

</td>

                    </tr>

                    <div class="modal fade"
id="activityModal{{ $log->id }}"
tabindex="-1">

<div class="modal-dialog">

<div class="modal-content">


<div class="modal-header">

<h5 class="modal-title">
Activity Detail
</h5>


<button
type="button"
class="btn-close"
data-bs-dismiss="modal">
</button>

</div>


<div class="modal-body">


<div class="mb-3">

    <small class="text-muted">
        <i class="bi bi-person"></i>
        User
    </small>

    <div class="fw-semibold">
        {{ $log->causer->name ?? 'System' }}
    </div>

</div>



<div class="mb-3">

    <small class="text-muted">
        <i class="bi bi-lightning"></i>
        Action
    </small>


    <div>

        @php

            $action = strtolower(
                explode(' ', $log->description)[0] ?? ''
            );


            $badge = match($action){

                'created' => 'bg-success',

                'updated' => 'bg-warning text-dark',

                'deleted' => 'bg-danger',

                default => 'bg-secondary',

            };

        @endphp


        <span class="badge {{ $badge }}">
            {{ ucfirst($action) }}
        </span>


    </div>

</div>



<div class="mb-3">

    <small class="text-muted">

        <i class="bi bi-box"></i>
        Module

    </small>


    <div class="fw-semibold">

        {{ class_basename($log->subject_type ?? '') }}

    </div>

</div>



<div class="mb-3">

    <small class="text-muted">

        <i class="bi bi-card-text"></i>
        Description

    </small>


    <div>

        {{ $log->description }}

    </div>

</div>



<div class="mb-3">

    <small class="text-muted">

        <i class="bi bi-clock"></i>
        Time

    </small>


    <div>

        {{ $log->created_at->format('d M Y H:i') }}

    </div>

</div>



@if($log->properties)


<hr>


<div>

<strong>
Properties
</strong>


<pre class="bg-light rounded p-3 mt-2 small">
{{ json_encode(
    $log->properties,
    JSON_PRETTY_PRINT
) }}
</pre>


</div>


@endif


</div>

</div>

</div>

</div>


@empty

<tr>

    <td colspan="4">

        <div class="text-center py-5">

            <div class="mb-3">

                <i class="bi bi-clock-history fs-1 text-muted"></i>

            </div>


            <h6 class="fw-semibold mb-2">
                No Activity Found
            </h6>


            <p class="text-muted mb-3">
                Tidak ada aktivitas yang cocok
                dengan filter saat ini.
            </p>


            @if(request()->hasAny([
                'user',
                'action',
                'start_date',
                'end_date'
            ]))

                <a href="{{ route('activity-logs.index') }}"
                   class="btn btn-sm btn-dark">

                    Reset Filter

                </a>

            @endif


        </div>

    </td>

</tr>

@endforelse


                </tbody>

            </table>

        </div>


        <div class="mt-3">

            {{ $logs->links() }}

        </div>


    </div>

</div>

@endsection