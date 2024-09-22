<?php
require('base_codigo.php');
// Inicia a sessão para o usuário
session_start();

// Verifica se os dados foram enviados pelo método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitiza os dados recebidos
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verifica se o email e a senha foram fornecidos
    if (empty($email) || empty($senha)) {
        echo "Por favor, preencha todos os campos.";
        exit();
    }
    $sql_code = "SELECT * FROM usuarios WHERE email = '$email'";
    $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);

    $quantidade = $sql_query->num_rows;
    if($quantidade == 1) {
    $usuario = $sql_query->fetch_assoc();
    $_SESSION['id'] = $usuario['id'];
    $_SESSION['email'] = $usuario['email'];
    $_SESSION['nome'] = $usuario['nome'];
    $_SESSION['telefone'] = $usuario['telefone'];
    $_SESSION['senha'] = $usuario['senha'];

    if($_SESSION['email'] == 'ryanocbomfim@gmail.com'){
        header('Location: ../../admin/');
    }else{
        header('Location: ../../user/');
        exit();
    }
    } else {

        echo "Falha ao logar! E-mail ou senha incorretos";
    }



} else {
    echo "Método de requisição não permitido.";
}
?>
