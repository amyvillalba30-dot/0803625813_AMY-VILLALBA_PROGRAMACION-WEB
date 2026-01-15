@extends('layouts.admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h3 class="mb-0">Añadir Nuevo Producto</h3>
        <p class="text-secondary small">Define los detalles del producto</p>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger bg-danger bg-opacity-10 text-danger border-0 mb-4">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label text-secondary small">Nombre del Producto</label>
                            <input type="text" name="name" class="form-control" placeholder="Ej: Laptop Pro" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label text-secondary small">Categoría</label>
                            <select name="category_id" class="form-control" required>
                                <option value="" disabled selected>Selecciona una categoría</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <label class="form-label text-secondary small">Precio ($)</label>
                            <input type="number" step="0.01" name="price" class="form-control" placeholder="0.00" required>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="form-label text-secondary small">Stock Inicial</label>
                            <input type="number" name="stock" class="form-control" placeholder="0" required>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="form-label text-secondary small">Estado</label>
                            <select name="status" class="form-control" required>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('products.index') }}" class="btn btn-outline-light me-3">Cancelar</a>
                        <button type="submit" class="btn btn-corona">Guardar Producto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
