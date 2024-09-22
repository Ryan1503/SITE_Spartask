<?php
// Obtém o nome do arquivo atual, por exemplo, "index.php"
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<!-- Header -->

<div class="sidebar">
  <div class="logo-details">
    <img class="logo" src="../assets/img/spartask_logo_semfundo.png" alt="Logo SparTask">
    <div class="logo_name">SparTask</div>
    <i class='bx bx-menu' id="btn"></i>
  </div>
  <ul class="nav-list">
    <li class="<?php echo $currentPage == 'index.php' ? 'active' : ''; ?>">
      <a href="index.php">
        <i class='bx bx-grid-alt'></i>
        <span class="links_name">Dashboard</span>
      </a>
      <span class="tooltip">Dashboard</span>
    </li>
    <li class="<?php echo $currentPage == 'contratar.php' ? 'active' : ''; ?>">
      <a href="contratar.php">
        <i class='fa-solid fa-clipboard'></i>
        <span class="links_name">Contratar</span>
      </a>
      <span class="tooltip">Contratar</span>
    </li>
    <li class="<?php echo $currentPage == 'chat.php' ? 'active' : ''; ?>">
      <a href="chat.php">
        <i class='bx bx-chat'></i>
        <span class="links_name">Mensagens</span>
      </a>
      <span class="tooltip">Mensagens</span>
    </li>
    <li class="<?php echo $currentPage == 'analise.php' ? 'active' : ''; ?>">
      <a href="analise.php">
        <i class='bx bx-pie-chart-alt-2'></i>
        <span class="links_name">Análise</span>
      </a>
      <span class="tooltip">Análise</span>
    </li>
    <li class="<?php echo $currentPage == 'favoritos.php' ? 'active' : ''; ?>">
      <a href="favoritos.php">
        <i class='bx bx-heart'></i>
        <span class="links_name">Favoritos</span>
      </a>
      <span class="tooltip">Favoritos</span>
    </li>
    <li class="<?php echo $currentPage == 'blog.php' ? 'active' : ''; ?>">
      <a href="blog.php">
        <i class='fa-solid fa-blog'></i>
        <span class="links_name">Blog</span>
      </a>
      <span class="tooltip">Blog</span>
    </li>
    <li class="<?php echo $currentPage == 'configuracoes.php' ? 'active' : ''; ?>">
      <a href="configuracoes.php">
        <i class='bx bx-cog'></i>
        <span class="links_name">Configurações</span>
      </a>
      <span class="tooltip">Configurações</span>
    </li>
    <li class="profile">
      <div class="profile-details">
        <i class='bx bx-user'></i>
        <div class="name_job">
          <div class="name"><?= htmlspecialchars($_SESSION['nome'], ENT_QUOTES, 'UTF-8'); ?></div>
          <div class="job"><?= print_r($_SESSION['email'], true); ?></div>
        </div>
      </div>
      <i class='bx bx-log-out' id="log_out"></i>
    </li>
  </ul>
</div>
