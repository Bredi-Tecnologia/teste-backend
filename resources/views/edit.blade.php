<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>Editar</title>

</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ url('/')}}">Home</a>
        </div>
      </nav>
      
    <div class="container">
        <h3>Editar</h3>
        <form action="{{url('update')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$produtos->id}}">
            <label for="">Categoria</label>

            <select class="form-select" name="categoria_id" id="categoria_id">
                <option selected>Selecione..</option>
                @foreach($categorias as $categoria)   
                <option  {{ $categoria->id == $produtos->categoria_id ? 'selected': ''}} name="categoria_id" value="{{ $categoria->id }}" >{{ $categoria->titulo }}</option>
                @endforeach    
            </select>

            <label for="">Nome</label>
            <input class="form-control" type="text" id="nome" name="nome" value="{{$produtos->nome}}">

            <label for="">Preço</label>
            <input class="form-control" type="number" id="preco" name="preco" value="{{$produtos->preco}}">
            <br>
            <button type="submit" class="btn btn-outline-primary" name="action" value="update">Editar</button>
            <a class="btn btn-outline-danger" role="button" href="{{ url('/')}}">Voltar</a>
        </form>
    </div>
</body>
</html>