@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-5">
                @if($perfil->imagen)
                <img src="/storage/{{$perfil->imagen}}" class="w-100 rounded-circle" alt="img-perfil">
                @endif
            </div>
            <div class="col-md-7 mt-5 mt-md-0">
                <h2 class="text-center mb-2 titulo-perfil"> {{ $perfil->usuario->name}} </h2>
                <a class="info-receta" href="{{$perfil->usuario->url}}">Visitar Sitio Web</a>
                <div class="biografia">
                    {!! $perfil->biografia!!}
                </div>
            </div>
        </div>
    </div>

    <h2 class="text-center my-5 recetas-perfil">Recetas creadas por: {{ $perfil->usuario->name }}</h2>

    <div class="container">
        <div class="row mx-auto bg-white p-4">
            @if(count($recetas) > 0)
                @foreach($recetas as $receta)

                    <div class="col-md-4 mb-4">
                        <div class="card shadow">

                            <img src="/storage/{{$receta->imagen}}" class="card-img-top" alt="imagen receta">
                            
                            <div class="card-body">
                                <h3 class="card-title">{{ Str::upper($receta->titulo) }}</h3>

                                <div class="meta-receta d-flex justify-content-between">
                                    @php
                                        $fecha = $receta->created_at; 
                                    @endphp
                    
                                    <p class="text-primary fecha font-weight-bold">
                                        <fecha-receta fecha="{{ $fecha }}"></fecha-receta>
                                    </p>
                    
                                    <p>{{ count($receta->likes) }} Les gustó</p>
                                </div>
                            </div>

                            <div class="card-footer bg-white">
                                <a href="{{ route('recetas.show', ['receta' => $receta->id]) }}" 
                                    class="btn btn-primary btn-receta d-block mt-4 text-uppercase font-weight-bold">
                                    Ver Receta
                                </a>
                            </div>
                        </div>
                    </div>

                @endforeach
            @else
                <p class="text-center w-100">No hay recetas aún...</p>
            @endif
        </div>

        <div class="d-flex justify-content-center">
            {{$recetas->links()}}
        </div>
    </div>

@endsection