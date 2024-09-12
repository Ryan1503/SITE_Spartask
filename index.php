<?php
session_start(); // Inicia a sessão

// Verifica se a sessão 'id' está ativa
if ($_SESSION['id'] > 0) {
    header('Location: home.php');
    exit();
} else {
    header('Location: home-sem-login.php');
    exit();
}
?>