@extends('layouts.app')

@section('content')

    <article class="contenido-receta bg-white p-5 shadow">
        <h1 class="text-center mb-4"> {{ Str::upper($receta->titulo) }}</h1>

        <div class="imagen-receta">
            <img src="/storage/{{ $receta->imagen }}" alt="receta" class="w-100">
        </div>

        <div class="receta-meta mt-3">
            <p>
                <span class="font-weight-bold text-primary">Escrito en:</span>
                <a class="text-dark" href="{{ route('categorias.show', ['categoriaReceta' => $receta->categoria->id]) }}">
                    {{$receta->categoria->nombre}}
                </a>
            </p>

            <p>
                <span class="font-weight-bold text-primary">Autor:</span>
                <a class="text-dark" href="{{ route('perfiles.show', ['perfil' => $receta->autor->id]) }}">
                    {{$receta->autor->name}}
                </a>
            </p>

            <p>
                <span class="font-weight-bold text-primary">Fecha:</span>
                @php
                    $fecha = $receta->created_at; 
                @endphp

                <fecha-receta fecha="{{ $fecha }}"></fecha-receta>

            </p>

            <div class="container">
                <div class="row">
                    <div class="ingredientes col-sm-12 col-md-4">
                        <h2 class="my-3 text-primary">Ingredientes</h2>
        
                        {!! $receta->ingredientes !!}
                    </div>

                    <div class="anuncio-central col-sm-12 col-md-8">
                        Anuncio
                    </div>
        
                    <div class="preparacion col-md-12">
                        <h2 class="my-3 text-primary">Preparación</h2>
        
                        {!! $receta->preparacion !!}
                    </div>
                </div>
            </div>

            <div class="justify-content-center row text-center">
                <like-button 
                    receta-id="{{$receta->id}}"
                    like="{{$like}}"
                    likes="{{$likes}}"
                ></like-button>
            </div>

        </div>
    </article>

@endsection