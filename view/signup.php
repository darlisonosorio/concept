<?php
require_once('../model/Produto.php');
include('../model/Usuario.php');

$nome = NULL;
$cpf = NULL;
$sexo = NULL;
$email = NULL;

$modalTitle = NULL;
$modalMessage = 'Cadastro realizado. Faca login para acessar o sistema.';

require("../controller/usuario_cadastro.php");

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
  
  <!-- Produtos -->
  <div class="container">
    <h3 class="text-center">Cadastrar-se</h3>
    <div class="row">
        <div class="col-md-4 col-lg-4 col-xs-12">
        </div>
        <div class="col-md-4 col-lg-4 col-xs-12">
            <form method="POST">              
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" maxlength="250" required class="form-control" value="<?php echo $nome ?>" name="nome" id="nome">
                </div>
                <div class="form-group">
                    <select id="sexo" class="browser-default custom-select" name="sexo" value="<?php echo $sexo ?>">
                        <option value="1">Masculino</option>
                        <option value="2">Feminino</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nome">Email</label>
                    <input type="email" name="email" required class="form-control" id="email" placeholder="" value="<?php echo $email ?>">
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" minlength="4" required class="form-control" name="senha" id="senha" onkeyup="check_senha()" placeholder="*********">
                </div>
                <div class="form-group">
                    <label for="senha-repeat">Repetir senha</label>
                    <input type="password" required class="form-control" name="confirma-senha" id="confirma-senha" onkeyup="check_senha()" placeholder="********">
                    <span id="password_warning" style="display: none; color: #ff0000;">Senha e confirmação de senha devem ser iguais.</span>
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" maxlength="11" required class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00" value="<?php echo $cpf ?>">
                </div>
                <button type="submit" id="btnCadastrar" class="btn btn-primary">Cadastrar-se</button>
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
