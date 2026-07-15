@extends('layouts.app')

@section('title', 'Products')

@section('content')

<x-ui.page-header
    title="Products"
    subtitle="Manage product inventory" />

<div class="row mb-4">

    <div class="col-md-6">

        <x-ui.search-box
            placeholder="Search product..." />

    </div>

    <div class="col-md-6 text-end">

        @can('create products')
        <a
            href="{{ route('products.create') }}"
            class="btn btn-primary">

            <i class="bi bi-plus-lg"></i>

            Add Product

        </a>
        @endcan
    </div>

</div>

<x-ui.card>

<table class="table align-middle">

<thead>

<tr>

<th width="80">

Image

</th>

<th>

Product

</th>

<th>

Category

</th>

<th width="140">

Price

</th>

<th width="100">

Stock

</th>

<th width="120">

Status

</th>

<th width="170">

Action

</th>

</tr>

</thead>

<tbody>

@forelse($products as $product)

<tr>

<td>

@if($product->image)

<img
src="{{ asset('storage/'.$product->image) }}"
width="60"
class="rounded">

@else

<div
class="bg-light rounded d-flex justify-content-center align-items-center"
style="width:60px;height:60px;">

<i class="bi bi-image text-secondary"></i>

</div>

@endif

</td>

<td>

<strong>

{{ $product->name }}

</strong>

<br>

<small class="text-muted">

{{ $product->sku }}

</small>

</td>

<td>

{{ $product->category->name }}

</td>

<td>

Rp {{ number_format($product->price,0,',','.') }}

</td>

<td>

@if($product->stock <= 10)

<span class="badge bg-danger">

{{ $product->stock }}

</span>

@elseif($product->stock <=30)

<span class="badge bg-warning text-dark">

{{ $product->stock }}

</span>

@else

<span class="badge bg-success">

{{ $product->stock }}

</span>

@endif

</td>

<td>

<x-ui.status-badge
:active="$product->is_active"/>

</td>

<td>

<div class="d-flex gap-2">
    
@can('update products')
<a
href="{{ route('products.edit',$product) }}"
class="btn btn-warning btn-sm">

<i class="bi bi-pencil"></i>

</a>
@endcan

@can('delete products')
<button
class="btn btn-danger btn-sm"
data-bs-toggle="modal"
data-bs-target="#delete{{ $product->id }}">

<i class="bi bi-trash"></i>

</button>
@endcan

</div>

<x-ui.confirm-delete
:id="'delete'.$product->id"
:title="'Delete Product'"
:message="'Are you sure you want to delete '.$product->name.'?'"
:action="route('products.destroy',$product)" />

</td>

</tr>

@empty

<x-ui.empty-state
message="No product found."/>

@endforelse

</tbody>

</table>

{{ $products->links() }}

</x-ui.card>

@endsection