<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email inválido.";
        exit();
    }

    $verificaEmail = "SELECT email FROM usuarios WHERE email = '$email'";
    $resultado = $conexao->query($verificaEmail);

    if ($resultado && $resultado->num_rows > 0) {
        echo "O email já está registrado.";
        $conexao->close();
        exit();
    }

    $sql = "INSERT INTO usuarios (id, nome, email, telefone, senha)
            VALUES (NULL, '$nome', '$email', '$telefone', '$senha')";

    if ($conexao->query($sql) === TRUE) {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $conexao->insert_id;


        echo "Usuário cadastrado e logado com sucesso!";
        echo "<div class='modal-footer'>
                <a href='login.html' class='btn btn-primary'>Logue aqui</a>
              </div>";
    } else {
        echo "Erro ao cadastrar o usuário: " . $conexao->error;
    }

    $conexao->close();
} else {
    echo "Método de requisição não permitido.";
}
?>
