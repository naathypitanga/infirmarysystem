<?php
require('../../php/util.php');
include('../../seaLibrary/seaLibrary.php');

require_once('../../php/login/validNotLogged.php');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Saída do Atendimento Ficha</title>
  <!-- Stylesheet Bootstrap -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Stylesheet Manual -->
  <link rel="stylesheet" href="../../css/reset.css">
  <link rel="stylesheet" href="../../css/root.css">
  <link rel="stylesheet" href="../../css/atendConsultas.css">
  <!-- Stylesheet Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100;8..144,200;8..144,300;8..144,400;8..144,500;8..144,600;8..144,700;8..144,800;8..144,900;8..144,1000&display=swap" rel="stylesheet">
  <script>
    jQuery(function($) {
      $("#cns").mask("000.000.000.000");
    });
  </script>
</head>

<body>

  <!---------MENU LATERAL DESKTOP---------->

  <?php include('../sidebar/sidebar.php'); ?>

  <!---------NAVBAR---------->

  <?php include('../header/header.php'); ?>

  <!---------PARTE INTERNA DA TELA---------->



  <div class="container d-flex mx-auto" id="homeSaidaFicha">
    <div class="container_geral mx-2 mt-4">

            <form class="d-grid mx-3 mt-3 gap-3 text-white formulario_sombra formulario_nome--sombra row" id="formPesquisa" method="POST" action="../../php/cadastroDeUsuario/add.php">

              <div class="container formulario_divisoria mb-3 mt-0">
                  <h3>Saída do Atendimento</h3>
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix">Diagnóstico:</label>
              </div>

              <div class="col">
                <textarea name="" id="" cols="30" rows="10" class="form-control-sm w-100 mt-2"></textarea>
              </div><br>

              <div class="container formulario_divisoria mb-3 mt-0">
                  <h3>Documentos</h3>
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">Dias:</label>
                <input class="form-control-sm w-10 me-2">
              </div>

              <div class="col">
                  <label for="" class=""></label>
                  <input class="form-check-input filter" type="checkbox" value="" id="">
                  Atestado:
              </div>

              <div class="col">
                  <label for="" class=""></label>
                  <input class="form-check-input filter" type="checkbox" value="" id="">
                  Declaração de Comparecimento:
              </div>

              <div class="col">
                  <label for="" class=""></label>
                  <input class="form-check-input filter" type="checkbox" value="" id="">
                  Ocultar CID
              </div>

              <div class="col">
                  <label for="" class=""></label>
                  <input class="form-check-input filter" type="checkbox" value="" id="">
                  Orientações:
              </div>

              <div class="col">
                <textarea name="" id="" cols="30" rows="10" class="form-control-sm w-100 mt-2"></textarea>
              </div><br>

              <div class="mt-2 mb-5 d-flex justify-content-end gap-2">
                <a href="#" class="px-8 pt-2 pb-2 text-decoration-none botao_submit">
                  <img src="../../icones/cancelar-branco.svg" alt="cancelar.svg">Cancelar
                </a>
            
                <a href="#" class="px-8 pt-2 pb-2 text-decoration-none botao_submit">
                <img src="../../icones/adicionar.svg" alt="adicionar.svg">
                Salvar
                </a>
            </div>

            </form>
            <a id="backToTopButton" href="#homeSaidaFicha">
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="20" cy="20" r="20" fill="#6ea8fe"/>
            <path d="M20 27V13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M13 20L20 13L27 20" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>  
    </a>

    </div>
  </div>

  <!------------------------------>

  <!-- Gera o modal com as mensagens (sucesso, erro, etc) -->

  <?php createModalWarnings(); ?>

  <!-- Javascript Manual -->

  <script src="../../js/shered/scrollback.js"></script>



</html>
<?php
unset($_SESSION['info']);

?>