
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <li><a href="../index.html">
        <p class="white-text">retorna para o menu principal</p>
        </a>
    </li>
    <main style="padding-left: 350px;">

    <h1>Inserir Produtos</h1>

        <?php

            require("conexao.php");
            $pdo  = new db();
            $nome = $_POST["nome"];
            $preco = $_POST["preco"];
            $precofinal = str_replace(",", ".", $preco);
            $categ = $_POST["categ"];

            $pdo->mysql->beginTransaction();

            $pst = $pdo->mysql->prepare("INSERT INTO produtos VALUES(NULL,:nome,:preco,:categ);");
            $pst->bindParam(":nome", $nome, PDO::PARAM_STR);
            $pst->bindParam(":preco", $precofinal, PDO::PARAM_STR);
            $pst->bindParam(":categ", $categ, PDO::PARAM_STR);
            $pst->execute();


            if ($pst) {
            $pdo->mysql->commit();
            echo "<h5>Cadrastro realizado!</h5>";
            header("refresh:1;url=../cadastra.html");
            } else {
            echo "erro!";
            }


        ?>
</main>

</body>
</html>