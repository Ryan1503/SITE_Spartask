<?php
session_start();

// Senha pré-definida
$senha_correta = 'ryanlindo';

// Verifique se a senha foi enviada via POST
if (isset($_POST['senha'])) {
    $senha = $_POST['senha'];

    // Verifique a senha
    if ($senha === $senha_correta) {
        $_SESSION['autorizado'] = true;
        header('Location: config_banco.php'); // Redireciona para a página protegida
        exit();
    } else {
        $mensagem = 'Senha incorreta. Você não tem permissão para acessar esta página.';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Autenticação Requerida</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Autenticação Requerida</h1>
    <?php if (isset($mensagem)): ?>
        <div class="alert alert-danger"><?php echo $mensagem; ?></div>
    <?php endif; ?>
    <form method="post" action="verifica_permissao.php">
        <div class="form-group">
            <label for="senha">Digite a Senha:</label>
            <input type="password" class="form-control" id="senha" name="senha" required>
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>
