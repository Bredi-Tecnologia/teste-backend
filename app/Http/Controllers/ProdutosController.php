<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Entity\Produtos;
use Illuminate\Support\Str;
use Exception;

class ProdutosController extends Controller{
    public function index(){
        $produtos = DB::table('produtos')
            ->whereNull('deleted_at')
            ->select([
                'id',
                'categoria_id',
                'nome',
                'preco',
                DB::raw("to_char(created_at, 'DD/MM/YYYY') as created_at")
            ])
            ->orderByDesc("created_at")
            ->get();

        return view("welcome", compact('produtos'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'categoria_id' => 'required',
            'nome' => 'required',
            'preco' => 'required'
        ]);

        $cadastro = new Produtos();
        $cadastro->cadastro_id = $request->cadastro_id;
        $cadastro->nome = $request->nome;
        $cadastro->preco = $request->preco;
        $cadastro->created_at = date('Y-m-d H:i:s');

        $cadastro->save();

        return response()->json(['message' => 'Dados registrados com sucesso']);

    }

    public function update(Request $request)
    {
        $request->validate([
            'categoria_id' => 'required',
            'nome' => 'required',
            'preco' => 'required'
        ]);

        $a = null;

        try {
            $editar = Produtos::find($request->id);
            $editar->categoria_id = $request->categoria_id;
            $editar->nome = $request->nome;
            $editar->preco = $request->preco;
            $editar->created_at = date('Y-m-d H:i:s');

            $editar->save();
            
            return response()->json(['message' => 'Dados registrados com sucesso']);
        } catch(Exception $ex) {
            $error = [
                'erros' => [
                    'descricao' => 'Erro ao atualizar os dados. '.$ex->getMessage()
                ]
            ];

            return response()->json([$error, 500]);
        }
    }

    public function delete(Produtos $id)
    {
        $id->delete();
    }

    public function grid(Request $titulo)
    {
        $sql = DB::table('institucional')
            ->where('titulo', $titulo);

        return $sql->get();
    }
}