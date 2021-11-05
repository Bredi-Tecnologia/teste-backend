<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Entity\Produtos;
use Exception;

class ProdutosController extends Controller{
    public function index(){
        $produtos = DB::table('produtos as p')
            ->join('categorias as c', 'c.id', '=', 'p.categoria_id')
            ->whereNull('deleted_at')
            ->select([
                'p.id',
                'c.titulo',
                'p.nome',
                'p.preco',
                DB::raw("to_char(created_at, 'DD/MM/YYYY') as created_at")
            ])
            ->orderByDesc("created_at")
            ->get();

        return view("home", compact('produtos'));
    }
    public function create(){
        $categorias = DB::table('categorias')
        ->select([
            'id',
            'titulo'
        ])
        ->get();
        return view("create", compact('categorias'));
    }
    public function save(Request $request)
    {
        $request->validate([
            'categoria_id' => 'required',
            'nome' => 'required',
            'preco' => 'required'
        ]);

        $cadastro = new Produtos();

        $cadastro->categoria_id = $request->categoria_id;
        $cadastro->nome = $request->nome;
        $cadastro->preco = $request->preco;

        $cadastro->save();
        // return response()->json(['message' => 'Dados registrados com sucesso']); 
        return redirect('/');

    }
    public function edit($id){
        $produtos = Produtos::findOrfail($id);

        $categorias = DB::table('categorias')
        ->select([
            'id',
            'titulo'
        ])
        ->get();
        return view("edit", compact('produtos', 'categorias'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'categoria_id' => 'required',
            'nome' => 'required',
            'preco' => 'required'
        ]);

        // try {
            $editar = Produtos::find($request->id);
            $editar->categoria_id = $request->categoria_id;
            $editar->nome = $request->nome;
            $editar->preco = $request->preco;

            $editar->save();
            
            // return response()->json(['message' => 'Dados registrados com sucesso']);
            return redirect('/');
    }

    public function delete(Produtos $id)
    {
        $id->delete();
        return redirect('/');
    }

    public function grid(Request $nome)
    {
        $sql = DB::table('produtos')
        ->where('nome', $nome);
        return $sql->get();
    }
}