<!-- Deleta Registro. e volta para página anterior -->
<?php

if ($_GET) {
  try {
    require("conect.php");
    $pdo = new db();
    $pdo->mysql->beginTransaction();
    $id = $_GET["id"];

    $pst = $pdo->mysql->prepare("delete from produtos where id = :id");
    $pst->bindParam(":id", $id, PDO::PARAM_INT);
    $pst->execute();
    $pdo->mysql->commit();
    header('Location: ../alterar.php');
  } catch (PDOException $ex) {
    echo "Erro";
    $pdo->mysql->rollback();
  }
}

?>