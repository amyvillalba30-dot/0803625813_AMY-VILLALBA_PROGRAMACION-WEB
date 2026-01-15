@extends('layouts.admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h3 class="mb-0">Editar Categoría</h3>
        <p class="text-secondary small">Modificando: {{ $category->name }}</p>
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

                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="form-label text-secondary small">Nombre de la Categoría</label>
                        <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label text-secondary small">Descripción (Opcional)</label>
                        <textarea name="description" class="form-control" rows="4">{{ $category->description }}</textarea>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('categories.index') }}" class="btn btn-outline-light me-3">Cancelar</a>
                        <button type="submit" class="btn btn-corona">Actualizar Categoría</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
