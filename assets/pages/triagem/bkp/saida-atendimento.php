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
  <title>Saída de Atendimento</title>
  <!-- Stylesheet Bootstrap -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Stylesheet Datatables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
  <!-- Stylesheet Manual -->
  <link rel="stylesheet" href="../../css/reset.css">
  <link rel="stylesheet" href="../../css/root.css">
  <link rel="stylesheet" href="../../css/triagem.css">
  <!-- Stylesheet Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100;8..144,200;8..144,300;8..144,400;8..144,500;8..144,600;8..144,700;8..144,800;8..144,900;8..144,1000&display=swap" rel="stylesheet">
</head>

<body>

  <?php include('../sidebar/sidebar.php'); ?>
  <?php include('../header/header.php'); ?>

  <!---------PARTE INTERNA DA TELA---------->

  <div class="container mx-auto">
    <div class="mx-2 mt-4 triagem_historico text-white">

      <a href="http://172.17.34.254:1200/projetos/202100002/projetointegrador/assets/pages/triagem/">Triagem de Consultas</a>
      >
      <a href="http://172.17.34.254:1200/projetos/202100002/projetointegrador/assets/pages/triagem/geral.php">Geral</a>
      >
      <a href="http://172.17.34.254:1200/projetos/202100002/projetointegrador/assets/pages/triagem/triagem-cadastro.php">Triagem</a>
      >
      <a href="http://172.17.34.254:1200/projetos/202100002/projetointegrador/assets/pages/triagem/saida-atendimento.php">S. Atendimento</a>

    </div>
  </div>

  <div class="container d-flex mx-auto">
    <div class="container_geral mx-2 mt-4">
      <form class="d-grid mx-3 mt-5 gap-3 text-white formulario_sombra formulario_nome--sombra row" id="formPesquisa">

        <div class="d-flex d-inline-flex col formulario_nome">
          <label class="label_fix">Saída do atendimento:</label>
          <input class="form-control-sm w-100 col" placeholder="00/00/0000 - 00:00:00" id="dataHoraSaida" name="dataHoraSaida" value="<?php echo (date('d/m/Y - H:i:s')) ?>" disabled>
          <!--<input type="text" list="professional" class="form-control-sm w-100 col column_filter" placeholder="Digite o nome do profissional" name="Nome Prof.">
          <datalist id="professional" name="Profissional">
            <?php //include('../../php/triagem/selectProf.php') 
            ?>
          </datalist>-->
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

        <div class="d-flex d-inline-flex col formulario_nome">
          <label class="label_fix">Profissional:</label>
          <input type="text" list="professional" class="form-control-sm w-100 col column_filter" placeholder="Digite o nome do profissional" name="Nome Prof.">
          <datalist id="professional" name="Profissional">
            <?php include('../../php/triagem/selectProf.php') ?>
          </datalist>
        </div>

        <div class="d-flex d-inline-flex col formulario_nome">
          <label for="" class="label_fix">Especialidade:</label>
          <select name="" id="" class="form-control-sm w-100 col validate">
            <option value="" selected>Todos</option>
            <option value="Clínico Geral">Clínico Geral</option>
            <option value="Cardiologista">Cardiologista</option>
          </select>
        </div>

        <div class="d-flex d-inline-flex col formulario_nome">
          <label for="" class="label_fix">Procedimento da consulta:</label>
          <select name="" id="" class="form-control-sm w-100 col validate"></select>
        </div>

        <div class="d-flex d-inline-flex col formulario_nome">
          <label for="" class="label_fix">Convênio da consulta:</label>
          <select name="" id="" class="form-control-sm w-100 col validate"></select>
        </div>

        <div class="d-flex d-inline-flex col formulario_nome">
          <label for="" class="label_fix">Estratificação de Risco:</label>
          <select name="" id="" class="form-control-sm w-100 col validate"></select>
        </div>

        <div class="d-flex d-inline-flex col formulario_nome">
          <label class="label_fix">Operador:</label>
          <input type="text" list="professional" class="form-control-sm w-100 col column_filter" placeholder="Digite o nome do operador " name="Nome Prof.">
          <datalist id="professional" name="Profissional">
            <?php include('../../php/triagem/selectProf.php') ?>
          </datalist>
        </div><br>

        <div class="d-flex d-inline-flex col formulario_nome">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="saiAtendCheckbox1">
            <label class="form-check-label mx-1" for="inlineCheckbox1">Declaração de Comprometimento</label>
          </div>

          <div class="d-flex d-inline-flex col formulario_nome">
            <input class="form-check-input" type="checkbox" id="saiAtendCheckbox2">
            <label class="form-check-label mx-1" for="inlineCheckbox1">Agravo a Saúde do Trabalhador</label>
          </div>
        </div><br>

          <div>
          <button class="px-8 pt-2 pb-2 botao_submit">
          <a href="http://172.17.34.254:1200/projetos/202100002/projetointegrador/assets/pages/triagem/" class="text-decoration-none text-white">
          <img src="../../icones/adicionar.svg" alt="adicionar.svg">
          Procedimentos
          </a>
          </div>

        <div class="mt-2 mb-5 d-flex justify-content-end gap-2">
          <a href="http://172.17.34.254:1200/projetos/202100002/projetointegrador/assets/pages/triagem/" class="px-8 pt-2 pb-2 text-decoration-none botao_submit">
            <img src="../../icones/cancelar-branco.svg" alt="cancelar.svg">Cancelar
          </a>

          <button class="px-8 pt-2 pb-2 botao_submit">
            <a href="http://172.17.34.254:1200/projetos/202100002/projetointegrador/assets/pages/triagem/" class="text-decoration-none text-white">
              <img src="../../icones/adicionar.svg" alt="adicionar.svg">
              Salvar
            </a>
          </button>

        </div>


      </form>



    </div>


  </div>

  <!------------------------------>

  <script src="../../js/triagem/triagem_form.js"></script>

  <!----- AJAX/JQUERY.MASK ------->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

  <script>
    type = "text/javascript" >
      $("#dataHoraSaida").mask("00/00/0000 - 00:00:00");
  </script>
</body>

</html>