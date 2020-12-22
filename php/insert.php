<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta charset="utf-8" />
</head>

<body>
  <!-- Sidenav-->
  <ul class="sidenav sidenav-fixed indigo darken-4" id="mobile-demo">
    <img src="../images/logo.png" width="200" height="200" style="margin-left: 50px;" />
    <li><a href="index.html">
        <p class="white-text">Inserir Produtos</p>
      </a></li>
    <li><a href="alterar.php">
        <p class="white-text">Alterar Registros</p>
      </a></li>

  </ul>

  <!-- Corpo do Site-->

  <main style="padding-left: 350px;">

    <h1>Inserir Produtos</h1>

    <!--  será inserido os dados no BD. Depois volta-se a página anterior. -->
    <!-- Lembrando: Foi usado o software servidor Xampp para desenvolver este projeto. 
  Caso necessário, fazer adaptações na página conect.php e alterar as informações de conexão com BD.-->
    <?php

    require("conect.php");
    $pdo  = new db();
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $precofinal = str_replace(",", ".", $preco);
    $categ = $_POST["categ"];

    $pdo->mysql->beginTransaction();

    $pst = $pdo->mysql->prepare("insert into produtos values(NULL,:nome,:preco,:categ);");
    $pst->bindParam(":nome", $nome, PDO::PARAM_STR);
    $pst->bindParam(":preco", $precofinal, PDO::PARAM_STR);
    $pst->bindParam(":categ", $categ, PDO::PARAM_STR);
    $pst->execute();


    if ($pst) {
      $pdo->mysql->commit();
      echo "<h5>Dados inseridos com sucesso!</h5>";
      header("refresh:1;url=../index.html");
    } else {
      echo "Doido!";
    }


    ?>
  </main>

  <script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="../js/materialize.min.js"></script>
  <!-- Funções Javascript que ativam alguns efeitos no formulário da página feito com o Materialize CSS-->
  <script type="text/javascript">
    $(document).ready(function() {
      $('select').formSelect();
    });
  </script>
</body>

</html>