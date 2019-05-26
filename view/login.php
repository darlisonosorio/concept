<?php
require_once('../model/Usuario.php');
require_once('../model/Produto.php');

$email = NULL;
$password = NULL;

require('../controller/usuario_login.php');

$modalTitle = $email == NULL ? NULL : 'Falha no login';
$modalMessage = 'Usuário ou senha incorretos';

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
  <?php require('componentes/head.php'); ?>
</head>
<body>

<!--mensagem de erro -->
<?php require('componentes/modal.php'); ?>

<!--navegação-->
<?php require('componentes/navbar.php'); ?>

<!--Header-->
<div class="full-page container">
  <div class="container">
    <h3 class="text-center">Login</h3>
    <div class="row">
      <div class="col-md-4 col-lg-4 col-xs-12">
      </div>
      <div class="col-md-4 col-lg-4 col-xs-12">
        <form method="POST">
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" required name="email" class="form-control" id="email"  value="<?php echo $email ?>" placeholder="seuemail@email.com">
          </div>
          <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" required name="senha" class="form-control" id="senha" value="<?php echo $password ?>" placeholder="Senha">
          </div>
          <a href="#">Esqueceu seu e-mail?</a>
          <a href="#">Esqueceu sua senha?</a>
          <button type="submit" id="btnEntrar" class="btn btn-primary">Entrar</button>
          <a href="signup.php" class="btn btn-default">Quero me cadastrar</a>
        </form>
      </div>
      <div class="col-md-4 col-lg-4 col-xs-12">
      </div>  
    </div>
  </div>
</div>

<!-- Rodapé -->
<?php require('componentes/rodape.php'); ?>

</body>
</html>
