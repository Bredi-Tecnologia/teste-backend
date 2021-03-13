<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Test-Backend</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">



    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
</head>
<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Test-Backend</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <span data-feather="home"></span>
                            Inicio
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class='h2'>Produtos</h1>
                <div class="btn-toolbar">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#novoproduto">Novo Produto</button>
                    </div>

                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Preço</th>
                        <th></th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($produtos as $prod)
                        <tr>
                            <td>{{$prod->id}}</td>
                            <td>{{$prod->nome}}</td>
                            <td>{{$prod->categoria['titulo']}}</td>
                            <td>{{$prod->preco}}</td>
                            <td>
                                <button class="btn btn-info" onclick="editar({{ $prod->id}}, '{{$prod->nome}}',{{$prod->preco }})">Editar</button> |
                                <button class="btn btn-danger" onclick="excluir({{ $prod->id}}, '{{$prod->nome}}',{{$prod->preco }},'{{$prod->categoria['titulo']}}')">Excluir</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<!-- Modal Novo Produto-->
<div class="modal fade" id="novoproduto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Novo Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('novoproduto')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="nomeProduto" class="form-label">Nome do Produto</label>
                        <input type="text" class="form-control" id="nomeProduto" name="nomeproduto" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Categorias</label>
                        <select class="form-select" aria-label="Default select example" name="categoria" required>
                            <option value="" selected>Selecione uma categoria</option>
                            @foreach($categorias as $cat)
                                <option value="{{$cat->id}}">{{$cat->titulo}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="precoproduto" class="form-label">Preço</label>
                        <input type="number" class="form-control" id="precoproduto" name="preco" step="0.01">
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar Produto-->
<div class="modal fade" id="editarproduto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('editarproduto')}}">
                    @csrf
                    @method('PUT')
                    <input type="text" hidden class="form-control" id="idproduto" name="id" >
                    <div class="mb-3">
                        <label for="nomeProduto" class="form-label">Nome do Produto</label>
                        <input type="text" class="form-control" id="nomeProdutoeditar" name="nomeproduto" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Categorias</label>
                        <select class="form-select" aria-label="Default select example" name="categoria" required>
                            <option selected value="">Selecione uma categoria</option>
                            @foreach($categorias as $cat)
                                <option value="{{$cat->id}}">{{$cat->titulo}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="precoproduto" class="form-label">Preço</label>
                        <input type="number" class="form-control" id="precoprodutoeditar" name="preco" step="0.01">
                    </div>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Excluir Produto-->
<div class="modal fade" id="delproduto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('deletaproduto')}}">
                    @csrf
                    @method('DELETE')
                    <input type="text" hidden class="form-control" id="idprodutodel" name="id" >
                    <div class="mb-3">
                        <label for="nomeProduto" class="form-label">Nome do Produto</label>
                        <input type="text" class="form-control" id="nomeProdutodel" name="nomeproduto" readonly >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Categorias</label>
                        <select class="form-select" aria-label="Default select example" name="categoria" readonly >
                            <option id="optdel" value=""></option>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="precoproduto" class="form-label">Preço</label>
                        <input type="number" class="form-control" id="precoprodutodel" name="preco" step="0.01" readonly>
                    </div>
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function editar(id, nome, preco){
        document.getElementById('idproduto').value = id;
        document.getElementById('nomeProdutoeditar').value = nome;
        document.getElementById('precoprodutoeditar').value = preco;
        var editarModal = new bootstrap.Modal(document.getElementById('editarproduto'), {
            keyboard: false
        })

        editarModal.show()
    }

    function excluir(id, nome, preco, categoria){
        document.getElementById('idprodutodel').value = id;
        document.getElementById('nomeProdutodel').value = nome;
        document.getElementById('precoprodutodel').value = preco;
        document.getElementById('optdel').text = categoria;
        var delModel = new bootstrap.Modal(document.getElementById('delproduto'), {
            keyboard: false
        })
        delModel.show()
    }
</script>

<script src="/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="/js/dashboard.js"></script>
</body>
</html>
