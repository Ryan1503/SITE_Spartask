<?php
include 'config.php'; // Inclui o arquivo de configuração para a conexão com o banco de dados

// Função para sanitizar dados de entrada
function sanitizeInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Verifica se os dados foram enviados pelo método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitiza os dados recebidos
    $email = sanitizeInput($_POST['email']);
    $senha = sanitizeInput($_POST['senha']);

    // Verifica se o email e a senha foram fornecidos
    if (empty($email) || empty($senha)) {
        echo "Por favor, preencha todos os campos.";
        exit();
    }

    // Prepara a consulta SQL para verificar as credenciais
    $stmt = $conexao->prepare("SELECT id, senha FROM usuarios WHERE email = ?");
    if ($stmt === false) {
        echo "Erro na preparação da consulta: " . $conexao->error;
        exit();
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Verifica se o email está registrado
    if ($stmt->num_rows == 0) {
        echo "Email ou senha inválidos.";
        $stmt->close();
        $conexao->close();
        exit();
    }

    // Faz o bind dos resultados e verifica a senha
    $stmt->bind_result($id, $senha_hash);
    $stmt->fetch();

    // Verifica a senha
    if (!password_verify($senha, $senha_hash)) {
        echo "Email ou senha inválidos.";
        $stmt->close();
        $conexao->close();
        exit();
    }

    // Inicia a sessão para o usuário
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['id'] = $id;
    $_SESSION['email'] = $email;

    echo "Login bem-sucedido!";
    header("Location: painel.php"); // Redireciona para a página principal ou painel do usuário
    exit();
} else {
    echo "Método de requisição não permitido.";
}
?>
