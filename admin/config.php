<?php
// Define as constantes para a configuração do banco de dados
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'spartask');

// Cria a conexão com o banco de dados
$conexao = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Verifica se a conexão foi estabelecida com sucesso
if ($conexao->connect_error) {
    // Exibe uma mensagem de erro se a conexão falhar
    die('Conexão falhou: ' . $conexao->connect_error);
}

// Define o conjunto de caracteres para a conexão
$conexao->set_charset('utf8mb4');

// Previne o acesso direto ao arquivo
if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
    die('Acesso negado.');
}
?>
