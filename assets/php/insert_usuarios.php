<?php
include 'config.php'; // Inclui o arquivo de configuração para a conexão com o banco de dados

// Função para sanitizar dados de entrada
function sanitizeInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Verifica se os dados foram enviados pelo método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitiza e valida os dados recebidos
    $nome = sanitizeInput($_POST['nome']);
    $email = filter_var(sanitizeInput($_POST['email']), FILTER_VALIDATE_EMAIL);
    $telefone = sanitizeInput($_POST['telefone']);
    $endereco = sanitizeInput($_POST['endereco']);
    $senha = sanitizeInput($_POST['senha']);

    // Verifica se o email é válido
    if (!$email) {
        echo "Email inválido.";
        exit();
    }

    // Criptografa a senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Verifica se o email já está registrado
    $stmt = $conexao->prepare("SELECT email FROM usuarios WHERE email = ?");

    if ($stmt === false) {
        echo "Erro na preparação da consulta: " . $conexao->error;
        exit();
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "O email já está registrado.";
        $stmt->close();
        $conexao->close();
        exit();
    }

    // Prepara a consulta SQL para inserir o usuário
    $stmt = $conexao->prepare("INSERT INTO usuarios (email, telefone, endereco, senha, nome) VALUES (?, ?, ?, ?, ?)");

    if ($stmt === false) {
        echo "Erro na preparação da consulta: " . $conexao->error;
        exit();
    }

    // Faz o bind dos parâmetros
    $stmt->bind_param("sssss", $email, $telefone, $endereco, $senha_hash, $nome);

    // Executa a consulta
    if ($stmt->execute()) {
        // Inicia a sessão e faz login do usuário
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $conexao->insert_id; // Recupera o ID do usuário inserido
        $_SESSION['email'] = $email;

        echo "Usuário cadastrado e logado com sucesso!";
        header('Location: index.html');
    } else {
        echo "Erro: " . $stmt->error;
    }

    // Fecha a declaração e a conexão
    $stmt->close();
    $conexao->close();
} else {
    echo "Método de requisição não permitido.";
}
?>
