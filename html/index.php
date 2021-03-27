<?php

include __DIR__ . '/vendor/autoload.php';

use \App\Entity\Produto;
use \App\Entity\Categoria;

$produtos = Produto::getProdutos();
$categorias = Categoria::getCategorias();

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listar.php';
include __DIR__ . '/includes/footer.php';
