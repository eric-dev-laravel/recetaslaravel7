@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" integrity="sha256-scOSmTNhvwKJmV7JQCuR7e6SQ3U9PcJ5rM/OMgL78X8=" crossorigin="anonymous" />
@endsection

@section('botones')
    
    <a href="{{ route('recetas.index') }}" class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold">
        <svg class="icono" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path></svg>
    Volver</a>
@endsection

@section('content')

    <h2 class="text-center mb-5 bg-white shadow p-3">Crear Nueva Receta</h2>

    <div class="row justify-content-center mt-3">
        <div class="col-md-10 bg-white shadow p-5">
            <form method="POST" action="{{ route('recetas.store') }}" enctype="multipart/form-data" novalidate>

                @csrf

                <div class="form-group">
                    <label for="titulo">Título Receta:</label>

                    <input type="text"
                        name="titulo"
                        class="form-control @error('titulo') is-invalid @enderror"
                        id="titulo"
                        placeholder="Título Receta" 
                        value=" {{ old('titulo') }}"/>

                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="categoria">Categoria:</label>

                    <select name="categoria" 
                        id="categoria" 
                        class="form-control @error('categoria') is-invalid @enderror">
                        <option value=""> - Seleccione - </option>
                        @foreach($todas_categorias as $categoria)
                            <option 
                                value="{{ $categoria->id }}" 
                                {{ old('categoria') == $categoria->id ? 'selected' : '' }}> 
                                {{$categoria->nombre}}
                            </option>
                        @endforeach
                    </select>

                    @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="ingredientes">Ingredientes:</label>

                    <input type="hidden" name="ingredientes" id="ingredientes" value=" {{ old('ingredientes')}} " />
                    <trix-editor 
                        input="ingredientes"
                        class="form-control @error('ingredientes') is-invalid @enderror">
                    </trix-editor>

                    @error('ingredientes')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="preparacion">Preparación:</label>

                    <input type="hidden" name="preparacion" id="preparacion" value=" {{ old('preparacion')}} " />
                    <trix-editor 
                        input="preparacion"
                        class="form-control @error('preparacion') is-invalid @enderror"
                    ></trix-editor>

                    @error('preparacion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="imagen">Imagen</label>

                    <input 
                        type="file" 
                        class="form-control @error('imagen') is-invalid @enderror"
                        id="imagen" 
                        name="imagen" />

                    @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Agregar Receta" />
                </div>

            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js" 
            integrity="sha256-b2QKiCv0BXIIuoHBOxol1XbUcNjWqOcZixymQn9CQDE=" 
            crossorigin="anonymous" defer></script>
@endsection