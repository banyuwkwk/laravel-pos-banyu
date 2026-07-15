@extends('layouts.app')

@section('title', 'Create Category')

@section('content')

<x-ui.page-header
    title="Create Category"
    subtitle="Add a new product category" />

<x-ui.card>

    <form action="{{ route('categories.store') }}" method="POST">

        @csrf

        @include('categories._form')

    </form>

</x-ui.card>

@endsection