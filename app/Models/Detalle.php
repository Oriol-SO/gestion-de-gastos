<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    
    public function Insumo(){
        return $this->belongsTo(Insumo::class,'insumo_id','id');
    }
}
