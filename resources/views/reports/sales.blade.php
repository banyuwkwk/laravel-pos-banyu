@extends('layouts.app')

@section('title', $title)

@section('content')

<x-ui.page-header
    :title="$title"
    subtitle="Monitor your sales performance"
/>

@include('reports.partials.filter')

@include('reports.partials.summary')

@include('reports.partials.table')



@endsection