<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --body-bg: #000000;
            --card-bg: #191c24;
            --input-bg: #2a3038;
            --text-main: #ffffff;
            --text-secondary: #6c7293;
            --neon-green: #00d25b;
            --neon-blue: #0090e7;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--body-bg);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background: rgba(0,0,0,0.8) !important;
            backdrop-filter: blur(10px);
            padding: 20px 0;
            border-bottom: 1px solid #2c2e33;
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: 2px;
            color: var(--text-main) !important;
            font-size: 1.5rem;
        }

        .nav-link {
            color: var(--text-secondary) !important;
            font-weight: 500;
            transition: 0.3s;
            margin: 0 10px;
        }

        .nav-link:hover {
            color: var(--neon-green) !important;
        }

        .auth-card {
            background: var(--card-bg);
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            margin-top: 80px;
        }

        .auth-card .card-header {
            background: transparent;
            border-bottom: 1px solid #2c2e33;
            color: var(--text-main);
            font-weight: 700;
            padding: 30px;
            text-align: center;
            font-size: 1.5rem;
        }

        .form-label {
            color: var(--text-secondary);
            font-size: 0.85rem;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-control {
            background-color: var(--input-bg);
            border: 1px solid #2c2e33;
            color: var(--text-main);
            padding: 14px;
            border-radius: 8px;
            font-size: 0.9rem;
        }

        .form-control:focus {
            background-color: var(--input-bg);
            border-color: var(--neon-blue);
            color: var(--text-main);
            box-shadow: 0 0 0 3px rgba(0, 144, 231, 0.1);
        }

        .btn-neon {
            background: var(--neon-blue);
            border: none;
            padding: 14px;
            font-weight: 600;
            border-radius: 8px;
            color: #fff;
            width: 100%;
            transition: 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-neon:hover {
            background: #007cc7;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 144, 231, 0.3);
            color: #fff;
        }

        .invalid-feedback {
            color: #fc424a;
            font-size: 0.8rem;
            margin-top: 5px;
        }

        .form-check-input {
            background-color: var(--input-bg);
            border-color: #2c2e33;
        }

        .form-check-input:checked {
            background-color: var(--neon-blue);
            border-color: var(--neon-blue);
        }

        .auth-links a {
            color: var(--neon-blue);
            text-decoration: none;
            font-size: 0.85rem;
            transition: 0.2s;
        }

        .auth-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end bg-dark border-secondary" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-white border-0" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
