<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    //Relacion 1:1 usuario y perfil
    public function usuario(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
