@extends('layouts.app')

@section('title', $title)

@section('content')

<x-ui.page-header
    :title="$title"
    subtitle="Monitor your sales performance"
/>

<div class="mb-4">

<a href="{{ route(
    'reports.sales.export.excel'
) }}"
class="btn btn-success">

Export Excel

</a>

</div>

@include('reports.partials.filter')

@include('reports.partials.summary')

@include('reports.partials.table')



@endsection