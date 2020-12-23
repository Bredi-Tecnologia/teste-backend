<?php

require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Cadastrar produto');

use \App\Entity\Produto;
use \App\Entity\Categoria;


//BUSCAR CATEGORIAS 
$categorias = Categoria::getCategorias();

// Validar post
if (isset($_POST['nome'], $_POST['preco'], $_POST['categoria_id'])) {
  $novo_produto = new Produto;
  $novo_produto->nome = $_POST['nome'];
  $novo_produto->preco = $_POST['preco'];
  $novo_produto->categoria_id = $_POST['categoria_id'];
  $novo_produto->cadastrar();

  header('location: index.php?status=success');

  exit;
}
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';
