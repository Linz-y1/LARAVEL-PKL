@extends('app')

@section('title', 'Login')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">

    <!-- Card -->
    <div class="p-4 text-center shadow-lg" 
         style="width: 100%; max-width: 420px; border-radius: 20px; background: #fff;">

        <!-- Logo Circle -->
        <div class="d-flex justify-content-center" style="margin-top: -60px; margin-bottom: 20px;">
            <div style="width: 100px; height: 100px; border-radius: 50%; background: white; 
                        display: flex; justify-content: center; align-items: center; 
                        box-shadow: 0 4px 8px rgba(0,0,0,0.1); overflow: hidden;">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" 
                     style="width: 70%; height: 70%; object-fit: contain;">
            </div>
        </div>

        <!-- Title -->
        <h3 class="fw-bold mb-1">Welcome Back</h3>
        <p class="text-muted mb-4">Silakan login ke akunmu</p>

        <!-- Error -->
        @if ($errors->any())
            <div class="alert alert-danger text-start">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                    <input type="email" name="email" id="email" 
                           class="form-control" placeholder="Your Email"
                           required value="{{ old('email') }}">
                </div>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="bi bi-lock"></i></span>
                    <input type="password" name="password" id="password" 
                           class="form-control" placeholder="Password"
                           required>
                </div>
            </div>

            <!-- Remember Me -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember" style="accent-color: #D6A99D;">
                    <label class="form-check-label fw-semibold" for="remember" style="color: #D6A99D;">
                        Remember me
                    </label>
                </div>
            </div>

            <!-- Button -->
            <button type="submit" 
                    class="btn w-100 py-2 fw-semibold text-white" 
                    style="background-color: #D6A99D; border-radius: 25px;">
                Login
            </button>

            <!-- Link Register -->
            <div class="text-center mt-3">
                <small class="text-muted">Don’t have an account?</small>
                <a href="{{ route('register') }}" class="fw-bold" style="color: #3a303f; text-decoration: none;">
                    Register Now
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
