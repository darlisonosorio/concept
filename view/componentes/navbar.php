<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
$dir = "http://" . $_SERVER['HTTP_HOST'] . "/concept";

if (!isset($_SESSION['produtos'])) {
  $_SESSION['produtos'] = array();
}

$count = sizeof($_SESSION["produtos"]);
$preco = 0.0;
foreach($_SESSION["produtos"] as $produto) {
  $preco += $produto->preco;
}
?>

<nav class="upper navbar navbar-expand-lg navbar-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup, #navbarNavAltMarkup1" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand text-secondary" href="<?php echo $dir ?>/index.php"><img src="<?php echo $dir ?>/view/img/concept.png" width="30" class="navbar-brand">Concept</a>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav mr-auto">
          <a class="nav-item nav-link text-secondary" href="<?php echo $dir ?>/index.php">Início <span class="sr-only">(current)</span></a>
          <?php if (isset($_SESSION['id'])) { ?> <a class="nav-item nav-link text-secondary" href="<?php echo $dir ?>/view/meuspedidos.php">Meus Pedidos</a> <?php } ?>
          <div class="nav-item dropdown">
          <a class="nav-item nav-link text-secondary" href="#rodape" id="navbarDropdownMenuLink">Contato</a>
          </div>
      </div>
      <div class="navbar-nav ml-auto">
        <a class="nav-item nav-link text-secondary cart-item" href="<?php echo $dir ?>/view/carrinho.php">
          R$<span id="cart-preco"><?php echo number_format((float) $preco, 2, ',', ''); ?></span>
          <img src="<?php echo $dir ?>/view/img/shopping-cart.png" class="nav-item" width="30">
<?php if ($count > 0) { ?> <span id="cart-count"><?php echo $count ?></span> <?php } ?>
        </a>
          <?php if (isset($_SESSION['id'])) { ?>

            <div class="nav-item nav-link text-secondary" href="#">
              <img src="<?php echo $dir ?>/view/img/profile.png" class="nav-item profile-image" width="30">
              <?php echo $_SESSION['nome']; ?>
              <a class="text-secondary" href="<?php echo $dir ?>/controller/usuario_logout.php">Sair</a>
            </div>
          
          <?php } else { ?>

            <a class="nav-item nav-link text-secondary" href="<?php echo $dir ?>/view/login.php">
              <img src="<?php echo $dir ?>/view/img/profile.png" class="nav-item profile-image" width="30">  Entre ou cadastre-se
            </a>

          <?php } ?>
      </div>
  </div>
</nav>