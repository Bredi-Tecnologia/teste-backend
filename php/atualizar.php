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

    <h1>Alterar Registros</h1>

    <!-- Os dados pegos anteriormente serão enviados pro BD pra realizar o Update. -->
    <?php

    require("./conect.php");
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];

    $pdo  = new db();
    $pdo->mysql->beginTransaction();
    $rs = $pdo->mysql->prepare("update produtos set nome = :nome, preco = :preco where id = :id");
    $rs->bindParam(":nome", $nome, PDO::PARAM_STR);
    $rs->bindParam(":preco", $preco, PDO::PARAM_STR);
    $rs->bindParam(":id", $id, PDO::PARAM_INT);
    $rs->execute();

    if ($rs) {

      $pdo->mysql->commit();
      echo "<h5>Dados Alterados com sucesso!</h5>";
      header("refresh:1;url=../alterar.php");
    } else {
      echo "Erro inesperado";
    }

    ?>
    <!-- Quando pronto,será redirecionado a página de alterações de registro -->
  </main>

  <script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="../js/materialize.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.sidenav').sidenav();
    });
    $(document).ready(function() {
      $('select').formSelect();
    });
  </script>
</body>

</html>