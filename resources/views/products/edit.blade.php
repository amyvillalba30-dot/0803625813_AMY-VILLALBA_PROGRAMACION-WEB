@extends('layouts.admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h3 class="mb-0">Editar Producto</h3>
        <p class="text-secondary small">Modificando: {{ $product->name }}</p>
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

                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label text-secondary small">Nombre del Producto</label>
                            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label text-secondary small">Categoría</label>
                            <select name="category_id" class="form-control" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <label class="form-label text-secondary small">Precio ($)</label>
                            <input type="number" step="0.01" name="price" class="form-control" value="{{ $product->price }}" required>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="form-label text-secondary small">Stock</label>
                            <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" required>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label class="form-label text-secondary small">Estado</label>
                            <select name="status" class="form-control" required>
                                <option value="1" {{ $product->status ? 'selected' : '' }}>Activo</option>
                                <option value="0" {{ !$product->status ? 'selected' : '' }}>Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('products.index') }}" class="btn btn-outline-light me-3">Cancelar</a>
                        <button type="submit" class="btn btn-corona">Actualizar Producto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
