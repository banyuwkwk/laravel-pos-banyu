@extends('layouts.app')

@section('title', $title)

@section('content')

<x-ui.page-header
    :title="$title"
    subtitle="Transaction History" />

<div class="d-flex justify-content-between align-items-center mb-4">

    <div></div>

    @can('create sales')

    <a
        href="{{ route('sales.create') }}"
        class="btn btn-primary">

        <i class="bi bi-plus-circle me-2"></i>

        New Sale

    </a>

    @endcan

</div>

@include('transactions.partials.filter')

@include('transactions.partials.table')

@endsection