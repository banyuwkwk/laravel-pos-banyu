@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')

<x-ui.page-header
    title="Edit Category"
    subtitle="Update category information" />

<x-ui.card>

    <form
        action="{{ route('categories.update', $category) }}"
        method="POST">

        @csrf
        @method('PUT')

        @include('categories._form')

    </form>

</x-ui.card>

@endsection