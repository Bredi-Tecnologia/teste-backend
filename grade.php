
<h1 style="text-align: center">Formulário de Cadastro</h1>

<div class="container">
    <table class="table table-bordered table-striped" style="top:40px;">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Preço</th>
            <th>Categoria</th>
            <th><a href="?controller=ProdutosController&method=criar" class="btn btn-success btn-sm">Novo</a> <a href="index.php" class="btn btn-success btn-sm">Início</a></th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($produtos) {
            foreach ($produtos as $produto) {
                ?>
                <tr>
                    <td><?php echo $produto->nome; ?></td>
                    <td><?php echo $produto->preco; ?></td>
                    <td><?php echo $produto->categoria_id; ?></td>
                    <td>
                        <a href="?controller=ProdutosController&method=editar&id=<?php echo $produto->id; ?>" class="btn btn-primary btn-sm">Editar</a>
                        <a href="?controller=ProdutosController&method=excluir&id=<?php echo $produto->id; ?>" class="btn btn-danger btn-sm">Excluir</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="5">Nenhum registro encontrado</td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
     <h2 style="text-align: center">Código das Categorias dos Produtos</h2>
        <table class="table table-bordered table-striped" style="top:40px;">
            <tr></tr>
            <td>Eletromésticos</td>
            <td>Celulares</td>
            <td>Alimentos</td>
            <td>Informática</td>
            <tr></tr>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
        </table>

</div>