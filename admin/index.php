<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>


  <!-- Home -->
  <section class="home-section">
    <div class="text">Bem-vindo ao Spartask Admin - Dashboard</div>

    <div class="container">
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
  </section>


<?php include('includes/footer.php'); ?>