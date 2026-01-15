@extends('layouts.admin')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
            <h3 class="mb-0">Administración de Categorías</h3>
            <p class="text-secondary small">Organiza tus productos por grupos</p>
        </div>
        <a href="{{ route('categories.create') }}" class="btn btn-corona">
            <i class="bi bi-plus-lg me-2"></i> Nueva Categoría
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
                        <th>Descripción</th>
                        <th>Productos</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td><span class="text-secondary">{{ $category->id }}</span></td>
                        <td><span class="text-white fw-medium">{{ $category->name }}</span></td>
                        <td><span class="text-secondary small">{{ Str::limit($category->description, 50) }}</span></td>
                        <td>
                            <span class="badge bg-corona text-white">
                                {{ $category->products_count ?? $category->products()->count() }}
                            </span>
                        </td>
                        <td class="text-end">
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block">
                                <a href="{{ route('categories.edit', $category->id) }}" class="action-btn action-edit me-2">
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
