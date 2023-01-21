<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>atualizar</title>
</head>
<body>
        <?php

                require("conexao.php");
                $id = $_POST["id"];
                $nome = $_POST["nome"];
                $preco = $_POST["preco"];

                $pdo  = new db();
                $pdo->mysql->beginTransaction();
                $rs = $pdo->mysql->prepare("UPDATE produtos SET nome = :nome, preco = :preco WHERE id = :id");
                $rs->bindParam(":nome", $nome, PDO::PARAM_STR);
                $rs->bindParam(":preco", $preco, PDO::PARAM_STR);
                $rs->bindParam(":id", $id, PDO::PARAM_INT);
                $rs->execute();

                if ($rs) {

                $pdo->mysql->commit();
                echo "<h5>ALTERADO COM SUCESSO</h5>";
                header("refresh:1;url=./vizualizar.php");
                } else {
                echo "Erro";
                }
        ?>
</body>
</html>