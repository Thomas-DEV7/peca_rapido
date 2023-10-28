<?php

require_once './components/conn.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta SQL para buscar os dados do produto com base no ID
    $consulta = $pdo->prepare("DELETE FROM produtos WHERE id = :id");
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    header('Location: ./index.php');
} else {
    echo "ID não encontrado na URL.";
    exit; // Encerre o script se não houver ID na URL.
}
