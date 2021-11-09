<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entity\Produtos;
use App\Models\Facade\CategoriasDB;
use App\Models\Facade\ProdutosDB;

class ProdutosController extends Controller{
    public function index(){
        $produtos = ProdutosDB::dataTable();
        return view("home", compact('produtos'));
    }

    public function create(){
        $categorias = CategoriasDB::optionSelect();
        return view("create", compact('categorias'));
    }

    public function save(Request $produto)
    {
        ProdutosDB::validate($produto);
        ProdutosDB::create($produto);
        return redirect('/');
    }

    public function edit($id){
        $produtos = Produtos::findOrfail($id);
        $categorias = CategoriasDB::optionSelect();
        return view("edit", compact('produtos', 'categorias'));
    }

    public function update(Request $produto)
    {
        ProdutosDB::validate($produto);
        ProdutosDB::edit($produto);
        return redirect('/');
    }

    public function delete(Produtos $id)
    {
        ProdutosDB::delete($id);
        return redirect('/');
    }
}