<?php

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (!isset($_SESSION['produtos'])) {
  $_SESSION['produtos'] = array();
}

if(isset($_POST['id']) ) {
  $produto = new Produto;
  $produto->id = $_POST['id'];
  $produto->nome = $_POST['nome'];
  $produto->foto = $_POST['foto'];
  $produto->preco = $_POST['preco'];
  $produto->tipo = $_POST['tipo'];
  array_push($_SESSION['produtos'], $produto);
}

?>