<?php
try {
  require('config.php'); // Inclui o arquivo de configuração para a conexão com o banco de dados
} catch (\Throwable $e) {
  echo "O erro foi: " . $e->getMessage();
  die();
}

session_start();
if ($_SESSION['email'] == 'ryanocbomfim@gmail.com') {

  if ($_SESSION['id'] > 0) {
  } else {
    header('Location: ../../home-sem-login.php');
    exit();
  }

} else {
  header('Location: ../../home-sem-login.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users - SparTask</title>

  <!-- Bootstrap do Ryan -->
  <link rel="stylesheet" href="https://spartoi.vercel.app/assets/css/style.css">
  <script src="https://spartoi.vercel.app/assets/js/script.js" defer></script>

  <!-- Estilo do site -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <script src="../../assets/js/login_modal.js" defer></script>

  <!-- Bootstrap 4.1 CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/12a0142524.js" crossorigin="anonymous"></script>

  <!-- Unicons CSS -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../../assets/css/style.css">

  <!-- V-Libras -->
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>

  <!-- Favicon -->
  <link rel="shortcut icon" href="../../assets/img/spartask_logo_semfundo.png" type="image/x-icon">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <!-- Popper.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>

  <!-- Bootstrap 4.1 JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>

  <!-- Custom CSS -->
  <link href="../../assets/css/admin.css" rel="stylesheet">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/12a0142524.js" crossorigin="anonymous"></script>
  <!-- Custom JS -->
  <script src="../../assets/js/admin.js" defer></script>
  <script src="../../assets/js/sair.js" defer></script>
  <script src="../../assets/js/users.js" defer></script>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>
<!-- Modal de Adicionar Novo Usuário -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel"
  aria-hidden="true">
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
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel"
  aria-hidden="true">
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

<body>
  <!-- V-Libras -->
  <div vw class="enabled bg-transparente" id="vlibras-container">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>

  <!-- Header -->


  <div class="sidebar">
    <div class="logo-details">
      <img class="bx bxl-c-plus-plus icon logo" src="../../assets/img/spartask_logo_semfundo.png" alt="Logo SparTask">
      <div class="logo_name">SparTask</div>
      <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="index.php">
          <i class='bx bx-grid-alt '></i>
          <span class="links_name ">Dashboard</span>
        </a>
        <span class="tooltip">Dashboard</span>
      </li>
      <li class="active">
        <a href="users.php">
          <i class='bx bx-user'></i>
          <span class="links_name">User</span>
        </a>
        <span class="tooltip">User</span>
      </li>

      <li>
        <a href="#">
          <i class='bx bx-cog'></i>
          <span class="links_name">Setting</span>
        </a>
        <span class="tooltip">Setting</span>
      </li>
      <li class="profile">
        <div class="profile-details">
          <img src="profile.jpg" alt="profileImg">
          <div class="name_job">
            <div class="name"><?= print_r($_SESSION['nome'], true); ?></div>
            <div class="job">Administrador</div>
          </div>
        </div>
        <i class='bx bx-log-out ' id="log_out"></i>
      </li>
    </ul>
  </div>
  <!-- Home -->
  <section class="home-section">

    <h1 class="texto">Gerenciamento de Usuários</h1>
    <br>
    <div class="container">

      <button class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">Adicionar Novo Usuário</button>
      <br><br>



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
                    <button class="btn btn-sm btn-warning edit-btn" data-id="<?= $row['id']; ?>"
                      data-nome="<?= $row['nome']; ?>" data-email="<?= $row['email']; ?>" data-senha="<?= $row['senha']; ?>"
                      data-telefone="<?= $row['telefone']; ?>" data-endereco="<?= $row['endereco']; ?>" data-toggle="modal"
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

  </section>


</body>

</html>