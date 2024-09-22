<?php
session_start();

if ($_SESSION['id'] > 0) {
} else {
  header('Location: ../public/index.php');
  exit();
}

?>