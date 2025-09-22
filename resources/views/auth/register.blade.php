@extends('app')

@section('title', 'Register')

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
        <h3 class="fw-bold mb-1">Register Account</h3>
        <p class="text-muted mb-4">Buat akun baru sekarang</p>

        <!-- Form -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="bi bi-person"></i></span>
                    <input type="text" name="name" class="form-control" placeholder="Your Name" 
                           value="{{ old('name') }}" required>
                </div>
            </div>

            <!-- Username -->
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="bi bi-person-badge"></i></span>
                    <input type="text" name="username" class="form-control" placeholder="Username" 
                           value="{{ old('username') }}" required>
                </div>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Your Email" 
                           value="{{ old('email') }}" required>
                </div>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="bi bi-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="bi bi-shield-lock"></i></span>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                </div>
            </div>

            <!-- Submit -->
            <button type="submit" 
                    class="btn w-100 py-2 fw-semibold text-white" 
                    style="background-color:#D6A99D; border-radius: 25px;">
                Register
            </button>

            <!-- Login Link -->
            <div class="text-center mt-3">
                <small class="text-muted">Already have an account?</small>
                <a href="{{ route('login') }}" class="fw-bold" style="color: #D6A99D; text-decoration: none;">
                    Sign up
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
