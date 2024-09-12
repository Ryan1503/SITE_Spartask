<?php
session_start();

if ($_SESSION['id'] > 0) {
} else {
  header('Location: home-sem-login.php');
  exit();
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home - SparTask</title>

  <!-- Bootstrap do Ryan -->
  <link rel="stylesheet" href="https://spartoi.vercel.app/assets/css/style.css">
  <script src="https://spartoi.vercel.app/assets/js/script.js" defer></script>

  <!-- Estilo do site -->
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="assets/js/login_modal.js" defer></script>

  <!-- Bootstrap 4.1 CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/12a0142524.js" crossorigin="anonymous"></script>

  <!-- Unicons CSS -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css">

  <!-- V-Libras -->
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/img/spartask_logo_semfundo.png" type="image/x-icon">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>

  <!-- Popper.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>

  <!-- Bootstrap 4.1 JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>

  <!-- Custom CSS -->
  <link href="assets/css/admin.css" rel="stylesheet">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

  <!-- Bootstrap 4.1 JS, jQuery, and Popper.js -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/12a0142524.js" crossorigin="anonymous"></script>
  <!-- Custom JS -->
  <script src="assets/js/admin.js" defer></script>
  <script src="assets/js/sair_normal.js" defer></script>
  <!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

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
      <img class=" logo" src="assets/img/spartask_logo_semfundo.png" alt="Logo SparTask">
      <div class="logo_name">SparTask</div>
      <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">
      <li class="active">
        <a href="#">
          <i class='bx bx-grid-alt '></i>
          <span class="links_name ">Dashboard</span>
        </a>
        <span class="tooltip">Dashboard</span>
      </li>
      <li>
        <a href="#">
          <i class='fa-solid fa-clipboard'></i>
          <span class="links_name">Contratar</span>
        </a>
        <span class="tooltip">Contratar</span>
      </li>

      <li>
        <a href="#">
          <i class='bx bx-chat'></i>
          <span class="links_name">Mensagens</span>
        </a>
        <span class="tooltip">Mensagens</span>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-pie-chart-alt-2'></i>
          <span class="links_name">Análise</span>
        </a>
        <span class="tooltip">Análise</span>
      </li>


      <li>
        <a href="#">
          <i class='bx bx-heart'></i>
          <span class="links_name">Favoritos</span>
        </a>
        <span class="tooltip">Favoritos</span>
      </li>
      <li>
        <a href="blog.php">
          <i class='fa-solid fa-blog'></i>
          <span class="links_name">Blog</span>
        </a>
        <span class="tooltip">Blog</span>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-cog'></i>
          <span class="links_name">Configurações</span>
        </a>
        <span class="tooltip">Configurações</span>
      </li>
      <li class="profile">
        <div class="profile-details">
          <i class='bx bx-user'></i>
          <div class="name_job">
            <div class="name"><?= print_r($_SESSION['nome'], true); ?></div>
            <div class="job">Web designer</div>
          </div>
        </div>
        <i class='bx bx-log-out ' id="log_out"></i>
      </li>
    </ul>
  </div>
  <!-- Home -->
  <section class="home-section">
    <div class="text">Bem-vindo (a) <?= print_r($_SESSION['nome'], true) ?></div>

    <div class="container">

    </div>
  </section>



</body>

</html>