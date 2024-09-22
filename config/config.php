<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'spartask';

$conexao = new mysqli($host, $username, $password, $database);

if ($conexao->connect_error) {
    die('Conexão falhou: ' . $conexao->connect_error);
}

$conexao->set_charset('utf8mb4');

// Redireciona para index.php se o arquivo for acessado diretamente
if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
    header('Location: /index.php');
    exit;
}
?>
