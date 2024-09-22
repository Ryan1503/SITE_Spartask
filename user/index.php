<?php
include('includes/session_check.php');
include('includes/header.php');
include 'includes/sidebar.php';
?>


  <!-- Home -->
  <section class="home-section">
    <div class="text">Bem-vindo (a) <?= print_r($_SESSION['nome'], true) ?></div>

    <div class="container">

    </div>
  </section>



</body>

</html>