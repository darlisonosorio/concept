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

<form action="/pagina-processa-dados-do-form" method="post">
  <div class="center">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" />
  </div>
  <div class="center">
    <label for="preco">Preço :</label>
    <input type="preco" id="preco" />
  </div>
  <div class="center">
  <select name="select">
      <option disabled selected value> Categorias: </option>
      <option value="valor1">Blusas e Camisas</option> 
      <option value="valor2">Calças e Shorts</option>
      <option value="valor3">Casacos e Jaquetas</option>
      <option value="valor4">Saias e Vestidos</option>
      <option value="valor5">Calçados</option>
      <option value="valor6">Bolsas</option>
      <option value="valor7">Relógios</option>
      <option value="valor8">Óculos</option>
      <option value="valor9">Maquiagem</option>
    </select>
  </div>
  <br>
  <div class="button center">
    <input type="file" id="imagem" name="imagem" accept="image/png, image/jpeg"> <br><br>
    <button type="submit" class="btn-primary">CADASTRAR</button>
  </div>
</form>

<!-- Rodapé -->
<?php require('componentes/rodape.php'); ?>

</body>
</html>