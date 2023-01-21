<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>altera</title>
</head>
<body>
<a href="../index.html">
    <p class="white-text">retorna para o menu principal</p>
  </a>
  <br>
  <P>Esse o e id do produto no banco de dados</P>
    <form class ="cad-produto" method="POST" action="atualizar.php">
    <?php
     require("conexao.php");
     $id = $_GET["id"];
     $pdo  = new db();
     $pdo->mysql->beginTransaction();
     $rs = $pdo->mysql->query("SELECT * FROM produtos WHERE id = {$id}");
     foreach ($rs as $listas) {
        $listas["Nome"];
        $listas["Preco"];
     }
     echo
           "<td>" . $listas["id"] .  "</td>"
    ?>
            <br><br>
            <div class="input-field cad-produto">
          <input value="<?php echo $id ?>" placeholder="ID" id="nomeID" type="text" class="validate" name="id">
          <label for="first_name">ID no BD(Não alterar este campo)</label>
        </div>
                <div class="input-field cad-produto">
                     <input value="<?php echo $listas['Nome'] ?>" placeholder="nome do produto" id="nomeProduto" type="text" class="validate" name="nome">
                </div><br>
                <div class="input-field cad-produto">
                    <input value="<?php echo $listas['Preco'] ?>" placeholder="valor do produto" id="valProduto" type="text" class="validate" name="preco">
                </div><br>
            <button class="btn waves-effect waves-light" type="submit" name="action">confirma</button>
    </form>
    
</body>
</html>