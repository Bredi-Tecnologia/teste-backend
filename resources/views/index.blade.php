@extends('layouts.default')
@section('titulo', 'Homepage')
    
@section('conteudo')
<h1>
    Produtos
</h1>
<div class="c-app">
<button class="btn btn-block btn-outline-success" type="button" onclick="location.href = '/criar'">Criar</button>
<table class="table table-striped">
    <thead>
        <th scope="col">id</th>
        <th scope="col">categoria_id</th>
        <th scope="col">Nome</th>
        <th scope="col">Preço</th>
        <th scope="col">Ações</th>
    </thead>

    <tbody>
        @if(empty($dados))
        <tr>Não tem nenhuma informação no banco de dados!</tr>
    @else
    @foreach ($dados as $dado)
    <tr>
        <td scope="row">{{$dado->id}}</td>
        <td>{{$dado->categoria_id}}</td>
        <td>{{$dado->nome}}</td>
        <td>{{'R$ ' .$dado->preco}}</td>

        <td>
            <div class="btn-group" role="group" aria-label="Basic example">
                    <button class="btn btn-block btn-outline-warning" type="button" onclick="location.href = '/editar/{{$dado->id}}'">Editar</button>
                &nbsp;
                <form action="" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-block btn-outline-danger" type="submit"  name="delete" value="{{$dado->id}}">Apagar</button>
                </form>
            </div>
        </td>
    </tr>          
@endforeach
    @endif
    </tbody>
</table>
</div>
@endsection