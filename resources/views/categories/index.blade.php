@extends('layouts.app')

@section('title','Category')

@section('content')

<x-ui.page-header
    title="Category"
    subtitle="Manage category" />

<x-ui.card>

<div class="row mb-4">

    <div class="col-md-6">

        <x-ui.search-box
            placeholder="Search category..." />

    </div>

    <div class="col-md-6 text-end">

        <a
            href="{{ route('categories.create') }}"
            class="btn btn-primary">

            <i class="bi bi-plus-lg"></i>

            Add Category

        </a>

    </div>

</div>

<table class="table align-middle">

<thead>

<tr>

<th width="80">

#

</th>

<th>

Category

</th>

<th>

Description

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

@forelse($categories as $category)

<tr>

<td>

{{ $loop->iteration }}

</td>

<td>

<strong>

{{ $category->name }}

</strong>

</td>

<td>

{{ $category->description }}

</td>

<td>

<x-ui.status-badge
    :active="$category->is_active"/>

</td>

<td>

<div class="d-flex gap-2">

    <a
        href="{{ route('categories.edit', $category) }}"
        class="btn btn-warning btn-sm">

        <i class="bi bi-pencil"></i>

    </a>

    <button
        class="btn btn-danger btn-sm"
        data-bs-toggle="modal"
        data-bs-target="#delete{{ $category->id }}">

        <i class="bi bi-trash"></i>

    </button>

</div>

<x-ui.confirm-delete

    :id="'delete'.$category->id"

    title="Delete Category"

    :message="'Delete category '.$category->name.' ?'"

    :action="route('categories.destroy',$category)" />

</td>

</tr>

@empty

<x-ui.empty-state
message="Category not found."/>

@endforelse

</tbody>

</table>

{{ $categories->links() }}

</x-ui.card>

@endsection