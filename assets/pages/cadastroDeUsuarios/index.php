<?php
include('../../php/util.php');

if (isset($_GET['unid'])) {
  $_SESSION['unidade'] = $_GET['unid'];
}

require_once('../../php/login/validNotLogged.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Usuários</title>
  <!-- Stylesheet Bootstrap -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Stylesheet Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100;8..144,200;8..144,300;8..144,400;8..144,500;8..144,600;8..144,700;8..144,800;8..144,900;8..144,1000&display=swap" rel="stylesheet">
  <!-- Stylesheet Datatables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    <!-- Stylesheet Manual -->
  <link rel="stylesheet" href="../../css/reset.css">
  <link rel="stylesheet" href="../../css/root.css">
  <link rel="stylesheet" href="../../css/cadastroDeUsuarios.css">
</head>

<body>
  <!-- Sidebar -->
  <?php 
    if (isset($_SESSION['unidade']) && $_SESSION['unidade'] != 'CADUSER') {
      include('../sidebar/sidebar.php'); 
    }
  ?>

  <!-- Header -->
  <?php include('../header/header.php'); ?>

  <!-- Main -->

  <div class="container d-flex mx-auto" id="homeCadUsuarios">
    <div class="container_geral mx-2 mt-4">
      <div class="d-flex mt-4 w-100 justify-content-center text-white texto_sombra">
        <h2>Lista de Usuários</h2>
      </div>

      <hr class="linha">

      <div class="mt-5 mx-3">
      <table id="table_cadastro" class="display cell-border nowrap">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Grupo</th>
                <th>Ativo</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php include('../../php/cadastroDeUsuario/generateUserTable.php') ?>
            </tbody>
          </table>
      </div>
      <div class="d-flex gap-2 pb-3 w-100  mt-3 mb-3 container botao_mobile">
        <a class="botao_submit pt-2 pb-2 ms-2" href="gerenciamento-usuario.php" data-toggle="tooltip" data-placement="top" title="Gerenciamento dos Grupos de Serviço">
          <img src="../../icones/botao-gerenciamento.svg" alt="botao-gerenciamento.svg">Gerenciamento</a>
    
        <a class="botao_submit pt-2 pb-2 ms-2" href="cadastrar-usuario.php" data-toggle="tooltip" data-placement="top" title="Cadastrar Usuário">
          <img src="../../icones/adicionar.svg" alt="adicionar.svg">Cadastrar</a>

        <a class="botao_submit pt-2 pb-2 ms-2" href="logDeAcesso.php" data-toggle="tooltip" data-placement="top" title="Cadastrar Usuário">
        <img src="../../icones/log.svg" alt="botao-glog.svg">Log</a>
      </div>

    </div>

    <a id="backToTopButton" href="#homeCadUsuarios">
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="20" cy="20" r="20" fill="#6ea8fe"/>
            <path d="M20 27V13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M13 20L20 13L27 20" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>  
    </a>
  </div>
  </div>

  <!-- Javascript Datatables -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>

    <!-- Javascript Manual -->
  <script src="../../js/shered/scrollback.js"></script>
  <script src="../../js/cadastroDeUsuarios/datatable_cadastro.js"></script>

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