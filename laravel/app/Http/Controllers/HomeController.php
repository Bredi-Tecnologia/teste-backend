<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Produto;

class HomeController extends Controller
{
    //
    public function index(){
        $cat = Categoria::all();
        $prod = Produto::all();

        return view('home', ['produtos'=>$prod, 'categorias'=>$cat]);
    }

    public function novoProduto(Request $request){
        $pro = new Produto();
        $pro->nome = $request->nomeproduto;
        $pro->categoria_id = $request->categoria;
        $pro->preco = $request->preco;
        $pro->save();
        return redirect()->route('home');
    }

    public function editarproduto(Request $request){
        $pro = Produto::find($request->id);
        $pro->nome = $request->nomeproduto;
        $pro->categoria_id = $request->categoria;
        $pro->preco = $request->preco;
        $pro->update();
        return redirect()->route('home');
    }

    public function deletaProduto(Request $request)
    {
        $pro = Produto::find($request->id);
        $pro->delete();
        return redirect()->route('home');
    }
}
