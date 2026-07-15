<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') | Laravel POS Banyu</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body class="auth-body">

<div class="container">

    <div class="row justify-content-center align-items-center min-vh-100">

        <div class="col-md-6 col-lg-5">

            <div class="text-center mb-4">

                <h2 class="fw-bold mb-2">
                    Laravel POS Banyu
                </h2>

                <p class="text-muted">
                    Point of Sale Management System
                </p>

            </div>

            <div class="app-card">

                @yield('content')

            </div>

            <p class="text-center text-muted mt-4 small">
                © {{ date('Y') }} Laravel POS Banyu
            </p>

        </div>

    </div>

</div>

</body>

</html>