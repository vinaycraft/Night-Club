<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Night Club') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- Custom Styles -->
    <style>
        :root {
            --primary: #b266ff;
            --secondary: #1a0033;
            --dark: #0d001a;
            --light: #1a0033;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--dark);
            color: #f3e8ff;
            padding-top: 70px;
        }
        
        .navbar {
            background-color: var(--secondary);
            box-shadow: 0 2px 4px rgba(0,0,0,.08);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            min-height: 80px;
            font-size: 1.18rem;
        }
        
        .navbar .navbar-brand {
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: 1px;
            color: var(--primary) !important;
        }
        
        .navbar .nav-link {
            font-size: 1.13rem;
            padding-top: 0.7rem !important;
            padding-bottom: 0.7rem !important;
            font-weight: 600;
            margin-right: 0.7rem;
            color: #f3e8ff !important;
        }
        
        .navbar .nav-link:hover, .navbar .nav-link.active {
            color: var(--primary) !important;
        }
        
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            color: #0d001a;
        }
        
        .btn-primary:hover {
            background-color: #e0aaff;
            border-color: #e0aaff;
            color: #1a0033;
        }
        
        .card {
            border: none;
            background: #1a0033;
            color: #f3e8ff;
            box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,.075);
        }
        
        .cart-badge {
            position: absolute;
            top: -5px;
            right: -8px;
            padding: 0.25rem 0.5rem;
            border-radius: 50%;
            background-color: var(--primary);
            color: white;
            font-size: 0.75rem;
            min-width: 1.5rem;
            text-align: center;
        }
        
        @media (max-width: 991px) {
            .navbar .navbar-brand {
                font-size: 1.4rem;
            }
            .navbar .nav-link {
                font-size: 1rem;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Fixed Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('menu') }}">
                <i class="fas fa-glass-martini-alt me-2"></i><span class="gradient-text">Night Club</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? ' active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('menu') ? 'active' : '' }}" 
                           href="{{ route('menu') }}">
                            <i class="fas fa-utensils me-1"></i>Menu
                        </a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('orders.*') ? 'active' : '' }}" 
                               href="{{ route('orders.index') }}">
                                <i class="fas fa-receipt me-1"></i>My Orders
                            </a>
                        </li>
                    @endauth
                </ul>
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item me-3">
                            <a href="{{ route('cart.index') }}" class="nav-link position-relative {{ request()->routeIs('cart.*') ? 'active' : '' }}">
                                <i class="fas fa-shopping-cart me-1"></i>Cart
                                @if(session()->has('cart') && count(session('cart')) > 0)
                                    <span class="cart-badge">{{ count(session('cart')) }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle me-1"></i>{{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="{{ route('orders.index') }}" class="dropdown-item">
                                        <i class="fas fa-list me-1"></i>My Orders
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-sign-out-alt me-1"></i>Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i>Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="fas fa-user-plus me-1"></i>Register
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-4">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @include('partials.toast')

            @yield('content')
        </div>
    </main>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    
    @stack('scripts')
</body>
</html>
