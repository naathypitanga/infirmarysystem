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
  <title>Triagem</title>
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

  <!------------------------>

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
    
          <div class="d-flex d-inline-flex col">
          <label for="horarioi" class="label_fix">Data e Horário:</label>
          <input type="text" class="form-control-sm validate" name="horarioi" id="dataEHorario" maxlength="8" placeholder="00/00/0000 - 00:00:00" value="<?php echo(date('d/m/Y - H:i:s'))?>" disabled>
          </div>

          <div class="d-flex d-inline-flex col">
          <label for="cns" class="label_fix">C.N.S.:</label>
          <input type="text" class="form-control-sm w-100 col validate" name="cns" id="cns" placeholder="000.000.000.000">
          </div>

        <div class="d-flex d-inline-flex col">
          <label for="datan" class="label_fix">Data de Nascimento:</label>
          <input type="text" class="form-control-sm w-100 col validate js-date" name="datan" maxlength="10" placeholder="00/00/0000">
          </div>

          <div class="d-flex d-inline-flex col">
          <label for="ciclov" class="label_fix">Ciclo de Vida:</label>
          <select type="text" class="form-control-sm w-100 col validate" name="genero">
          <option value="" selected>Selecione</option>  
          <option>Idoso</option>
          <option>Adulto</option>
          <option>Adolescente</option>
          <option>Criança</option>
          <option>Infante</option>
          <option>Recém-nascido</option>
          </select>
          </div>

          <div class="d-flex d-inline-flex col">
          <label for="genero" class="label_fix">Gênero:</label>
          <select type="text" class="form-control-sm w-100 col validate" name="genero">
          <option value="" selected>Selecione</option>   
          <option>Feminino</option>
          <option>Masculino</option>
          <option>Transexual Feminino</option>
          <option>Transexual Masculino</option>
          </select>
          </div>   
     
        <div class="d-flex d-inline-flex col">
          <label class="label_fix">Local de Atendimento:</label>
          <select class="form-control-sm w-100 col">
            <option>01 - UPA REGIONAL MATINHOS</option>
            <option>02 - UPA PRAIA GRANDE</option>
          </select>

        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Município:</label>
          <select class="form-control-sm w-100 col">
            <option>MATINHOS - PR</option>
            <option>GUARATUBA - PR</option>
          </select>
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Un. Saúde de Origem:</label>
          <select class="form-control-sm w-100 col">
            <option>01 - UPA PRAIA GRANDE</option>
            <option>01 - UPA REGIONAL MATINHOS</option>
          </select>
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Paciente:</label>
          <input class="form-control-sm w-100 col">
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Nome da Mãe:</label>
          <input class="form-control-sm w-100 col">
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Motivo da Consulta:</label>
          <select class="form-control-sm w-100 col">
          <option value="" selected>Selecione</option>
            <option>1 - Consulta do Dia</option>
          </select>
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">C.I.A.P.:</label>
          <select class="form-control-sm w-100 col">
          <option value="" selected>Selecione</option>
            <option>1 - Análise de Sangue</option>
            <option>2 - Análise de Urina</option>
            <option>3 - Análise de Fezes</option>
            <option>4 - Citologia Esfoliativa</option>
            <option>5 - Endoscopia Diagnóstica</option>
          </select>
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Caráter do Atendimento:</label>
          <select class="form-control-sm w-100 col">
          <option value="" selected>Selecione</option>
            <option>1 - ELETIVO</option>
          </select>
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
  <script src="../../js/triagem/geral_triagem.js"></script>

  <!-------- AJAX / MASK --------->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

  <script>

    type="text/javascript">
    $("#dataEHorario").mask("00/00/0000 - 00:00:00");

    type="text/javascript">
    $("#cns").mask("000.000.000.000");
    
  </script>

</body>

</html>