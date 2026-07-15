@extends('layouts.guest')

@section('title', 'Login')

@section('content')

<h3 class="auth-title mb-2">
    Welcome Back
</h3>

<p class="auth-subtitle">
    Sign in to continue
</p>

@if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('login') }}">

    @csrf

    <div class="mb-3">

        <label class="form-label">
            Email
        </label>

        <input
            type="email"
            name="email"
            class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email') }}"
            autofocus>

        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    <div class="mb-3">

        <label class="form-label">
            Password
        </label>

        <input
            type="password"
            name="password"
            class="form-control @error('password') is-invalid @enderror">

        @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div class="form-check">

            <input
                class="form-check-input"
                type="checkbox"
                name="remember"
                id="remember">

            <label
                class="form-check-label"
                for="remember">

                Remember me

            </label>

        </div>

        @if(Route::has('password.request'))

            <a
                href="{{ route('password.request') }}"
                class="text-decoration-none">

                Forgot Password?

            </a>

        @endif

    </div>

    <button
        type="submit"
        class="btn btn-primary w-100">

        Login

    </button>

</form>

<div class="auth-footer">

    <span class="text-muted">

        Don't have an account?

    </span>

    <a
        href="{{ route('register') }}"
        class="text-decoration-none">

        Register

    </a>

</div>

@endsection