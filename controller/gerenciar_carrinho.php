<?php

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (!isset($_SESSION['produtos'])) {
  $_SESSION['produtos'] = array();
}

$isLogged = isset($_SESSION['id']);

//     REMOVE UM PRODUTO DO CARRINHO
if (isset($_POST['remove'])) {
  $pos = $_POST['remove'];
  $produtos = $_SESSION['produtos'];

  if( isset($produtos[$pos])) {
    unset($produtos[$pos]);
  }
  $_SESSION["produtos"] = $produtos;
  $modalTitle = 'Produto Removido.';
  $modalMessage = '';
}

//     REALIZA A COMPRA DE UM PRODUTO ESPECÍFICO DO CARRINHO
if (isset($_POST['compra']) && $isLogged) {
  $pos = $_POST['compra'];
  $qtd = $_POST['qtd'];
  $produtos = $_SESSION['produtos'];
  $produto = null;

  if( isset($produtos[$pos])) {
    $produto = $produtos[$pos];
    unset($produtos[$pos]);
    Compra::comprar($produto, $qtd);
  }
  $_SESSION["produtos"] = $produtos;

  $modalTitle = 'Compra realizada.';
  $modalMessage = '';
}

//     REALIZA A COMPRA DE TODOS OS PRODUTOS DO CARRINHO
if (isset($_POST['todos']) && $isLogged) {
  $produtos = $_SESSION['produtos'];
  foreach($produtos as $key => $produto) {
    $qtd = $_POST['qtd-'. $produto->id];
    unset($produtos[$key]);
    Compra::comprar($produto, $qtd);
  }
  $_SESSION["produtos"] = $produtos;
  $modalTitle = 'Compra realizada.';
  $modalMessage = 'O carrinho foi comprado com sucesso.';
}

?>