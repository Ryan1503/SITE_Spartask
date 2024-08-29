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

// Se o usuário não estiver autenticado, exiba a modal
if (!isset($_SESSION['autorizado']) || $_SESSION['autorizado'] !== true):
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Spartask Admin - Configurações do Banco</title>
    <!-- Bootstrap 4.1 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../assets/css/admin.css" rel="stylesheet">
    <style>
        .modal-backdrop {
            z-index: 1040 !important;
        }
        .modal {
            z-index: 1050 !important;
        }
    </style>
</head>
<body>
<!-- Modal de Autenticação -->
<div class="modal fade show" id="authModal" tabindex="-1" role="dialog" style="display: block; padding-right: 15px;" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="authModalLabel">Autenticação Requerida</h5>
            </div>
            <div class="modal-body">
                <?php if (isset($mensagem)): ?>
                    <div class="alert alert-danger"><?php echo $mensagem; ?></div>
                <?php endif; ?>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="senha">Digite a Senha:</label>
                        <input type="password" class="form-control" id="senha" name="senha" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>
<?php
exit();
endif;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Spartask Admin - Configurações do Banco</title>
    <!-- Bootstrap 4.1 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../assets/css/admin.css" rel="stylesheet">
</head>
<body>
<!-- Conteúdo da página -->
<button class="spartask-toggle-btn btn btn-primary">
    <i class="fas fa-bars"></i>
</button>

<div class="spartask-sidebar d-flex flex-column p-3">
    <h4 class="text-white">Spartask Admin</h4>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="admin-link" href="index.php">
                <i class="fas fa-home"></i>
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="admin-link" href="users.php">
                <i class="fas fa-users"></i>
                Usuários
            </a>
        </li>
        <li class="nav-item">
            <a class="admin-link active" href="banco.php">
                <i class="fas fa-database"></i>
                Configurações do Banco
            </a>
        </li>
        <li class="nav-item">
            <a class="admin-link" href="#">
                <i class="fas fa-sign-out-alt"></i>
                Sair
            </a>
        </li>
    </ul>
</div>

<div class="spartask-content">
    <h1>Configurações do Banco de Dados</h1>
    <div class="card mb-4">
        <div class="card-header">
            Backup e Restauração
        </div>
        <div class="card-body">
            <button class="btn btn-success">Criar Backup</button>
            <button class="btn btn-danger">Restaurar Backup</button>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            Configurações Avançadas
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="db-host">Host do Banco de Dados</label>
                    <input type="text" class="form-control" id="db-host" placeholder="Insira o host do banco de dados">
                </div>
                <div class="form-group">
                    <label for="db-name">Nome do Banco de Dados</label>
                    <input type="text" class="form-control" id="db-name" placeholder="Insira o nome do banco de dados">
                </div>
                <div class="form-group">
                    <label for="db-user">Usuário do Banco de Dados</label>
                    <input type="text" class="form-control" id="db-user" placeholder="Insira o usuário do banco de dados">
                </div>
                <div class="form-group">
                    <label for="db-password">Senha do Banco de Dados</label>
                    <input type="password" class="form-control" id="db-password" placeholder="Insira a senha do banco de dados">
                </div>
                <button type="submit" class="btn btn-primary">Salvar Configurações</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="../../assets/js/admin.js" defer></script>
</body>
</html>
