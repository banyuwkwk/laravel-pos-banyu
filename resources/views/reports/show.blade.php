@extends('layouts.app')

@section('title', $title)

@section('content')


<x-ui.page-header
    :title="$title"
    subtitle="Transaction detail information"
/>


@include(
    'reports.partials.detail-header'
)


@include(
    'reports.partials.detail-items'
)


@include(
    'reports.partials.detail-summary'
)


@endsection