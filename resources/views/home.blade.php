<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
    <div class="container">

    </div>
    <table width="100%" border="1">
        <thead>
            <tr>
                <td>Nome</td>
                <td>Categoria</td>
                <td>Preço</td>
                <td>#</td>
            </tr>
        </thead>
        <tbody>
		@foreach($produtos as $produto)
            <tr>
                <td>{{ $produto->nome }}</td>
                <td>{{ $produto->categoria }}</td>
                <td>{{ $produto->preco }}</td>
                <td><a href="{{ url('/editar') }}?id={{$produto->id}}">Editar</a></td>
                <td><a href="{{ url('/excluir') }}?id={{$produto->id}}">Excluir</a></td>
            </tr>
		@endforeach
	</tbody>
</body>
</html>