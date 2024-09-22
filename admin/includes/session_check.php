<?php
try {
  require('../config.php'); // Inclui o arquivo de configuração para a conexão com o banco de dados
} catch (\Throwable $e) {
  echo "O erro foi: " . $e->getMessage();
  die();
}

session_start();
if ($_SESSION['email'] == 'ryanocbomfim@gmail.com') {
  if ($_SESSION['id'] <= 0) {
    header('Location: ../home-sem-login.php');
    exit();
  }
} else {
  header('Location: ../home-sem-login.php');
  exit();
}
?>
