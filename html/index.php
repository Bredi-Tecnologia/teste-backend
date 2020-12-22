<?php

include __DIR__ . '/vendor/autoload.php';

use \App\Entity\Produto;

$produtos = Produto::getProdutos();

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listar.php';
include __DIR__ . '/includes/footer.php';
