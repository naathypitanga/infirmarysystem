<?php
require('../../php/util.php');


require_once('../../php/login/validNotLogged.php');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Atendimento de Consultas</title>
  <!-- Stylesheet Bootstrap -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Stylesheet Datatables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
  <!-- Stylesheet Manual -->
    <link rel="stylesheet" href="../../css/reset.css">
  <link rel="stylesheet" href="../../css/root.css">
  <link rel="stylesheet" href="../../css/atendConsultas.css">
  <!-- Stylesheet Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100;8..144,200;8..144,300;8..144,400;8..144,500;8..144,600;8..144,700;8..144,800;8..144,900;8..144,1000&display=swap" rel="stylesheet">
</head>

<body>

  <!---------MENU LATERAL DESKTOP---------->

  <?php include('../sidebar/sidebar.php'); ?>

  <!---------NAVBAR---------->

  <?php include('../header/header.php'); ?>

  <!---------PARTE INTERNA DA TELA---------->

  <div class="container d-flex mx-auto" id="homeAtendConsulta">
    <div class="container_geral mx-2 mt-4">

      <form class="d-grid mx-3 mt-5 gap-3 text-white formulario_sombra formulario_nome--sombra row" id="formPesquisa">

        <div class="hide_content" id="filter_col0" data-column="0">
          <input type="text" class="form-control-sm w-100 col column_filter validate" id="col0_filter">
        </div>

        <div class="hide_content" id="filter_col1" data-column="1">
          <input type="text" class="form-control-sm w-100 col column_filter validate" id="col1_filter">
        </div>

        <div class="d-flex d-inline-flex col" id="filter_col3" data-column="3">
          <label for="data" class="label_fix">Data:</label>
          <input type="text" class="form-control-sm w-100 col column_filter validate js-date" id="col3_filter" name="Data" maxlength="10" placeholder="dd/mm/aaaa">
        </div>

        <div class="hide_content" id="filter_col5" data-column="5">
          <input type="text" class="form-control-sm w-100 col column_filter validate" id="col5_filter">
        </div>

        <div class="formulario_nome d-flex d-inline-flex col" id="filter_col6" data-column="6">
          <label class="label_fix">Profissional:</label>
          <input type="text" list="professional" class="form-control-sm w-100 col column_filter" placeholder="Digite o nome do profissional" id="col6_filter" name="Nome Prof.">
          <datalist id="professional" class="column_filter" name="Profissional">
            <?php include('../../php/triagem/selectProf.php') ?>
          </datalist>
        </div>


        <div class="d-flex d-inline-flex col" id="filter_col7" data-column="7">
          <label class="label_fix">Encaminhamento:</label>
          <select class="form-control-sm w-100 col column_filter" aria-label="Default select example" id="col7_filter" name="Especialidade">
            <option value="" selected>Todos</option>
            <option value="Clínico Geral">Clínico Geral</option>
            <option value="Geriatra">Geriatra</option>
            <option value="Pediatra">Pediatra</option>
          </select>
        </div>

      </form>

      <div class="formulario_botao mt-3 mx-5 mt-2 d-flex justify-content-end">
        <div class="mx-1 formulario_botao2">
          <button type="button" class="px-8 pt-1 pb-1" onclick="clearFilter();">
            <img src="../../icones/cancelar-branco.svg" alt="cancelar.svg" width="20px">
          </button>
        </div>
        <div>
          <button type="button" class="px-8 pt-1 pb-1" id="searchButton">
            Procurar
            <img src="../../icones/botao-pesquisa.svg" alt="pesquisar.svg" width="22px">
          </button>
        </div>
      </div>

      <hr class="linha">

      <div class="mx-5 mt-2 row">

        <div class="col">
          <label for="flexCheckDefault" class="checklist_cor--natendido mt-1"></label>
          <input class="form-check-input filter" type="checkbox" value="SIT1" id="flexCheckDefault">
          Não Atendidos
        </div>


        <div class="col">
          <label for="flexCheckDefault" class="checklist_cor--atconsulta mt-1"></label>
          <input class="form-check-input filter" type="checkbox" value="SIT3" id="flexCheckDefault">
          At. Consultas
        </div>
      </div>

      <hr class="linha">



      <div class="mx-5 mt-2 mb-5">

        <div class="table-responsive">
          <table id="table_consulta" class="display cell-border nowrap">
            <thead>
              <tr>
                <th>C.R.</th>
                <th>Seq</th>
                <th>Sit</th>
                <th>Data</th>
                <th>Nome do Paciente</th>
                <th>Nome Social</th>
                <th>Nome Prof.</th>
                <th>Encaminhamento</th>
                <th>Ações</th>
                <th>Fim da Triagem</th>
              </tr>
            </thead>
            <tbody>
              <?php include('../../php/atendConsultas/Table.php')?>
            </tbody>
          </table>
        </div>
      </div>

      <a id="backToTopButton" href="#homeAtendConsulta">
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="20" cy="20" r="20" fill="#6ea8fe"/>
            <path d="M20 27V13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M13 20L20 13L27 20" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>  
    </a>

    </div>
  </div>

  <!------------------------------>

  <!-- Javascript Manual -->
  <script src="../../js/shered/scrollback.js"></script>

  <!-- Javascript Datatables -->

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
  <script src="../../js/atendConsulta/datatable_consulta.js"></script>

  <!-- O Style precisa permanecer nessa página, algumas classes do CSS do Datatables precisam ser alteradas diretamente no HTML, se não a biblioteca "vencerá" as modificações caso sejam enviadas de um arquivo CSS externo !-->

  <style>
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
      background: none;
      color: white !important;
      border: none;
    }
  </style>

</body>

</html>