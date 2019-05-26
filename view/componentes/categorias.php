<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

$value = isset($_GET['search']) ? $_GET['search'] : "";
$dir = "http://" . $_SERVER['HTTP_HOST'] . "/concept";
?>

<!--navegação 2-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup1">
    <div class="navbar-nav mr-auto">
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Roupas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item text-secondary" href="<?php echo $dir ?>/view/blusasecamisetas.php">Blusas e Camisas</a>
          <a class="dropdown-item text-secondary" href="<?php echo $dir ?>/view/calcaseshorts.php">Calças e Shorts</a>
          <a class="dropdown-item text-secondary" href="<?php echo $dir ?>/view/casacosjaquetas.php">Casacos e Jaquetas</a>
          <a class="dropdown-item text-secondary" href="<?php echo $dir ?>/view/saiaevestido.php">Saias e Vestidos</a>
          <a class="dropdown-item text-secondary" href="<?php echo $dir ?>/view/calcados.php">Calçados</a>
        </div>
      </div>
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Acessórios
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item text-secondary" href="<?php echo $dir ?>/view/acessorios.php">Bolsas</a>
          <a class="dropdown-item text-secondary" href="<?php echo $dir ?>/view/relogios.php">Relógios</a>
          <a class="dropdown-item text-secondary" href="<?php echo $dir ?>/view/oculos.php">Óculos</a>
          <a class="dropdown-item text-secondary" href="<?php echo $dir ?>/view/batom.php">Maquiagem</a>
        </div>
      </div>
    </div>
      <div class="navbar-nav ml-auto">
        <form method="GET" class="form-inline my-2 my-lg-0">
          <input name="search" class="form-control mr-sm-2" value="<?php echo $value ?>" type="search" placeholder="O que você procura?" aria-label="Search">
          <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </div>
  </div>
</div>
</div>
</nav>
<!--Fim da navegação-->