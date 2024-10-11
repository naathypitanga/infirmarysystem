<?php
require('../../php/util.php');


require_once('../../php/login/validNotLogged.php');

// HITÓRICO DE LINKS SELECIONADOS *AZUL OU BRANCO

$url = $_SERVER['REQUEST_URI'];


if ($url == '/projetos/202100002/projetointegrador/assets/pages/atendConsultas/index.php') {
  $consultaClass = "triagem_historico--azul";
} else {
  $consultaClass = "triagem_historico--branco";
};

if ($url == '/projetos/202100002/projetointegrador/assets/pages/atendConsultas/listasDePacientes.php') {
  $listaClass = "triagem_historico--azul";
} else {
  $listaClass = "triagem_historico--branco";
};

if ($url == '') {
  $fichaClass = "triagem_historico--azul";
} else {
  $fichaClass = "triagem_historico--branco";
};



?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listas de Pacientes</title>
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
  <link rel="stylesheet" href="../../css/atendConsultas.css">
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

  <div class="container mx-auto">
    <div class="mx-2 mt-4 triagem_historico text-white">
      <a class="<?php echo $consultaClass; ?>" href="http://172.17.34.254:1200/projetos/202100002/projetointegrador/assets/pages/atendConsultas/index.php">Consultas</a>
      >
      <a class="<?php echo $listaClass; ?>" href="http://172.17.34.254:1200/projetos/202100002/projetointegrador/assets/pages/atendConsultas/listasDePacientes.php">Listas de Pacientes</a>
      >
      <a class="<?php echo $fichaClass; ?>" href="">Ficha</a>

    </div>
  </div>

  <div class="container d-flex mx-auto">
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

        <div class="d-flex d-inline-flex col formulario_nome">
          <label for="" class="label_fix">Setor:</label>
          <select name="" id="" class="form-control-sm w-100 col validate">
            <option value="">Clínico</option>
            <option value="">UTI</option>
            <option value="">Vai pro Regional</option>
            <option value="">Observação</option>
          </select>
        </div>

        <div class="d-flex d-inline-flex col" id="filter_col7" data-column="7">
          <label class="label_fix">Especialidade:</label>
          <select class="form-control-sm w-100 col column_filter" aria-label="Default select example" id="col7_filter" name="Especialidade">
            <option value="" selected>Todos</option>
            <option value="Clínico Geral">Clínico Geral</option>
            <option value="Cardiologista">Cardiologista</option>
          </select>
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Motivo da Consulta:</label>
          <select class="form-control-sm w-100 col">
            <option value="" selected>Selecione</option>
            <option>1 - Consulta do Dia</option>
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


      <div class="mx-5 mt-2 mb-5">
        <a href="geral.php" class="px-8 pt-2 pb-2 text-decoration-none tabela_adicionar">
          <img src="../../icones/adicionar.svg" alt="adicionar.svg">Adicionar
        </a>
      </div>
    </div>
  </div>

  <!------------------------------>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
  <script src="../../js/atendConsulta/datatable.js"></script>

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