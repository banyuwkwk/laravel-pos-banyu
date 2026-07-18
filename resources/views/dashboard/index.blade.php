@extends('layouts.app')

@section('title', $title)

@section('content')

<x-ui.page-header
    :title="$title"
    :subtitle="$welcome" />

@include('dashboard.partials.stats')

@include('dashboard.partials.revenue')

@include('dashboard.partials.inventory')

@include('dashboard.partials.recent-transactions')

@include('dashboard.partials.chart')

<div class="row g-4">

    <div class="col-lg-6">
        @include('dashboard.partials.top-selling')
    </div>

    <div class="col-lg-6">
        @include('dashboard.partials.sales-category')
    </div>

</div>

@endsection