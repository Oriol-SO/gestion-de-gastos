<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaClasificacione extends Model
{
    
    public function Categoria(){
        return $this->belongsTo(Categoria::class,'categoria_id','id');
    }
}
