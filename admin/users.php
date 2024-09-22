<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
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

<?php include('includes/footer.php'); ?>
