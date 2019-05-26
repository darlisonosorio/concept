<?php
require_once('../model/Produto.php');

require('../controller/salvar_na_sessao.php');

$list = Produto::listar('Oculos');
?>
<!DOCTYPE html>
<html>
<head>
  <?php require('componentes/head.php'); ?>
</head>
<body>

<!--navegação-->
<?php require('componentes/navbar.php'); ?>

<!--navegação-->
<?php require('componentes/categorias.php'); ?>

<!-- Produtos -->
<div class="container">
    <h3 class="text-center">Óculos</h3>
    <div class="row">
    <?php foreach($list as $item) { ?>
        <div class="col-md-3 col-sm-6">
            <div class="grid-produtos">
                <form action="oculos.php" method="POST">
                    <div class="img-produto">
                        <a href="#">
                            <img class="img-1" src="img/<?php echo $item->foto ?>">
                        </a>
                        <input style="display: none;" type="number" name="id" value="<?php echo $item->id ?>">
                        <input style="display: none;" type="text" name="nome" value="<?php echo $item->nome ?>">
                        <input style="display: none;" type="number" name="preco" value="<?php echo $item->preco ?>">
                        <input style="display: none;" type="text" name="foto" value="<?php echo $item->foto ?>">
                        <input style="display: none;" type="text" name="tipo" value="<?php echo $item->tipo ?>">
                        <button type="submit" class="add-carrinho">Adicionar ao carrinho</button>
                    </div>
                </form>
                <div class="produto-cont">
                    <h3 class="titulo"><a href="#"><?php echo $item->nome ?></a></h3>
                    <h3 class="titulo">Até 6x sem juros no cartão</h3>
                    <span class="preco">R$ <?php echo $item->preco ?></span>
                </div>
            </div>
        </div>

    <?php } ?>
    </div>
</div>

<!-- Rodapé -->
<?php require('componentes/rodape.php'); ?>

</body>
</html>
