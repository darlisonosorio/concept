<?php
global $dbServidor;
global $dbUsername;
global $dbSenha;
global $dbNome;
$dbServidor = 'localhost';
$dbUsername = 'root';
$dbSenha = '';
$dbNome = 'loja';

Class Usuario {

  public $nome;
  public $sexo;
  public $email;
  public $senha;
  public $cpf;

  public function salvar() {
    $sql = "INSERT INTO usuario (nome, sexo, email, senha, cpf) VALUES ('$this->nome', '$this->sexo', '$this->email', '$this->senha', '$this->cpf');";
    $result = array( true, '' );

    $conn = new mysqli('localhost', 'root', '', 'loja');
    if ($conn->connect_error) {
      $result = array( false, "Falha de conexão: $conn->connect_error");
      return $result;
    }

    if ($conn->query($sql) === TRUE) {
      $result =  array( true, "Usuário cadastrado com sucesso.");
    } else {
      $result = array( false, "Dados inválidos do usuário.");
    }
    $conn->close();
    return $result;
  }

  public function logar() {
    $sql = "SELECT * FROM usuario WHERE email = '$this->email' AND senha = '$this->senha';";
    $conn = new mysqli('localhost', 'root', '', 'loja');
    if ($conn->connect_error) {
      $result = array( false, "Falha de conexão: $conn->connect_error");
      return $result;
    }
    
    $res = $conn->query($sql);

    if($res->num_rows > 0) {
      $res->data_seek(0);
      $row = $res->fetch_assoc();
      $conn->close();
      return $row;
    } else {
      $conn->close();
      return null;
    }
  }

}
?>