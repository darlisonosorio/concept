<?php

if (isset($_POST['nome'])) {
  
  $nome = $_POST['nome'];
  $cpf = $_POST['cpf'];
  $sexo = $_POST['sexo'];
  $email = $_POST['email'];

  $usuario = new Usuario;
  $usuario->nome = $nome;
  $usuario->sexo = $sexo;
  $usuario->email = $email;
  $usuario->cpf = $cpf;
  $usuario->senha = $_POST['senha'];

  $response = $usuario->salvar();

  if ($response[0]) {
    $modalTitle = 'Cadastro realizado';
  } else {
    $modalTitle = 'Falha no cadastro';
    $modalMessage = 'Email ou CPF já cadastrados no sistema';
  }
}
?>