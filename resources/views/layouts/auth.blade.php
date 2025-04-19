<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Night Club') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        :root {
            --primary: #b266ff;
            --secondary: #1a0033;
            --dark: #0d001a;
            --light: #1a0033;
        }

        body {
            background: linear-gradient(180deg, #0d001a 0%, #1a0033 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: #f3e8ff;
            font-family: 'Inter', sans-serif;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary) !important;
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            color: #0d001a;
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background-color: #e0aaff;
            border-color: #e0aaff;
            color: #1a0033;
        }

        .text-primary {
            color: var(--primary) !important;
        }

        a {
            color: var(--primary);
        }

        a:hover {
            color: #e0aaff;
        }

        .auth-wrapper {
            flex: 1;
            display: flex;
            align-items: center;
            padding: 40px 0;
        }

        .navbar, footer {
            background: var(--secondary) !important;
            color: #f3e8ff !important;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>

    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-glass-martini-alt me-2"></i>Night Club
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="auth-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body p-5">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="py-4">
        <div class="container">
            <div class="text-center text-muted">
                &copy; {{ date('Y') }} Night Club. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>
