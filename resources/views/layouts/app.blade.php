<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Laravel POS Banyu</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body>

<div class="wrapper">

@include('layouts.partials.sidebar')

<div class="main">

@include('layouts.partials.navbar')

<div class="content">

<x-ui.flash-message />

@yield('content')

</div>

@include('layouts.partials.footer')

</div>

</div>

@stack('scripts')

</body>

<x-ui.toast />

</html>