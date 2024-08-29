<?php

// Pego do manual: https://www.php.net/manual/en/function.require.php
try {
    require('config.php');
} catch (\Throwable $e) {
    echo "O erro foi: " . $e->getMessage();

    die();
}

?>