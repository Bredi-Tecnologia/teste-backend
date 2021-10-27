<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <form action="post">
        @foreach($categorias as $categoria)
            <option value="">
                <select name="" id=""></select>
                <select name="" id="{{ $categoria->id }}">{{ $categoria->nome }}</select>
            </option>
        @endforeach    
        <label for="">Nome</label>
        <input type="text" id="nome">
        <label for="">Preço</label>
        <input type="text" id="preco">
    </form>
</body>
</html>