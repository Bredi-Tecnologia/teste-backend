<?php

$lista_categorias = array();

foreach ($categorias as $categoria) {
  $lista_categorias[$categoria->id] = $categoria->titulo;
}

$mensagem = '';
switch ($_GET['status']) {
  case 'success':
    $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
    break;

  case 'error':
    $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
    break;
}

$resultados = '';
foreach ($produtos as $produto) {
  $resultados .= '<tr>
                      <td>' . $produto->id . '</td>
                      <td>' . $produto->nome . '</td>
                      <td>' . $produto->preco . '</td>
                      <td>' . $lista_categorias[$produto->categoria_id] . '</td>
                      <td>
                        <a href="editar.php?id=' . $produto->id . '">
                          <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                      </td>
                      
                      <td>
                        <a href="excluir.php?id=' . $produto->id . '">
                          <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                      </td>
                  </tr>';
}

$resultados = strlen($resultados) ? $resultados :
  '<tr><td colspan="6" class="text-center">Não há produtos</td></tr>';

?>

<main>
  <section>
    <a href="cadastrar.php">
      <button class="btn btn-success my-4">
        Cadastrar Produto
      </button>
    </a>
  </section>

  <section>
    <table class="table table-hover mt-3">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Preço</th>
          <th>Categoria</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?= $resultados ?>
      </tbody>
    </table>
  </section>
</main>