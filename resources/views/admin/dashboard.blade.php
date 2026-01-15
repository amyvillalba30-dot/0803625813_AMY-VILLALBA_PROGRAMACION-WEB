@extends('layouts.admin')

@section('content')
<!-- Welcome Heading -->
<div class="row mb-4">
    <div class="col-12">
        <h3 class="mb-0">Dashboard Overview</h3>
        <p class="text-secondary small">Your data for today</p>
    </div>
</div>

<!-- Stats Cards -->
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="stat-icon" style="background: rgba(0, 144, 231, 0.1); color: var(--neon-blue);">
                    <i class="bi bi-box-seam"></i>
                </div>
                <div class="text-end">
                    <span class="text-success small fw-bold">+3.5% <i class="bi bi-arrow-up"></i></span>
                </div>
            </div>
            <h4 class="mb-1 fw-bold">{{ $products_count }}</h4>
            <p class="text-secondary mb-0 small">Total Productos</p>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="stat-icon" style="background: rgba(143, 95, 232, 0.1); color: var(--neon-purple);">
                    <i class="bi bi-tags"></i>
                </div>
                <div class="text-end">
                    <span class="text-success small fw-bold">+11% <i class="bi bi-arrow-up"></i></span>
                </div>
            </div>
            <h4 class="mb-1 fw-bold">{{ $categories_count }}</h4>
            <p class="text-secondary mb-0 small">Categorías Activas</p>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="stat-icon" style="background: rgba(0, 210, 91, 0.1); color: var(--neon-green);">
                    <i class="bi bi-people"></i>
                </div>
                <div class="text-end">
                    <span class="text-danger small fw-bold">-2.4% <i class="bi bi-arrow-down"></i></span>
                </div>
            </div>
            <h4 class="mb-1 fw-bold">{{ $users_count }}</h4>
            <p class="text-secondary mb-0 small">Usuarios Registrados</p>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="stat-icon" style="background: rgba(252, 66, 74, 0.1); color: var(--neon-red);">
                    <i class="bi bi-lightning-charge"></i>
                </div>
                <div class="text-end">
                    <span class="text-success small fw-bold">+5.2% <i class="bi bi-arrow-up"></i></span>
                </div>
            </div>
            <h4 class="mb-1 fw-bold">Active</h4>
            <p class="text-secondary mb-0 small">Estado del Sistema</p>
        </div>
    </div>
</div>

<!-- Main Section -->
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Lista de Usuarios</h5>
                <a href="#" class="text-secondary small text-decoration-none">View all</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Email</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random" class="rounded-circle me-3" width="35" height="35">
                                        <span class="text-white">{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('d M Y') }}</td>
                                <td><span class="badge bg-success bg-opacity-10 text-success p-2">Active</span></td>
                                <td>
                                    <a href="#" class="action-btn action-edit me-2">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="#" class="action-btn action-delete">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Open Projects</h5>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center mb-4">
                    <div class="stat-icon me-3" style="background: var(--neon-blue); color: #fff;">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>
                    <div>
                        <h6 class="mb-0">Admin dashboard design</h6>
                        <small class="text-secondary">Broadcast web app mockup</small>
                    </div>
                </div>
                <!-- Add more project mocks as needed -->
            </div>
        </div>
    </div>
</div>
@endsection
