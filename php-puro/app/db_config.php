<?php

$servename = "localhost";
$username = "root";
$dbname = "bredi_test";
$password = "";

header('Content-Type: text/html; charset=utf-8');
try {
    $conn = new PDO("mysql:host=$servename;dbname=$dbname;charset=utf8", $username, $password);

} catch (PDOException $e) {

    echo "Falha na Conexão".$e->getMessage();
}