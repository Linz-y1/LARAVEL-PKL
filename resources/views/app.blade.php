    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'jwa pet')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">


        <style>
            body {
                background-color: #F7F4EA;
                background-image: url("{{ asset('images/petpetbg.jpeg') }}");
            }
            .container {
                /* color: #81bfb7; */
                font-family: 'poppins', sans-serif;
            }
            .card {
                background-color: #cecccca8;
            }
            nav {
                --bs-bg-opacity: 5;
                background-color: #D6A99D;
            }
            
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg shadow-sm mb-4">
            <div class="container">
                <a class="navbar-brand fw-bold" href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" width="30" height="30" class="d-inline-block align-text-top" style="border-radius: 50%;">
                Pet Supplies
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav ms-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('produk.index') ? 'active' : '' }}" 
                                href="{{ route('produk.index') }}">
                                <i class="bi bi-box-seam-fill"></i>
                                </a>
                            </li>

                            <li class="nav-item">
                                <ion-icon name="basket-outline"></ion-icon>
                                <a class="nav-link {{ request()->routeIs('cart.index') ? 'active' : '' }}" 
                                href="{{ route('cart.index') }}">
                                <i class="bi bi-cart-fill"></i>
                                @if(session('cart'))
                                <span class="badge bg-danger">{{ count(session('cart')) }}</span> <!-- merah -->
                                @endif
                                </a>
                            </li>
                            <li class="nav-item">
                                
                                <a class="nav-link {{ request()->routeIs('purchase.purchases') ? 'active' : '' }}" 
                                href="{{ route('purchase.purchases') }}">
                                <i class="bi bi-clock-fill"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="btn btn-link nav-link" type="submit">
                                        <i class="bi bi-box-arrow-right"></i> Logout
                                    </button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}" 
                                href="{{ route('register') }}">
                                <i class="bi bi-person-plus"></i> Register
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" 
                                href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-in-right"></i> Login
                                </a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            @yield('content')
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
    @yield('styles')