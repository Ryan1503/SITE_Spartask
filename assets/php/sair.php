<?php
// Inicia a sessão
session_start();

// Remove todas as variáveis de sessão
session_unset();

// Destroi a sessão
session_destroy();

// Redireciona para a página inicial
header('Location: /spartask/index.php');
?>
