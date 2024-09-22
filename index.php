<?php
session_start();

if ($_SESSION['id'] > 0) {
    header('Location: user/index.php');
    exit();
} else {
    header('Location: /spartask/public/index.php');
    exit();
}
?>