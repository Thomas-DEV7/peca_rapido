<?php
session_start();
// echo 'Olá, ' . $_SESSION["nome"];
// if ($_SESSION['nome'] == null) {
//     $_SESSION['message_session'] = "Você precisa logar para acessar o dashboard!";
//     header('location: ../login');
// }


require_once './components/header.php';

require './components/conn.php';
require_once './index2.php';
