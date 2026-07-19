@extends('layouts.app')

@section('title', $title)

@section('content')

<x-ui.page-header
    :title="$title"
    subtitle="Monitor your sales performance"
/>

<div class="mb-4 d-flex gap-2">

<a
href="{{ route(
    'reports.sales.export.excel',
    [
        'start_date' => request('start_date'),
        'end_date' => request('end_date')
    ]
) }}"
class="btn btn-success">

<i class="bi bi-file-earmark-excel me-2"></i>

Export Excel

</a>

<a
href="{{ route(
    'reports.sales.export.pdf',
    [
        'start_date' => request('start_date'),
        'end_date' => request('end_date')
    ]
) }}"
class="btn btn-danger">

<i class="bi bi-file-earmark-pdf me-2"></i>

Export PDF

</a>

</div>

@include('reports.partials.filter')

@include('reports.partials.summary')

@include('reports.partials.table')



@endsection