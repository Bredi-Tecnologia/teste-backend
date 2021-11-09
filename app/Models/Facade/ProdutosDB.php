<?php
namespace App\Models\Facade;

use App\Models\Entity\Produtos;
use Illuminate\Support\Facades\DB;

class ProdutosDB{
    public static function dataTable(){
        $produtos = DB::table('produtos as p')
            ->join('categorias as c', 'c.id', '=', 'p.categoria_id')
            ->whereNull('deleted_at')
            ->select([
                'p.id',
                'c.titulo',
                'p.nome',
                'p.preco',
                DB::raw("to_char(p.created_at, 'DD/MM/YYYY') as created_at")
            ])
            ->orderByDesc("id")
            ->get();

        return $produtos;
    }

    public static function validate($produto){
        $produto->validate([
            'categoria_id' => 'required',
            'nome' => 'required',
            'preco' => 'required'
        ]);
        return $produto;
    }

    public static function create($produto){
        $cadastro = new Produtos();
        
        $cadastro->categoria_id = $produto->categoria_id;
        $cadastro->nome = $produto->nome;
        $cadastro->preco = $produto->preco;
        $cadastro->save();
    }
    
    public static function edit($produto){
        $editar = Produtos::find($produto->id);
        $editar->categoria_id = $produto->categoria_id;
        $editar->nome = $produto->nome;
        $editar->preco = $produto->preco;
        $editar->save();
    }

    public static function delete($id){
        $id->delete();
    }
}