@extends('layouts.app')

@section('title','Edit Product')

@section('content')

<x-ui.page-header
title="Edit Product"
subtitle="Update product"/>

<x-ui.card>

<form
action="{{ route('products.update',$product) }}"
method="POST"
enctype="multipart/form-data">

@csrf
@method('PUT')

@include('products._form')

</form>

</x-ui.card>

@endsection