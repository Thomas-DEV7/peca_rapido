<?php
$host = 'localhost';
$dbname = 'pecarapido';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "conectado!"; // se der certo aparecerá isso
} catch (PDOException $e) {
    echo "Erro ao conectar: " . $e->getMessage();
}
