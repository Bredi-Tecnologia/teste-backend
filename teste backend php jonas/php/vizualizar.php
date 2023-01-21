<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="../index.html">
        <p class="white-text">retorna para o menu principal</p>
        </a>
    
<main style="padding-left: 350px;">
    <h1>Todos os Produtos</h1>
    <table>
      <thead>
        <tr>
          <th>Categoria</th>
          <th>Nome Do Produto</th>
          <th>Preço</th>
        </tr>
      </thead>

      <tbody>

        <?php

        require("conexao.php");

        $pdo  = new db();
        $pdo->mysql->beginTransaction();
        $rs = $pdo->mysql->query("select * from produtos");

        foreach ($rs as $lista) {
          if ($lista["id_categoria"] == 2) {
            $lista["id_categoria"] = "Eletrodomésticos";
          } else if ($lista["id_categoria"] == 3) {
            $lista["id_categoria"] = "Celulares";
          } else if ($lista["id_categoria"] == 4) {
            $lista["id_categoria"] = "Alimentos";
          } else if ($lista["id_categoria"] == 5) {
            $lista["id_categoria"] = "Informática";
          } else {
            echo "Error";
          }

          echo 
            "<tr>
                  <td>" . $lista["id"] . "</td>
            </tr>
                  <td>" . $lista["id_categoria"] . "</td>
                  <td>" . $lista["Nome"] . "</td>
                  <td>R$" . number_format($lista["Preco"], 2, ',', '.') . "</td>
                  <td>
                    <a href ='alter.php?id=" . $lista["id"] . "' class='waves-effect waves-light btn-large'>
                    <i class='material-icons left'>alterar</i></a>
                    <a href ='excluir.php?id=" . $lista["id"] . "' class='waves-effect waves-light btn-large'>
                    <i class='material-icons left'>excluir</i></a>
                  </td>
               </tr>";
        };
        ?>
      </tbody>
    </table>
  </main>
</body>
</html>