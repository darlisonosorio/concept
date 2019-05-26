<?php

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

session_unset();

echo "<script>window.location.href = 'http://" . $_SERVER['HTTP_HOST'] . "/concept/index.php'; </script>";

?>