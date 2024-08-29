<?php
try {
    require('config.php'); // Inclui o arquivo de configuração para a conexão com o banco de dados
} catch (\Throwable $e) {
    echo "O erro foi: " . $e->getMessage();
    die();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SparTask Admin - Usuários</title>
    <!-- Bootstrap 4.1 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../assets/css/admin.css" rel="stylesheet">
    <!-- Custom JS -->
    <script src="../../assets/js/admin.js" defer></script>
    <script src="../../assets/js/users.js"></script>

</head>
<body>

<!-- Botão Toggle para a Sidebar -->
<button class="spartask-toggle-btn btn btn-primary">
    <i class="fas fa-bars"></i>
</button>

<!-- Sidebar responsiva -->
<div class="spartask-sidebar d-flex flex-column p-3">
    <h4 class="text-white">SparTask Admin</h4>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="admin-link" href="index.php">
                <i class="fas fa-home"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="admin-link active" href="users.php">
                <i class="fas fa-users"></i> Usuários
            </a>
        </li>
        <li class="nav-item">
            <a class="admin-link" href="config_banco.php">
                <i class="fas fa-database"></i> Configurações do Banco
            </a>
        </li>
        <li class="nav-item">
            <a class="admin-link" href="#">
                <i class="fas fa-sign-out-alt"></i> Sair
            </a>
        </li>
    </ul>
    <div class="user-info mt-auto">
        <a class="admin-link" href="perfil.php">
            <i class="fas fa-user"></i> <span>Nome do Usuário</span>
        </a>
    </div>
</div>

<!-- Conteúdo Principal -->
<div class="spartask-content">
    <h1>Gerenciamento de Usuários</h1>
    <br>
    <button class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">Adicionar Novo Usuário</button>
    <br>

    <!-- Tabela Responsiva -->
    <div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th class="col-senha">Senha</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM usuarios";
            $result = $conexao->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['nome']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td class="col-senha"><?= $row['senha']; ?></td>
                        <td><?= $row['telefone']; ?></td>
                        <td><?= $row['endereco']; ?></td>
                        <td>
                            <button class="btn btn-sm btn-warning edit-btn"
                                    data-id="<?= $row['id']; ?>"
                                    data-nome="<?= $row['nome']; ?>"
                                    data-email="<?= $row['email']; ?>"
                                    data-senha="<?= $row['senha']; ?>"
                                    data-telefone="<?= $row['telefone']; ?>"
                                    data-endereco="<?= $row['endereco']; ?>"
                                    data-toggle="modal"
                                    data-target="#editUserModal">Editar</button>
                            <button class="btn btn-sm btn-danger delete-btn" data-id="<?= $row['id']; ?>">Excluir</button>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='7'>Nenhum registro encontrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</div>

<!-- Modal de Adicionar Novo Usuário -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Adicionar Novo Usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addUserForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="addNome">Nome</label>
                        <input type="text" class="form-control" id="addNome" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="addEmail">Email</label>
                        <input type="email" class="form-control" id="addEmail" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="addSenha">Senha</label>
                        <input type="password" class="form-control" id="addSenha" name="senha" required>
                    </div>
                    <div class="form-group">
                        <label for="addTelefone">Telefone</label>
                        <input type="text" class="form-control" id="addTelefone" name="telefone">
                    </div>
                    <div class="form-group">
                        <label for="addEndereco">Endereço</label>
                        <input type="text" class="form-control" id="addEndereco" name="endereco">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal de Editar Usuário -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Editar Usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editUserForm">
                <div class="modal-body">
                    <input type="hidden" id="editUserId" name="id">
                    <div class="form-group">
                        <label for="editNome">Nome</label>
                        <input type="text" class="form-control" id="editNome" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="editEmail">Email</label>
                        <input type="email" class="form-control" id="editEmail" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="editSenha">Senha</label>
                        <input type="password" class="form-control" id="editSenha" name="senha" required>
                    </div>
                    <div class="form-group">
                        <label for="editTelefone">Telefone</label>
                        <input type="text" class="form-control" id="editTelefone" name="telefone">
                    </div>
                    <div class="form-group">
                        <label for="editEndereco">Endereço</label>
                        <input type="text" class="form-control" id="editEndereco" name="endereco">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap 4.1 JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>
