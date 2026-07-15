@extends('layouts.app')

@section('title', $title)

@section('content')

<x-ui.page-header
    :title="$title"
    :subtitle="$welcome" />

<div class="row g-4">

    <div class="col-md-3">
        <x-ui.card>
            <h6 class="text-muted mb-2">Total Products</h6>
            <h2>{{ $stats['products'] }}</h2>
        </x-ui.card>
    </div>

    <div class="col-md-3">
        <x-ui.card>
            <h6 class="text-muted mb-2">Categories</h6>
            <h2>{{ $stats['categories'] }}</h2>
        </x-ui.card>
    </div>

    <div class="col-md-3">
        <x-ui.card>
            <h6 class="text-muted mb-2">Today's Sales</h6>
            <h2>{{ $stats['sales_today'] }}</h2>
        </x-ui.card>
    </div>

    <div class="col-md-3">
        <x-ui.card>
            <h6 class="text-muted mb-2">Users</h6>
            <h2>{{ $stats['users'] }}</h2>
        </x-ui.card>
    </div>

</div>

<div class="row mt-4">

    {{-- Low Stock --}}
    <div class="col-lg-6">

        <x-ui.card>

            <h5 class="mb-3">
                <i class="bi bi-exclamation-triangle text-warning"></i>
                Low Stock Products
            </h5>

            @forelse($lowStocks as $product)

                <div class="d-flex justify-content-between border-bottom py-2">

                    <span>{{ $product->name }}</span>

                    <span class="badge bg-danger">
                        {{ $product->stock }}
                    </span>

                </div>

            @empty

                <p class="text-muted mb-0">
                    No products found.
                </p>

            @endforelse

        </x-ui.card>

    </div> {{-- Tutup col pertama --}}

    {{-- Latest Product --}}
    <div class="col-lg-6">

        <x-ui.card>

            <h5 class="mb-3">
                <i class="bi bi-box-seam text-primary"></i>
                Latest Products
            </h5>

            @forelse($latestProducts as $product)

                <div class="d-flex justify-content-between border-bottom py-2">

                    <span>{{ $product->name }}</span>

                    <small class="text-muted">
                        {{ $product->created_at->format('d M Y') }}
                    </small>

                </div>

            @empty

                <p class="text-muted mb-0">
                    No products found.
                </p>

            @endforelse

        </x-ui.card>

    </div> {{-- Tutup col kedua --}}

</div> {{-- Tutup row --}}

@endsection