@extends('layouts.admin')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
            <h3 class="mb-0">Administración de Productos</h3>
            <p class="text-secondary small">Gestiona tu catálogo de productos</p>
        </div>
        <a href="{{ route('products.create') }}" class="btn btn-corona">
            <i class="bi bi-plus-lg me-2"></i> Nuevo Producto
        </a>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success bg-success bg-opacity-10 text-success border-0 mb-4">
    {{ $message }}
</div>
@endif

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Estado</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td><span class="text-secondary">{{ $product->id }}</span></td>
                        <td><span class="text-white fw-medium">{{ $product->name }}</span></td>
                        <td>
                            <span class="badge bg-secondary bg-opacity-10 text-secondary">
                                {{ $product->category ? $product->category->name : 'N/A' }}
                            </span>
                        </td>
                        <td><span class="text-white">${{ number_format($product->price, 2) }}</span></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="me-2">{{ $product->stock }}</span>
                                <div class="progress w-50" style="height: 4px; background: #2c2e33;">
                                    <div class="progress-bar bg-info" style="width: {{ min($product->stock, 100) }}%"></div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge {{ $product->status ? 'bg-success bg-opacity-10 text-success' : 'bg-danger bg-opacity-10 text-danger' }} p-2">
                                {{ $product->status ? 'Activo' : 'Inactivo' }}
                            </span>
                        </td>
                        <td class="text-end">
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block">
                                <a href="{{ route('products.edit', $product->id) }}" class="action-btn action-edit me-2">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn action-delete" onclick="return confirm('¿Estás seguro?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
