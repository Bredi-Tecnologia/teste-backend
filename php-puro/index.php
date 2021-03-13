<?php
    //Ambiente Linux
    //include("../app/header.php");

    //para executar com xampp Windows
    include($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI']."app/header.php");
    include($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI']."app/controle.php");
?>
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
        <?php
        foreach ($listaDeProdutos as $produtos){
            ?>
            <tr>
                <td><?php echo $produtos->getId(); ?></td>
                <td><?php echo $produtos->getNome(); ?></td>
                <td><?php echo $produtos->getCategoria(); ?></td>
                <td><?php echo $produtos->getPreco(); ?></td>
                <td><button class="btn btn-info" onclick="editar(<?php echo $produtos->getId().',\''.$produtos->getNome().'\',\''.$produtos->getPreco().'\'' ?>)">Editar</button> |
                    <button class="btn btn-danger" onclick="excluir(<?php echo $produtos->getId().',\''.$produtos->getNome().'\',\''.$produtos->getPreco().'\',\''.$produtos->getCategoria().'\'' ?>)">Excluir</button>
                </td>
            </tr>
            <?php
        }
        ?>

        </tbody>
    </table>
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
                    <form method="post" action="">
                        <input name="_method" type="hidden" value="post" />
                        <div class="mb-3">
                            <label for="nomeProduto" class="form-label">Nome do Produto</label>
                            <input type="text" class="form-control" id="nomeProduto" name="nomeproduto" >
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Categorias</label>
                            <select class="form-select" aria-label="Default select example" name="categoria" required>
                                <option selected>Selecione uma categoria</option>
                                <?php
                                    foreach ($categorias as $cat){
                                ?>
                                        <option value="<?php echo $cat['id'] ?>"><?php echo $cat['titulo'] ?></option>
                                <?php
                                    }
                                ?>
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
                    <form method="POST" action="">
                        <input name="_method" type="hidden" value="put" />
                        <input type="text" hidden class="form-control" id="idproduto" name="id" >
                        <div class="mb-3">
                            <label for="nomeProduto" class="form-label">Nome do Produto</label>
                            <input type="text" class="form-control" id="nomeProdutoeditar" name="nomeproduto" >
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Categorias</label>
                            <select class="form-select" aria-label="Default select example" name="categoria" required>
                                <option selected value="">Selecione uma categoria</option>
                                <?php
                                foreach ($categorias as $cat){
                                    ?>
                                    <option value="<?php echo $cat['id'] ?>"><?php echo $cat['titulo'] ?></option>
                                    <?php
                                }
                                ?>
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
                    <form method="POST" action="">
                        <input name="_method" type="hidden" value="delete" />
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
<?php

    //Ambiente Linux
    //include("../app/footer.php");

    //para executar com xampp Windows
    include($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI']."app/footer.php");