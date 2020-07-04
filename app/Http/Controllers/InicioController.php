<?php

namespace App\Http\Controllers;

use App\Receta;
use App\CategoriaReceta;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index() {

        //Las mas votadas
        $votadas = Receta::withCount('likes')->orderBy('likes_count', 'DESC')->take(3)->get();

        //Obtener las recetas nueva
        $nuevas = Receta::latest()->take(5)->get();

        //Obtener todas las categorias
        $categorias = CategoriaReceta::orderBy('nombre', 'ASC')->get();
        
        //Agrupar recetas por categoria
        $recetas = [];

        foreach($categorias as $categoria){
            $recetas[Str::slug( $categoria->nombre ) ][] = Receta::where('categoria_id', $categoria->id)
                                                                    ->orderBy('titulo', 'ASC')
                                                                    ->take(3)
                                                                    ->get();
        }

        return view('inicio.index', compact('nuevas', 'recetas', 'votadas'));
    }
}
