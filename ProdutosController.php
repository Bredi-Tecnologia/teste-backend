<?php

class ProdutosController extends Controller
{

    public function listar()
    {
        $produtos = Produto::all();
        return $this->view('grade', ['produtos' =>$produtos]);
    }


    public function criar()
    {
        return $this->view('form');
    }


    public function editar($dados)
    {
        $id      = (int) $dados['id'];
        $produto = Produto::find($id);

        return $this->view('form', ['produto' => $produto]);
    }


    public function salvar()
    {
        $produto           = new Produto;
        $produto->nome     = $this->request->nome;
        $produto->preco = $this->request->preco;
        $produto->categoria_id   = $this->request->categoria_id;
        if ($produto->save()) {
            return $this->listar();
        }
    }


    public function atualizar($dados)
    {
        $id                = (int) $dados['id'];
        $produto           = Produto::find($id);
        $produto->nome     = $this->request->nome;
        $produto->preco = $this->request->preco;
        $produto->categoria_id    = $this->request->categoria_id;
        $produto->save();

        return $this->listar();
    }

    public function excluir($dados)
    {
        $id      = (int) $dados['id'];
        $produto = Produto::destroy($id);
        return $this->listar();
    }
}