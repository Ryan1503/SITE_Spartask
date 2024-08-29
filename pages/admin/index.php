<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Spartask Admin - Dashboard</title>
    <!-- Bootstrap 4.1 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../assets/css/admin.css" rel="stylesheet">
</head>
<body>

<button class="spartask-toggle-btn btn btn-primary">
    <i class="fas fa-bars"></i>
</button>

<div class="spartask-sidebar d-flex flex-column p-3">
    <img src="../../assets/img/spartask_logo_semfundo.png" alt="logo" class="logo-adm">
<ul class="nav flex-column">
        <li class="nav-item">
            <a class="admin-link active" href="index.php">
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
            <a class="admin-link" href="config_banco.php">
                <i class="fas fa-database"></i>
                Configurações do Banco
            </a>
        </li>
        <li class="nav-item">
            <a class="admin-link" href="config_banco.php">
            <i class="fa-solid fa-triangle-exclamation"></i>
              Deúncias
            </a>
        </li>
        <li class="nav-item">
            <a class="admin-link" href="config_banco.php">
            <i class="fa-solid fa-tents"></i>
                          Testes
            </a>
        </li>
        <li class="nav-item">
            <a class="admin-link" href="#">
                <i class="fas fa-sign-out-alt"></i>
                Sair
            </a>
        </li>
    </ul>
    <!-- Informações do usuário -->
    <div class="user-info mt-auto">
        <a class="admin-link" href="perfil.php">
            <i class="fas fa-user"></i>
            <span>Ryan de Oliveira</span>
        </a>
    </div>
</div>

<div class="spartask-content">
    <h1>Bem-vindo ao Spartask Admin - Dashboard</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Usuários</div>
                <div class="card-body">
                    <h5 class="card-title">500 Usuários Ativos</h5>
                    <p class="card-text">Visualize e gerencie todos os usuários registrados.</p>
                    <a href="users.php" class="btn btn-light">Gerenciar Usuários</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Banco de Dados</div>
                <div class="card-body">
                    <h5 class="card-title">Backup e Restauração</h5>
                    <p class="card-text">Configure backups automáticos e restaure dados quando necessário.</p>
                    <a href="config_banco.php" class="btn btn-light">Configurar Banco</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Denuncias</div>
                <div class="card-body">
                    <h5 class="card-title">500 Usuários Ativos</h5>
                    <p class="card-text">Verifique as denuncias feitas a usuarios ou prestadores de serviços.</p>
                    <a href="users.php" class="btn btn-light">Gerenciar denuncias</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Banco de Dados</div>
                <div class="card-body">
                    <h5 class="card-title">Backup e Restauração</h5>
                    <p class="card-text">Configure backups automáticos e restaure dados quando necessário.</p>
                    <a href="config_banco.php" class="btn btn-light">Configurar Banco</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 4.1 JS, jQuery, and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/12a0142524.js" crossorigin="anonymous"></script>
<script src="../../assets/js/admin.js"></script>
</body>
</html>
