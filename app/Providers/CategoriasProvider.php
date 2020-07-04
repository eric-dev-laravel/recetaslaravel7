<?php

namespace App\Providers;

use App\CategoriaReceta;
use View;
use Illuminate\Support\ServiceProvider;

class CategoriasProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //Antes de que el codigo de laravel este listo, no sirve conexion a bd, ni nada
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //Despues de que el codigo de laravel esta listo, todo esta disponible para su uso
        View::composer('*', function ($view) {

            $categorias = CategoriaReceta::latest()->take(5)->get();
            $view->with('categorias', $categorias);
        });
    }
}
