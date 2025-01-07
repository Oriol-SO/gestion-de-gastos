<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    //

    public function Generica(){
        return $this->belongsTo(Generica::class,'generica_id','id');
    }
}
