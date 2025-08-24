@extends('layouts.tienda')

@push('styles')
<style>
    .auth-container {
        max-width: 480px;
        margin: 4rem auto;
        padding: 2.5rem;
        background-color: var(--light);
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow-lg);
        border: 1px solid var(--gray-light);
    }
    .auth-title {
        font-size: 1.75rem;
        font-weight: 700;
        text-align: center;
        color: var(--primary);
        margin-bottom: 2rem;
    }
    .form-group {
        margin-bottom: 1.5rem;
    }
    .form-label {
        display: block;
        font-weight: 500;
        color: var(--dark);
        margin-bottom: 0.5rem;
    }
    .form-control {
        width: 100%;
        padding: 0.85rem 1rem;
        border-radius: var(--border-radius);
        border: 1px solid var(--gray);
        font-size: 1rem;
        transition: var(--transition);
    }
    .form-control:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(44, 62, 80, 0.1);
    }
    .form-check {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-top: 1rem;
    }
    .btn-submit {
        width: 100%;
        padding: 0.85rem 1.5rem;
        font-size: 1rem;
        font-weight: 600;
        color: white;
        background-color: var(--primary);
        border: none;
        border-radius: var(--border-radius);
        cursor: pointer;
        transition: var(--transition);
    }
    .btn-submit:hover {
        background-color: var(--primary-dark);
    }
    .auth-link {
        display: block;
        text-align: center;
        margin-top: 1.5rem;
        color: var(--accent);
        text-decoration: none;
    }
    .auth-link:hover {
        text-decoration: underline;
    }
    .is-invalid {
        border-color: var(--secondary);
    }
    .invalid-feedback {
        color: var(--secondary);
        font-size: 0.875rem;
        display: block;
        margin-top: 0.25rem;
    }
</style>
@endpush

@section('content')
<div class="auth-container">
    <h1 class="auth-title">{{ __('Login') }}</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="email" class="form-label">{{ __('Email Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn-submit">
                {{ __('Login') }}
            </button>
        </div>

        @if (Route::has('password.request'))
            <a class="auth-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
        
        <a class="auth-link" href="{{ route('register') }}">
            ¿No tienes una cuenta? Regístrate
        </a>
    </form>
</div>
@endsection