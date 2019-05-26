<?php
require_once('../model/Produto.php');
require_once('../model/Compra.php');


$modalTitle = isset($_SESSION['id']) ? NULL : 'Login necessário';
$modalMessage = 'Faça login para finalizar a compra';

include('../controller/gerenciar_carrinho.php');

$count = sizeof($_SESSION["produtos"]);

?>

<!DOCTYPE html>
<html>
<head>
  <?php require('componentes/head.php'); ?>
</head>
<body>

<!-- mensagem -->
<?php require('componentes/modal.php'); ?>

<!--navegação-->
<?php require('componentes/navbar.php'); ?>

<!-- Lista de Pedidos -->
<div class="full-page container">
    <h3 class="text-center cart-title">Carrinho  
      <?php if ($count > 0) { ?>
        <form action="carrinho.php" method="POST">
          <input style="display: none;" type="number" name="todos" value="<?php echo $key ?>">
          <?php foreach($_SESSION['produtos'] as $key => $produto) { ?>
            <input style="display: none;" type="number" name="qtd-<?php echo $produto->id ?>" id="qtd-all-<?php echo $key ?>" value="1"/>
          <?php } ?>
          <button id="cart-buy-all" class="cart-item-button buy cart-buy">Comprar Tudo</button>
        </form>
      <?php } ?>
    </h3> 
  <h3>Produtos</h3>  
  <table class="table cart-table">
    <thead>
      <tr>
        <th scope="col">Foto</th>
        <th scope="col">Título</th>
        <th scope="col">Preço</th>
        <th scope="col">Quantidade</th>
        <th class="data-compra" scope="col">Ações</th>
      </tr>
    </thead>
    <tbody id="cart-list" class="cart-list">

      <?php foreach($_SESSION['produtos'] as $key => $produto) { ?>
          <tr scope="row">
            <td><img id="cart-item-base-img" class="img-produto" src="img/<?php echo $produto->foto ?>"></td>
            <td>
              <div class="row-item row">
                <h3 id="cart-item-base-titulo" class="titulo"><?php echo $produto->nome ?></h3>
              </div>
            </td>
            <td>
              <div class="row-item row">
                <span id="cart-item-base-preco" class="preco">R$ <?php echo number_format((float) $produto->preco, 2, ',', ''); ?></span>
              </div>
            </td>
            <td>
              <div class="row-item row">
                <input onkeyup="$('#qtd-base-<?php echo $key ?>, #qtd-<?php echo $key ?>, #qtd-all-<?php echo $key ?>').val($('#qtd-base-<?php echo $key ?>').val().replace(/[^\/\d]/g, ''));"
                  id="qtd-base-<?php echo $key ?>" type="number" name="remove" value="1">
              </div>
            </td>
            <td>
              <div class="row no-wrap row-item">
                <form method="POST" action="carrinho.php">
                  <input style="display: none;" type="number" name="remove" value="<?php echo $key ?>">
                  <button type="submit" id="cart-item-remove" class="cart-item-button remove">Remover</button>
                </form>
                <form method="POST" action="carrinho.php">
                  <input style="display: none;" type="number" name="compra" value="<?php echo $key ?>">
                  <input style="display: none;" type="number" name="qtd" id="qtd-<?php echo $key ?>" value="1"/>
                  <button type="submit" id="cart-item-buy" class="cart-item-button buy">Comprar</button>
                </form>
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
