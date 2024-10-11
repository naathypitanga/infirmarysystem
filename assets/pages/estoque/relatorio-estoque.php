<?php
include('../../php/util.php');

if (isset($_GET['unid'])) {
  $_SESSION['unidade'] = $_GET['unid'];
}



$sql = 'SELECT Est.ID_produto as id, Est.nomeProduto as Prod, Est.unidadeDeMedida as uniMed from tbl_estoque as Est';
$result = mysqli_query($conexao, $sql);
require_once('../../php/login/validNotLogged.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Relatório</title>
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
  <!-- Stylesheet Datatables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
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
    <div class="container_geral mx-2 mt-4">
      <div class="d-flex mt-4 w-100 justify-content-center text-white texto_sombra">
        <h2>Relatório do Estoque</h2>
      </div>

      <hr class="linha">

      <div class="mt-5 mx-3">
        <?php require_once("../../php/estoque/generateRell.php") ?>
      </div>
      <div class="d-flex pb-3 w-100 justify-content-start mx-5 mt-3 mb-3">

      <a class="botao_submit px-8 pt-2 pb-2" href="index.php" data-toggle="tooltip" data-placement="top" title="Voltar">
          <img src="../../icones/retroceder-branco.svg" alt="retroceder-branco.svg"></a>

            <a class="botao_submit px-8 pt-2 pb-2 ms-2" href="entrada-produto.php" data-toggle="tooltip" data-placement="top" title="Movimentar Produtos">
            <img src="../../icones/movimentar-produtos.svg" alt="movimentar-produtos.svg">Movimentar Produtos</a>

            <a class="botao_submit px-8 pt-2 pb-2 ms-2" href="../../php/estoque/gerarExcel.php" data-toggle="tooltip" data-placement="top" title="Movimentar Produtos">
            <img src="../../icones/Excel.svg" alt=".svg">Gerar Planilha (.xls)</a>

         <?php echo $voltar?>
      </div>

    </div>
    <a id="backToTopButton" href="#homeRecep">
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="20" cy="20" r="20" fill="#6ea8fe"/>
            <path d="M20 27V13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M13 20L20 13L27 20" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>  
    </a>
  </div>
  </div>

  <!-- Javascript Bootstrap -->
  <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Javascript Datatables -->
  <script src="../../js/shered/scrollback.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
  <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../js/estoque/datatable_estoque.js"></script>
  <script src="../../js/estoque/redirect.js"></script>

  <!-- Style Datatables, deverá permanecer dentro do arquivo .php, caso contrário a biblioteca .css do Data irá sobrescrever toda e qualquer alteração realizada a esses elementos. -->

  <style>
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
      background: none;
      color: white !important;
      border: none;
    }
  </style>

</body>

</html>