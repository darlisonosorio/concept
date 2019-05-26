<?php

include('../model/Produto.php');
include('../model/Compra.php');

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

$compras = Compra::listar();

?>

<!DOCTYPE html>
<html>
<head>
  <?php require('componentes/head.php'); ?>
</head>
<body>

<!-- navegação-->
<?php require('componentes/navbar.php'); ?>

<!-- Lista de Pedidos -->
<div class="full-page container">
  <h3 class="text-center cart-title">Minhas Compras</h3>

  <h3>Produtos</h3>  
  <table class="table cart-table">
    <thead>
      <tr>
        <th scope="col">Foto</th>
        <th scope="col">Nome</th>
        <th scope="col">Quantidade</th>
        <th class="data-compra" scope="col">Valor da Compra</th>
        <th class="data-compra" scope="col">Data da Compra</th>
      </tr>
    </thead>
    <tbody id="cart-list" class="cart-list">

      <?php foreach($compras as $key => $compra) { ?>
          <tr scope="row">
            <td><img id="cart-item-base-img" class="img-produto" src="img/<?php echo $compra->produto->foto ?>"></td>
            <td>
              <div class="row-item row">
                <h3 id="cart-item-base-titulo" class="titulo"><?php echo $compra->produto->nome ?></h3>
              </div>
            </td>
            <td>
              <div class="row-item row">
                <span id="cart-item-base-preco" class="preco"><?php echo $compra->quantidade ?></span>
              </div>
            </td>
            <td>
              <div class="row-item row">
                <span id="cart-item-base-preco" class="preco">R$ <?php echo number_format((float) $compra->valor, 2, ',', ''); ?></span>
              </div>
            </td>
            <td>
              <div class="row-item row">
                <span id="cart-item-base-preco" class="preco"><?php echo $compra->data ?></span>
              </div>
            </td>
          </tr>
      <?php } ?>

    </tbody>
  </table>
</div>

<!-- Rodapé -->
<?php require('componentes/rodape.php'); ?>

</body>
</html>
