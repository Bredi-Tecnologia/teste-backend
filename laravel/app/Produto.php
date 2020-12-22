<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categoria;
class Produto extends Model
{
    //
    public $timestamps = false;

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
