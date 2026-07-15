@extends('layouts.app')

@section('title', 'Create Product')

@section('content')

<x-ui.page-header
    title="Create Product"
    subtitle="Add new product" />

<x-ui.card>

<form
action="{{ route('products.store') }}"
method="POST"
enctype="multipart/form-data">

@csrf

@include('products._form')

</form>

</x-ui.card>

@endsection