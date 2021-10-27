<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
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
                <td><a href="{{ url('') }}?id={{$produto->id}}">Editar</a></td>
            </tr>
		@endforeach
	</tbody>
</body>
</html>