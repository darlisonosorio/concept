<?php
require_once('../model/Produto.php');

require('../controller/salvar_na_sessao.php');

$list = Produto::listar('Camisa');

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
    <h3 class="text-center">Blusas e Camisetas</h3>
    <div class="row">
        <?php foreach($list as $item) { ?>

            <div class="col-md-3 col-sm-6">
              <div class="grid-produtos">
                    
                <form action="blusasecamisetas.php" method="POST">
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

<footer class="mainfooter" role="contentinfo">
  <div class="footer-middle">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <!--Column1-->
        <!--<div class="footer-pad">
          <h4>semideia0</h4>
          <ul class="list-unstyled">
            <li><a href="#"></a></li>
            <li><a href="#">1111</a></li>
            <li><a href="#">22222</a></li>
            <li><a href="#">3333</a></li>
          </ul>
        </div> -->
      </div>
      <div class="col-md-3 col-sm-6">
        <!--Column1-->
        <div class="footer-pad">
          <h4>Atendimento</h4>
          <ul class="list-unstyled">
            <li><a href="#">Como Comprar</a></li>
            <li><a href="#">Fale Conosco</a></li>
            <li><a href="#">FAQ</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <!--Column1-->
        <!--<div class="footer-pad">
          <h4>semideia</h4>
          <ul class="list-unstyled">
            <li><a href="#">aaaaaaaa</a></li>
            <li><a href="#">bbbb</a></li>
            <li><a href="#">cccc</a></li>
            <li>
              <a href="#"></a>
            </li>
          </ul>
        </div> -->
      </div>
    	<div class="col-md-3">
    		<h4>Sigam-nos</h4>
            <ul class="list-unstyled">
              <li><a href="https://wwww.facebook.com"><img src="img/concept.png" width="20">Facebook</a></li>
              <li><a href="https://wwww.facebook.com"><img src="img/concept.png" width="20">Linkedin</a></li>
            </ul>
		</div>
    </div>
	<div class="row">
		<div class="col-md-12 copy">
			<p class="text-center">&copy; Copyright 2019 - Concept.  Todos os direitos reservados.</p>
		</div>
	</div>

</body>
</html>
