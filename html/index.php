<?php
$host = "mysql-server";
$user = "root";
$pass = "secret";
$db = "app1";

include __DIR__ . '/vendor/autoload.php';
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listar.php';
include __DIR__ . '/includes/footer.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
