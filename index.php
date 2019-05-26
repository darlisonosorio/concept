<?php
require_once('model/Produto.php');

require('controller/salvar_na_sessao.php');
$list = Produto::listarDestaques();

$modalTitle = isset($_POST['id']) ? NULL : 'Seja Bem-Vindo!';
$modalMessage = '';

?>
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/png" href="view/img/concept.png"/>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Conceito | Moda Feminina Online </title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/grid.css">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/popper.min.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
</head>

<body>
<!-- Bem-vindo-->
<?php require('view/componentes/modal.php'); ?>

<!--navegação-->
<?php require('view/componentes/navbar.php'); ?>

<!--navegação-->
<?php require('view/componentes/categorias.php'); ?>

<!--Header-->
<div class="container">
  <div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="view/img/bg2.jpg" class="img-fluid">
        <div class="carousel-caption">
          <h5 class="texto">50% de desconto em produtos de cabelo!</h5>
          <p class="texto">Aproveite até amanhã!</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="view/img/bg1.jpg" class="img-fluid">
        <div class="carousel-caption">
          <h5 class="texto">Ganhe 15$ de volta</h5>
          <p class="texto">Após finalizar a sua primeira compra!</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="view/img/bg3.jpg" class="img-fluid">
        <div class="carousel-caption">
          <h5 class="texto">FRETE GRÁTIS!</h5>
          <p class="texto">Confira as regras.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
  <br/><br/>

<!-- Produtos -->
<div class="container">
    <h3 class="text-center">Destaques</h3>
    <div class="row">

    <?php foreach($list as $item) { ?>
      <div class="col-md-3 col-sm-6">
        <div class="grid-produtos">
          <form action="index.php" method="POST">
            <div class="img-produto">
              <a href="#">
                  <img class="img-1" src="view/img/<?php echo $item->foto ?>">
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
            <span class="preco">R$ <?php echo number_format((float) $item->preco, 2, ',', ''); ?></span>
          </div>
        </div>
      </div>
    <?php } ?>

    </div>
</div>

<!-- Rodapé -->
<?php require('view/componentes/rodape.php'); ?>

</body>
</html>
