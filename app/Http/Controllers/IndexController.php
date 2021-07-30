<?php

namespace App\Http\Controllers;

use App\Categorias;
use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller{

    public function listarAction(){
        $dados = Produto::all();       
        return view('index')->with('dados', $dados);
    }

    public function deleteAction(Request $request){
        $produto = Produto::find($request->input('delete'));
        $produto->delete();
        return redirect('/');
    }

    public function criarAction(Request $request){
        $categorias = Categorias::all();
        if(!empty($request->input('id'))){
            //dd($request);
            $produto = new Produto;
            $produto = Produto::find($request->input('id'));
            $produto->categoria_id = $request->input('categoria');
            $produto->nome = $request->input('nome', null);
            $produto->preco = $request->input('preco', 0.0);
            $produto->save();
            return redirect('/');
        }
        else{
            $produto = new Produto;
            $produto->categoria_id = $request->input('categoria');
            $produto->nome = $request->input('nome', null);
            $produto->preco = $request->input('preco', 0.0);
            $produto->save();

            return redirect('/');
        }
    }
}
