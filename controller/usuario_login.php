<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (isset($_POST['email']) && isset($_POST['senha'])) {
  $email = $_POST['email'];
  $password = $_POST['senha'];
  $usuario = new Usuario;
  $usuario->email = $email;
  $usuario->senha = $password;

  $response = $usuario->logar();

  if ($response != null) {
    $_SESSION['id'] = $response['id'];
    $_SESSION['sexo'] = $response['sexo'];
    $_SESSION['email'] = $response['email'];
    $_SESSION['nome'] = $response['nome'];
    $_SESSION['cpf'] = $response['cpf'];
  }
}

if (isset($_SESSION['id'])) {
  header('Location:../index.php');
}

?>