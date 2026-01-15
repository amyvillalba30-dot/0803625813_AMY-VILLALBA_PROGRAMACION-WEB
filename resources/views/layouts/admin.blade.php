<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel Admin') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --sidebar-width: 250px;
            --body-bg: #191c24;
            --sidebar-bg: #000000;
            --card-bg: #1f222b;
            --text-main: #ffffff;
            --text-secondary: #6c7293;
            --neon-green: #00d25b;
            --neon-blue: #0090e7;
            --neon-purple: #8f5fe8;
            --neon-red: #fc424a;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--body-bg);
            color: var(--text-main);
            overflow-x: hidden;
            margin: 0;
        }

        #wrapper {
            display: flex;
            width: 100%;
        }

        #sidebar {
            width: var(--sidebar-width);
            min-height: 100vh;
            background: var(--sidebar-bg);
            color: #fff;
            position: fixed;
            left: 0;
            z-index: 1000;
            transition: 0.3s;
        }

        .sidebar-header {
            padding: 30px 25px;
            text-align: center;
        }

        .sidebar-brand {
            font-weight: 700;
            font-size: 1.6rem;
            letter-spacing: 2px;
            color: #fff;
            text-decoration: none;
        }

        .user-profile {
            padding: 10px 25px 30px;
            text-align: left;
            display: flex;
            align-items: center;
        }

        .user-profile img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            margin-right: 15px;
            border: 2px solid var(--neon-green);
        }

        .user-info p {
            font-size: 0.85rem;
            margin-bottom: 0;
            font-weight: 600;
        }

        .user-info small {
            font-size: 0.75rem;
            color: var(--text-secondary);
        }

        #sidebar ul.components {
            padding: 10px 0;
        }

        #sidebar ul li a {
            padding: 12px 25px;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            color: var(--text-secondary);
            text-decoration: none;
            transition: 0.3s;
        }

        #sidebar ul li a i {
            margin-right: 15px;
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        #sidebar ul li.active a {
            color: #fff;
            background: rgba(255,255,255,0.05);
            border-left: 3px solid var(--neon-blue);
        }

        #sidebar ul li a:hover {
            background: rgba(255,255,255,0.02);
            color: #fff;
        }

        #content {
            width: 100%;
            margin-left: var(--sidebar-width);
            padding: 0;
            min-height: 100vh;
        }

        .top-navbar {
            padding: 15px 30px;
            background: var(--body-bg);
            border: none;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .search-area {
            background: #2a3038;
            border-radius: 5px;
            padding: 5px 15px;
            display: flex;
            align-items: center;
            width: 300px;
        }

        .search-area input {
            background: transparent;
            border: none;
            color: #fff;
            font-size: 0.85rem;
            width: 100%;
            outline: none;
        }

        .search-area i {
            color: var(--text-secondary);
            margin-right: 10px;
        }

        .card {
            background: var(--card-bg);
            border: none;
            border-radius: 12px;
            margin-bottom: 25px;
        }

        .card-header {
            background: transparent;
            border-bottom: 1px solid #2c2e33;
            color: var(--text-main);
            font-weight: 600;
            padding: 20px;
        }

        .stat-card {
            padding: 20px;
        }

        .stat-icon {
            width: 45px;
            height: 45px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
        }

        .btn-corona {
            background: var(--neon-green);
            color: #fff;
            border: none;
            padding: 8px 18px;
            border-radius: 5px;
            font-weight: 500;
            font-size: 0.85rem;
            transition: 0.3s;
        }

        .btn-corona:hover {
            background: #00b14c;
            transform: translateY(-2px);
            color: #fff;
        }

        .table {
            background: var(--card-bg) !important;
            color: var(--text-secondary);
            border: none;
        }

        .table thead th {
            border: none;
            color: var(--text-main) !important;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
            padding: 20px 15px;
            background: var(--card-bg) !important;
        }

        .table td {
            border-top: 1px solid #2c2e33 !important;
            padding: 20px 15px;
            vertical-align: middle;
            font-size: 0.85rem;
            background: var(--card-bg) !important;
            color: var(--text-secondary);
        }

        .action-btn {
            width: 32px;
            height: 32px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            background: rgba(255,255,255,0.05);
            transition: all 0.2s;
            text-decoration: none;
            border: 1px solid rgba(255,255,255,0.1);
            cursor: pointer;
            padding: 0;
        }

        .action-btn:hover {
            background: rgba(255,255,255,0.1);
            border-color: rgba(255,255,255,0.2);
            transform: translateY(-2px);
        }

        .action-edit { color: var(--neon-blue); }
        .action-delete { color: var(--neon-red); }

        .dashboard-container {
            padding: 25px 30px;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
                    CORONA
                </a>
            </div>

            <div class="user-profile">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=00d25b&color=fff" alt="User Image">
                <div class="user-info">
                    <p>{{ Auth::user()->name }}</p>
                    <small>Gold Member</small>
                </div>
            </div>

            <ul class="list-unstyled components">
                <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-speedometer2" style="color: var(--neon-blue)"></i> Dashboard
                    </a>
                </li>
                <li class="{{ Request::is('products*') ? 'active' : '' }}">
                    <a href="{{ route('products.index') }}">
                        <i class="bi bi-box-seam" style="color: var(--neon-red)"></i> Productos
                    </a>
                </li>
                <li class="{{ Request::is('categories*') ? 'active' : '' }}">
                    <a href="{{ route('categories.index') }}">
                        <i class="bi bi-tags" style="color: var(--neon-purple)"></i> Categorías
                    </a>
                </li>
                <li>
                    <a href="/">
                        <i class="bi bi-house-door" style="color: var(--neon-green)"></i> Volver al Sitio
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content">
            <div class="top-navbar">
                <div class="search-area">
                    <i class="bi bi-search"></i>
                    <input type="text" placeholder="Search products">
                </div>
                
                <div class="d-flex align-items-center">
                    <button class="btn btn-corona me-4 d-none d-lg-block">+ Create New Project</button>
                    <div class="d-flex align-items-center text-secondary">
                        <i class="bi bi-grid-3x3-gap me-4" style="cursor: pointer;"></i>
                        <i class="bi bi-envelope me-4" style="cursor: pointer;"></i>
                        <i class="bi bi-bell me-4" style="cursor: pointer;"></i>
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center text-white" href="#" id="navbarDropdown" data-bs-toggle="dropdown">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=00d25b&color=fff" class="rounded-circle me-2" width="30" height="30">
                                <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end bg-dark border-secondary mt-2">
                                <li>
                                    <a class="dropdown-item text-white" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right me-2 text-danger"></i> Cerrar Sesión
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dashboard-container">
                @yield('content')
            </div>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            // Optional: Handle sidebar toggle if needed in future
        });
    </script>
</body>
</html>
