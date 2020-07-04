<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{

    protected $fillable = [
        'titulo', 'preparacion', 'ingredientes', 'imagen', 'categoria_id', 
    ];

    //Obtiene la categoria de la receta 1:1
    public function categoria()
    {
        return $this->belongsTo(CategoriaReceta::class);
    }

    //Obtiene la info de autor por FK
    public function autor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //Likes que ha recibido una receta
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes_receta');
    }
}
