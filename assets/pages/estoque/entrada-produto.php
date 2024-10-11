<?php
include('../../php/util.php');
$sql = 'SELECT * from tbl_estoque ORDER BY nomeProduto';
$result = mysqli_query($conexao, $sql);
$produtos = mysqli_fetch_all($result);
require_once('../../php/login/validNotLogged.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movimentação de Produtos</title>
  <!-- Stylesheet Bootstrap -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Stylesheet Manual -->
  <link rel="stylesheet" href="../../css/reset.css">
  <link rel="stylesheet" href="../../css/root.css">
  <link rel="stylesheet" href="../../css/estoque.css">
  <!-- Stylesheet Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100;8..144,200;8..144,300;8..144,400;8..144,500;8..144,600;8..144,700;8..144,800;8..144,900;8..144,1000&display=swap" rel="stylesheet">

</head>

<body>
  <!-- Sidebar -->
  <?php 
    if (isset($_SESSION['unidade']) && $_SESSION['unidade'] != 'ESTOQUE') {
      include('../sidebar/sidebar.php'); 
    }
  ?>

  <!-- Header -->
  <?php include('../header/header.php'); ?>

  <!-- Main -->
  <div class="container d-flex mx-auto">
    <div class="container_geral mx-2 mt-4 text-white">

      <div class="d-flex mt-4 w-100 justify-content-center texto_sombra">
        <h4>Movimentação de Produtos</h4>
      </div>

      <hr class="linha">

      <div class="d-flex mx-auto texto_sombra justify-content-around container wrapper_mobile gap-2">

        <div class="d-flex">
          Validade:
          <div id="valid" class="ms-1">
          </div>
        </div>

        <div class="d-flex">
          Quantidade:
          <div id="quantidade" class="ms-1">
          </div>
        </div>

        <div class="d-flex">
          Quantidade total:
          <div id="quantidade-tot" class="ms-1">
          </div>
        </div>

      </div>

      <hr class="linha">

      <form class="d-grid mx-3 mt-5 gap-3 text-white formulario_sombra formulario_nome--sombra row" action="../../php/estoque/movimentar.php" method="post">

        <div class="d-flex d-inline-flex col">
          <label class="label_fix margem_mobile" for="tipo">Tipo de Movimentação:</label>
          <select name="tipo" class="form-control-sm w-100 col">
            <option selected value="1">Entrada</option>
            <option value="0">Saída</option>
          </select>
        </div>

        <div class="d-flex d-inline-flex col">
          <label class="label_fix margem_mobile" for="item">Item:</label>
          <select name="item" class="form-control-sm w-100 col" id="produto">
            <?php
            for ($i = 0; $i < $result->num_rows; $i++) {
              if (($produtos[$i][2] != $produtos[$i - 1][2])) {
                echo "<option value='" . $produtos[$i][1] . "'>" . $produtos[$i][2] . "</option>";
              }
            }
            ?>
          </select>
        </div>

        <div class="d-flex d-inline-flex col">
          <label class="label_fix margem_mobile" for="lote">Lote:</label>
          <select name="lote" class="form-control-sm w-100 col" id="loteSelect">
          </select>
        </div>

        <div class="d-flex d-inline-flex col mb-5">
          <label class="label_fix margem_mobile" for="qtde">Quantidade:</label>
          <input name="qtde" type="number" class="form-control-sm w-100 col" placeholder="qt. de produtos">
        </div>

        <div class="d-flex pb-3 w-100  mt-2 mb-3 container botao_mobile">
          <a class="botao_submit px-8 pt-2 pb-2" href="index.php" data-toggle="tooltip" data-placement="top" title="Cancelar">
            <img src="../../icones/cancelar-branco.svg" alt="cancelar-branco.svg.svg">
            Cancelar</a>

          <button class="botao_submit px-8 pt-2 pb-2 ms-2 me-2" href="#" data-toggle="tooltip" data-placement="top" title="Salvar">
            <img src="../../icones/adicionar.svg" alt="adicionar.svg">
            <input type="submit" value="" class="hide_content" name="save">
            Salvar
          </button>

          <a class="botao_submit px-8 pt-2 pb-2 " href="cadastrar-produto.php" data-toggle="tooltip" data-placement="top" title="Cadastrar">
            <img src="../../icones/estoque-cadastrar.svg" alt="estoque-cadastrar.svg">Cadastrar</a>
        </div>

      </form>
    </div>
  </div>
  </div>
  </div>

  </div>

  <!-- Gera o modal com as mensagens (sucesso, erro, etc) -->
  <?php createModalWarnings() ?>

  <!-- Javascript Manual -->

  <script src="../../js/estoque/estoque.js"></script>


  <!-- Comente aqui oq é isso -->
  <?php require_once("../../php/estoque/lotes.php") ?>

</body>

</html>