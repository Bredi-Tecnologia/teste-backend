<?php

$servename = "localhost";
$username = "root";
$dbname = "bredi_test";
$password = "";

try {
    $conn = new PDO("mysql:host=$servename;dbname=$dbname", $username, $password);

} catch (PDOException $e) {

    echo "Falha na Conexão".$e->getMessage();
}