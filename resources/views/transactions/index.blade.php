@extends('layouts.app')

@section('title', $title)

@section('content')

<x-ui.page-header
    :title="$title"
    subtitle="Transaction History" />

<div class="d-flex justify-content-end mb-3">

    @can('create sales')

    <a
        href="{{ route('sales.create') }}"
        class="btn btn-primary">

        <i class="bi bi-plus-circle me-2"></i>

        New Sale

    </a>

    @endcan

</div>

<x-ui.card>

    <div class="text-center py-5">

        <i class="bi bi-receipt fs-1 text-secondary"></i>

        <h5 class="mt-3">

            No Transactions Yet

        </h5>

        <p class="text-muted">

            Start your first sales transaction.

        </p>

    </div>

</x-ui.card>

@endsection