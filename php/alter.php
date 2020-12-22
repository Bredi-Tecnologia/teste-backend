<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta charset="utf-8" />
</head>

<body>

  </div>
  <!-- Sidenav-->
  <ul class="sidenav sidenav-fixed indigo darken-4" id="mobile-demo">
    <img src="../images/logo.png" width="200" height="200" style="margin-left: 50px;" />
    <li><a href="../index.html">
        <p class="white-text">Inserir Produtos</p>
      </a></li>
    <li><a href="../alterar.php">
        <p class="white-text">Alterar Registros</p>
      </a></li>

  </ul>

  <!-- Corpo do Site-->

  <main style="padding-left: 350px;">
    <h1>Alterar Registros</h1>
    <!-- Será feito uma consulta no BD com base no botão do registro selecionado - utilizando-se da ID única do produto no BD -->
    <form class="col s12" method="POST" action="atualizar.php">
      <?php
      require("./conect.php");
      $id = $_GET["id"];
      $pdo  = new db();
      $pdo->mysql->beginTransaction();
      $rs = $pdo->mysql->query("select * from produtos where id = {$id}");
      foreach ($rs as $listas) {
        $listas["Nome"];
        $listas["Preco"];
      }

      ?>
      <!-- O Resultado dessa consulta será exibido no formulário. Detalhe, foi removido o botão de limpar 
      formulário, pois uma vez que se obtém dados do BD e são preenchidos automaticamente no formulário, 
      por algum motivo esse botão não funciona. então decidi apagar ele.   -->
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">bookmark</i>
          <input value="<?php echo $id ?>" placeholder="ID" id="first_name" type="text" class="validate" name="id">
          <label for="first_name">ID no BD(Não alterar este campo)</label>
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix">bookmark</i>
          <input value="<?php echo $listas['Nome'] ?>" placeholder="Ex: Máquina de Lavar..." id="first_name" type="text" class="validate" name="nome">
          <label for="first_name">Nome do Produto</label>
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix">attach_money</i>
          <input value="<?php echo $listas['Preco'] ?>" placeholder="Ex: 2.500" id="last_name" type="text" class="validate" name="preco">
          <label for="last_name">Preço</label>
        </div>
      </div>
      </div>
      <button class="btn waves-effect waves-light" type="submit" name="action">Salvar
        <i class="material-icons right">send</i>
      </button>
    </form>
    <!-- Finaliza a alteração -->
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