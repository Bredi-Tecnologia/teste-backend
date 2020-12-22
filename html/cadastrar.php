<?php

include __DIR__ . '/vendor/autoload.php';

use \App\Entity\Produto;

// Validar post
if (isset($_POST['nome'], $_POST['preco'], $_POST['categoria'])) {
  $novo_produto = new Produto;
  $novo_produto->nome = $_POST['nome'];
  $novo_produto->preco = $_POST['preco'];
  $novo_produto->categoria = $_POST['categoria'];

  echo $novo_produto;
  var_dump($_POST);
}
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';
