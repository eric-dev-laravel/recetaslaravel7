@extends('layouts.app')

@section('content')
    <div class="container bg-white p-5 shadow">
        <h2 class="titulo-categoria text-uppercase mb-4">
            Resultados: {{ $busqueda }}
        </h2>

        <div class="row">
            @foreach($recetas as $receta)
                @include('ui.receta')
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $recetas->links()}}
        </div>

    </div>
@endsection