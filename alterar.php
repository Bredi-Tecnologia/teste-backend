<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta charset="utf-8" />
</head>

<body>
  <!-- Menu Desktop/Mobile-->

  <div class="container" style="padding-top: 40px;">
    <a href="#" data-target="nav-mobile" class="top-nav sidenav-trigger waves-effect waves-light circle hide-on-large-only">
      <i class="material-icons">menu</i></a>

  </div>
  <!-- Mobile-->
  <ul class="sidenav sidenav-fixed indigo darken-4" id="mobile-demo">
    <img src="images/logo.png" width="200" height="200" style="margin-left: 50px;" />
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
    <table>
      <thead>
        <tr>
          <th>Categoria</th>
          <th>Nome Do Produto</th>
          <th>Preço</th>
          <th>Alterar/Excluir</th>

        </tr>
      </thead>

      <tbody>

        <?php

        require("php/conect.php");

        $pdo  = new db();
        $pdo->mysql->beginTransaction();
        $rs = $pdo->mysql->query("select * from produtos");

        foreach ($rs as $list) {
          if ($list["id_categoria"] == 2) {
            $list["id_categoria"] = "Eletrodomésticos";
          } else if ($list["id_categoria"] == 3) {
            $list["id_categoria"] = "Celulares";
          } else if ($list["id_categoria"] == 4) {
            $list["id_categoria"] = "Alimentos";
          } else if ($list["id_categoria"] == 5) {
            $list["id_categoria"] = "Informática";
          } else {
            echo "Error";
          }

          echo
            "<tr>
                  <td>" . $list["id"] . "</td>
                  <td>" . $list["id_categoria"] . "</td>
                  <td>" . $list["Nome"] . "</td>
                  <td>R$" . number_format($list["Preco"], 2, ',', '.') . "</td>
                  <td>
                    <a href ='php/alter.php?id=" . $list["id"] . "' class='waves-effect waves-light btn-large'>
                    <i class='material-icons left'>edit</i></a>
                    <a href ='php/delete.php?id=" . $list["id"] . "' class='waves-effect waves-light btn-large'>
                    <i class='material-icons left'>highlight_off</i></a>
                  </td>
               </tr>";
        };
        ?>
      </tbody>
    </table>
  </main>

  <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
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