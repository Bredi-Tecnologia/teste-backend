<?php
namespace App\Models\Facade;

use Illuminate\Support\Facades\DB;

class CategoriasDB{
    public static function optionSelect(){
        $categorias = DB::table('categorias')
        ->select([
            'id',
            'titulo'
        ])
        ->get();

        return $categorias;
    }
}