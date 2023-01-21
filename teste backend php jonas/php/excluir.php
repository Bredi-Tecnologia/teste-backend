<?php

if ($_GET) {
  try {
    require("conexao.php");
    $pdo = new db();
    $pdo->mysql->beginTransaction();
    $id = $_GET["id"];

    $dados = $pdo->mysql->prepare("delete from produtos where id = :id");
    $dados->bindParam(":id", $id, PDO::PARAM_INT);
    $dados->execute();
    $pdo->mysql->commit();
    header('Location: ./vizualizar.php');
  } catch (PDOException $ex) {
    echo "Erro";
    $pdo->mysql->rollback();
  }
}

?>