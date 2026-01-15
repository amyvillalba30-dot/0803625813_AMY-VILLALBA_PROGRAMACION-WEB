@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row min-vh-100 align-items-center">
        <div class="col-lg-7">
            <h6 class="text-uppercase text-secondary fw-bold mb-3" style="letter-spacing: 3px;">Welcome to Corona</h6>
            <h1 class="display-2 fw-bold mb-4" style="line-height: 1.1;">Build your ideas with <span style="color: var(--neon-blue);">Elegance.</span></h1>
            <p class="h5 text-secondary mb-5 leading-relaxed">
                Experience the next generation of administrative management. Sleek, fast, and powerful dashboard built for modern creators.
            </p>
            <div class="d-flex align-items-center">
                @guest
                    <div style="width: 200px;">
                        <a href="{{ route('login') }}" class="btn btn-neon">Get Started</a>
                    </div>
                    <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg ms-3" style="padding: 12px 25px; font-size: 1rem; font-weight: 600;">Documentation</a>
                @else
                    <div style="width: 250px;">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-neon">Back to Dashboard</a>
                    </div>
                @endguest
            </div>
            
            <div class="row mt-5 pt-4">
                <div class="col-4">
                    <h3 class="fw-bold mb-0">12k+</h3>
                    <small class="text-secondary">Project Managed</small>
                </div>
                <div class="col-4">
                    <h3 class="fw-bold mb-0">99%</h3>
                    <small class="text-secondary">Up-time Guarantee</small>
                </div>
                <div class="col-4">
                    <h3 class="fw-bold mb-0">24/7</h3>
                    <small class="text-secondary">Premium Support</small>
                </div>
            </div>
        </div>
        
        <div class="col-lg-5 d-none d-lg-block">
            <div class="card p-4" style="background: linear-gradient(135deg, #1f222b 0%, #000 100%); border: 1px solid #2c2e33;">
                <div class="d-flex align-items-center mb-4">
                    <div class="rounded-circle bg-primary me-3" style="width: 12px; height: 12px;"></div>
                    <div class="rounded-circle bg-success me-3" style="width: 12px; height: 12px;"></div>
                    <div class="rounded-circle bg-danger" style="width: 12px; height: 12px;"></div>
                </div>
                <div class="bg-dark rounded p-3 mb-3" style="border: 1px solid #2c2e33;">
                    <code class="text-secondary small">> composer create-project laravel/laravel</code>
                </div>
                <div class="bg-dark rounded p-3" style="border: 1px solid #2c2e33;">
                    <code class="text-secondary small">> php artisan serve</code>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
