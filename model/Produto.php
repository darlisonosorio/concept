<?php

Class Produto {

  public $id;
  public $nome;
  public $preco;
  public $foto;
  public $tipo;

  // funçoes estáticas

  public static function listarDestaques() {
    $sql = Produto::getSql("SELECT * FROM produto WHERE destaque = 1;");
    return Produto::listarSql($sql);
  }

  public static function listar($tipo, $search = null) {
    $sql = Produto::getSql("SELECT * FROM produto WHERE tipo = '$tipo';");
    return Produto::listarSql($sql);
  }

  private static function getSql($sql) {
    $result = $sql;
    if (isset($_GET['search']) && $_GET['search']) {
      $search = $_GET['search'];
      $result = "SELECT * FROM produto WHERE nome LIKE '%$search%'";
    }
    return $result;
  }

  private static function listarSql($sql) {
    $conn = new mysqli('localhost', 'root', '', 'loja');
    if ($conn->connect_error) {
      $result = array( false, "Falha de conexão: $conn->connect_error");
      return $result;
    }
    
    $result = array();
    $res = $conn->query($sql);

    if ($res) {
      while ($row = $res->fetch_array()) {
        $item = new Produto;
        $item->id = $row['id'];
        $item->nome = $row['nome'];
        $item->preco = $row['preco'];
        $item->foto = $row['foto'];
        $item->tipo = $row['tipo'];
        array_push($result, $item);
      }
    }
    $conn->close();
    return $result;
  }

}

?>