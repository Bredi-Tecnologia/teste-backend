@extends('layouts.default')
@section('titulo', 'Criação e Edição')

@section('conteudo')

    <div class="card" style="width: 60%;">
        <div class="card-header"><strong>Formulario</strong></div>
        <div class="card-body">
            <form action="/" method="post">
                @csrf
                <div class="form-group">
                    <label>Nome</label>
                    <input class="form-control" type="text" name="nome" value="{{$dado->nome ?? ''}}">
                </div>
                <div class="form-group" style="margin-bottom:30px">
                    <label>Preço</label>
                    <input class="form-control" type="tel" name="preco" id="preco" value="{{$dado->preco ?? ''}}">
                </div>
                <label for="categoria">Selecione uma categoria</label>
                <select name="categoria" id="categoria" class="form-select">
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}">
                            {{$categoria->titulo}}
                        </option>  
                    @endforeach
                </select><br>
                <div class="card-footer">
                    <input type="hidden" name="id" value="{{$dado->id  ?? ''}}">
                    <button class="btn btn-block btn-outline-success" type="submit">Registrar</button>
                    <button class="btn btn-block btn-outline-primary" type="button" onclick="location.href = '/'">Voltar</button>
                </div>
            </form>
        </div>
    </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script>
    $(document).ready(function(){
          //Ajuste no Preço
          $('#preco').mask('00.00');
  });
</script>
@endsection