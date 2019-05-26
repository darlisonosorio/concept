<?php

Class Compra {

  public $id;
  public $data;
  public $quantidade;
  public $produto;
  public $valor;

  public static function comprar($produto, $qtd) {
    $id = $_SESSION['id'];
    $valor = $produto->preco * $qtd;
    $sql = "INSERT INTO compra (usuario, produto, data, quantidade, valor)
                VALUES ($id, $produto->id, now(), $qtd, $valor);";
    $conn = new mysqli('localhost', 'root', '', 'loja');
    if ($conn->connect_error) {
      $result = array( false, "Falha de conexão: $conn->connect_error");
      return $result;
    }
    $res = $conn->query($sql);
  }

  public static function listar() {
    $id = $_SESSION['id'];
    $sql = "SELECT c.id AS cid, c.data AS cdata, 
                   c.quantidade AS qtd, p.id AS pid, 
                   p.nome AS nome, p.foto AS foto, 
                   p.tipo AS tipo, p.preco AS preco,
                   c.valor AS valor
            FROM compra AS c INNER JOIN produto AS p on p.id = c.produto 
            WHERE c.usuario = $id;";
    $conn = new mysqli('localhost', 'root', '', 'loja');

    if ($conn->connect_error) {
      $result = array( false, "Falha de conexão: $conn->connect_error");
      return $result;
    }
    
    $result = array();
    $res = $conn->query($sql);

    while ($row = $res->fetch_array()) {
      $item = new Compra;
      $item->id = $row['cid'];
      $item->data = $row['cdata'];
      $item->quantidade = $row['qtd'];
      $item->valor = $row['valor'];

      $prod = new Produto;
      $prod->id = $row['pid'];
      $prod->nome = $row['nome'];
      $prod->preco = $row['preco'];
      $prod->foto = $row['foto'];
      $prod->tipo = $row['tipo'];
      $item->produto = $prod;
      array_push($result, $item);
    }
    $conn->close();
    return $result;
  }

}

?>