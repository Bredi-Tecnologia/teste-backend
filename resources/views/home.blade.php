<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>Teste-Backend</title>

</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ url('/')}}">Home</a>
        </div>
      </nav>
    <div class="container">
      <div>
        <a href="{{ url('/create') }}" class="btn btn-outline-primary">Cadastrar</a>
        <br>
        <br>
          <table class="table" width="100%" border="1"> 
            <thead>
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Categoria</th>
                <th scope="col">Preço</th>
                <th scope="col">Editar</th>
                <th scope="col">Deletar</th>
              </tr>
            </thead>
            <tbody>
              @foreach($produtos as $produto)
                <tr>
                  <td>{{ $produto->nome }}</td>
                  <td>{{ $produto->titulo }}</td>
                  <td>{{ $produto->preco }}</td>
                  <td><a href="{{ url('/edit') }}/{{$produto->id}}">Editar</a></td>
                  <td><a href="{{ url('/delete') }}/{{$produto->id}}" onclick="excluir()">Excluir</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
      </div>
    </div> 
    <script type="text/javascript">
      function excluir(){
        alert("Deletado com sucesso!")
      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   
</body>
</html>