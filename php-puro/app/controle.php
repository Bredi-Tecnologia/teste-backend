<?php
//para executar com xampp Windows
include($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI']."class/Produto.php");


// Caso tenha requesição do tipo Post
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    //Requisisão para novos produtos
    if(isset($_POST['nomeproduto']) && isset($_POST['categoria']) && isset($_POST['preco']) && $_POST['_method'] == 'post'){
        print_r(Produto::criarProduto($_POST['nomeproduto'], $_POST['categoria'], $_POST['preco'] ));

    //Reqisição para editar produtos
    }elseif (isset($_POST['id']) && isset($_POST['nomeproduto']) && isset($_POST['categoria']) && isset($_POST['preco'])){
        if ($_POST['_method'] == 'put'){
            print_r(Produto::editarProduto($_POST['id'],$_POST['nomeproduto'],$_POST['categoria'],$_POST['preco']));
            echo "Produto atualizado";
        }
    }
    if (isset($_POST['id']) && (isset($_POST['_method']))){
        if ($_POST['_method'] == 'delete'){
            print_r(Produto::deletaProduto($_POST['id']));
            echo "Produto Deletado";
        }
    }
}



//Variaiveis para o index;
$listaDeProdutos = Produto::allProdutos();
$categorias = Produto::allCategorias();