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
  <title>Ficha</title>
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



  <div class="container d-flex mx-auto" id="homeFicha">
    <div class="container_geral mx-0 mt-4">

            <form class="d-grid mx-3 mt-3 gap-3 text-white formulario_sombra formulario_nome--sombra row" id="formPesquisa" method="POST" action="../../php/cadastroDeUsuario/add.php">

              <div class="container formulario_divisoria mb-3 mt-0">
                <h3>Informações Gerais</h3>
              </div>

              <div class="formulario_nome d-flex d-inline-flex col" id="filter_col6" data-column="6">
                <label class="label_fix margem_mobile">Profissional da Triagem:</label>
                <input type="text" list="professional" class="form-control-sm w-50 me-2" placeholder="Digite o nome do profissional" id="col6_filter" name="Nome Prof.">
                <datalist id="professional" class="column_filter" name="Profissional">
                  <?php include('../../php/triagem/selectProf.php') ?>
                </datalist>
              </div>

              <div class="d-flex d-inline-flex col" id="filter_col7" data-column="7">
                <label class="label_fix margem_mobile">Especialidade:</label>
                <select class="form-control-sm me-2" aria-label="Default select example" id="col7_filter" name="Especialidade">
                  <option value="" selected>Todos</option>
                  <option value="Clínico Geral">Clínico Geral</option>
                  <option value="Geriatra">Geriatra</option>
                  <option value="Pediatra">Pediatra</option>
                </select>
              </div>

              <div class="d-flex d-inline-flex col chainMe">
                <label for="arterial" class="label_fix margem_mobile">Pressão Arterial:</label>
                <input type="text" class="form-control-sm w-10 me-2" maxlength="5" onkeypress="return isNumber(event)" id="idPas" onblur="validAndCalc()" onkeyup="calcHipertensao()">
                /
                <input type="text" class="form-control-sm w-10 mx-2 validate" maxlength="5" id="idPad" onblur="validAndCalc()" onkeyup="calcHipertensao()">
                mmHg
              </div>

              <div class="d-flex d-inline-flex col">
                <label for="ciclov" class="label_fix margem_mobile">Posição da PA:</label>
                <select type="text" class="form-control-sm w-50 me-2 validate" name="genero">
                  <option value="" selected>Selecione</option>
                  <option>01 - Ortostática</option>
                  <option>02 - Sentado</option>
                  <option>03 - Decúbito Dorsal</option>
                  <option>04 - Decúbito Ventral</option>
                  <option>05 - Decúbito Lateral</option>
                  <option>06 - Sims</option>
                  <option>07 - Fowler</option>
                  <option>08 - Ginecológica</option>
                  <option>09 - Litotômica</option>
                  <option>10 - Genupeitoral</option>
                  <option>11 - Tredelenbug</option>
                  <option>12 - Kraske</option>
                </select>
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">Grau de Hipertensão:</label>
                <input class="form-control-sm w-25 me-2" id="idCalcHiper" readonly onkeyup="calcHipertensao()" placeholder="Cálculo Automático">
              </div>

              <div class="d-flex d-inline-flex col chainMe">
                <label for="arterial" class="label_fix margem_mobile">Peso:</label>
                <input type="text" class="form-control-sm w-10 me-2 validate chainMe" id="idPeso" maxlength="5" onblur="imc()">
                Kg
              </div>

              <div class="d-flex d-inline-flex col chainMe">
                <label for="arterial" class="label_fix margem_mobile">Altura:</label>
                <input type="text" class="form-control-sm w-10 me-2 validate chainMe" id="idAltura" maxlength="3" onblur="imc()">
                cm
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">I.M.C.:</label>
                <input class="form-control-sm w-25 me-2" readonly placeholder="Cálculo Automático" id="resultImc">
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">Superf. Corporal:</label>
                <input class="form-control-sm w-25 me-2" placeholder="Cálculo Automático" id="superf">
                m²
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">Pulsação Arterial:</label>
                <input class="form-control-sm w-25 me-2">
                /min
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">Freq. Respiratória:</label>
                <input class="form-control-sm w-25 me-2">
                /min
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">Risco Co-morb.:</label>
                <input class="form-control-sm w-25" placeholder="Cálculo Automático">
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">Est. Nutri.:</label>
                <input class="form-control-sm w-25" placeholder="Cálculo Automático">
              </div>

              <div class="d-flex d-inline-flex col chainMe">
                <label for="arterial" class="label_fix margem_mobile">Cintura:</label>
                <input type="text" class="form-control-sm w-10 me-2 validate chainMe" maxlength="5" id="cint" onblur="calcularIcq('<?php echo ($genero); ?>')" onkeypress="return isNumber(event)">
                cm
              </div>

              <div class="d-flex d-inline-flex col chainMe">
                <label for="arterial" class="label_fix margem_mobile">Quadril:</label>
                <input type="text" class="form-control-sm w-10 me-2 validate chainMe" maxlength="3" id="quad" onblur="calcularIcq('<?php echo ($genero); ?>')" onkeypress="return isNumber(event)">
                cm
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">I.C.Q.:</label>
                <input class="form-control-sm w-25" placeholder="Cálculo Automático" id="calcIcq">
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">Perímetro Cefálico:</label>
                <input class="form-control-sm w-25 me-2">
                cm
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">Glicemia Capilar:</label>
                <input class="form-control-sm w-25 me-2">
                mg/dl
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">Momento da coleta:</label>
                <select type="text" class="form-control-sm me-2" name="coleta">
                  <option value="" selected>Selecione</option>
                  <option>Jejum</option>
                  <option>Pré-Prandial</option>
                  <option>Pós-Prandial</option>
                  <option>Não definido</option>
                </select>
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">Saturação (SpO2):</label>
                <input class="form-control-sm w-25 me-2">
                0 a 100
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">Temperatura:</label>
                <input class="form-control-sm w-10 me-2">
                °C
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">HDL:</label>
                <input class="form-control-sm w-10 me-2">
                mg/dl
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">Triglicerídeos:</label>
                <input class="form-control-sm w-10 me-2">
                mg/dl
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">LDL:</label>
                <input class="form-control-sm w-10 me-2">
                mg/dl
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">Hemoglobina Glicada:</label>
                <input class="form-control-sm w-10 me-2">
                %
              </div>

              <div class="d-flex d-inline-flex col">
                <label for="sangue" class="label_fix margem_mobile">Tipo Sanguíneo:</label>
                <select type="text" class="form-control-sm me-2" name="sangue">
                  <option value="" selected>Selecione</option>
                  <option>A</option>
                  <option>B</option>
                  <option>AB</option>
                  <option>O</option>
                </select>
              </div>

              <div class="d-flex d-inline-flex col">
                <label for="rh" class="label_fix margem_mobile">Fator RH:</label>
                <select type="text" class="form-control-sm me-2" name="rh">
                  <option value="" selected>Selecione</option>
                  <option>Positivo</option>
                  <option>Negativo</option>
                </select>
              </div>

              <div class="d-flex d-inline-flex col">
                <label for="rh" class="label_fix margem_mobile">C.R.:</label>
                <select type="text" class="form-control-sm me-2 form_cr--cor" name="rh">
                  <option value="" selected>Selecione</option>
                  <option>Imediato</option>
                  <option>10 minutos</option>
                  <option>60 minutos</option>
                  <option>120 minutos</option>
                  <option>240 minutos</option>
                </select>
              </div>

              <div class="d-flex d-inline-flex col">
                <label for="sangue" class="label_fix margem_mobile">Especialidade:</label>
                <select type="text" class="form-control-sm me-2" name="sangue">
                  <option value="" selected>Selecione</option>
                  <option>Pediatra</option>
                  <option>Clínico Geral</option>
                  <option>Geriatra</option>
                </select>
              </div>

              <div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                    <label class="form-check-label mx-1" for="inlineCheckbox1">Diarréia</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
                    <label class="form-check-label mx-1" for="inlineCheckbox1">Dor Torácica</label>
                  </div>
              </div><br>


              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix">Justificativa do Atendimento:</label>
              </div>

              <div class="col">
                <textarea name="" id="" cols="30" rows="10" class="form-control-sm w-100 mt-2"></textarea>
              </div><br>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix">Causas Parâm.Alter:</label>
              </div>
              <div class="col">
                <textarea name="" id="" cols="30" rows="10" class="form-control-sm w-100 mt-2"></textarea>
              </div><br>

              <div class="container formulario_divisoria mb-3 mt-0">
                <h3>Dados Clínicos</h3>
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix">Anamnese e HDA:</label>
              </div>
              <div class="col">
                <textarea name="" id="" cols="30" rows="10" class="form-control-sm w-100 mt-2"></textarea>
              </div><br>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix">Exame Físico:</label>
              </div>
              <div class="col">
                <textarea name="" id="" cols="30" rows="10" class="form-control-sm w-100 mt-2"></textarea>
              </div><br>

              <div class="container formulario_divisoria mb-3 mt-0">
                <h3>Resultados Exames</h3>
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix">Exames:</label>
              </div>
              <div class="col">
                <textarea name="" id="" cols="30" rows="10" class="form-control-sm w-100 mt-2"></textarea>
              </div><br>

              <div class="container formulario_divisoria mb-3 mt-0">
                <h3>Procedimentos Realizados</h3>
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix">Procedimentos:</label>
              </div>
              <div class="col">
                <textarea name="" id="" cols="30" rows="10" class="form-control-sm w-100 mt-2"></textarea>
              </div><br>

              <div class="container formulario_divisoria mb-3 mt-0">
                <h3>Prescrição de Medicamentos</h3>
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">Tipo:</label>
                <select type="text" class="form-control-sm me-2" name="coleta">
                  <option value="" selected>Selecione</option>
                  <option>Jejum</option>
                  <option>Pré-Prandial</option>
                  <option>Pós-Prandial</option>
                  <option>Não definido</option>
                </select>

              </div>
              <div class="col">
                <label for="" class=""></label>
                <input class="form-check-input filter" type="checkbox" value="" id="">
                Medicamento Industrial
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">Situação:</label>
                <select type="text" class="form-control-sm me-2" name="coleta">
                  <option value="" selected>Selecione</option>
                  <option>Jejum</option>
                  <option>Pré-Prandial</option>
                  <option>Pós-Prandial</option>
                  <option>Não definido</option>
                </select>
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">Medicamento:</label>
                <select type="text" class="form-control-sm me-2" name="coleta">
                  <option value="" selected>Selecione</option>
                  <option>Jejum</option>
                  <option>Pré-Prandial</option>
                  <option>Pós-Prandial</option>
                  <option>Não definido</option>
                </select>
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">Receita:</label>
                <input class="form-control-sm w-50 me-2">
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">Sequência:</label>
                <input class="form-control-sm w-50 me-2" placeholder="Cálculo Automático" type="number">
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">Categoria:</label>
                <input class="form-control-sm w-50 me-2" placeholder="Cálculo Automático">
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">Dia do Ciclo:</label>
                <input class="form-control-sm w-50 me-2">
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">Aplicação:</label>
                <input class="form-control-sm w-50 me-2" placeholder="">
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">Posologia:</label>
                <input class="form-control-sm w-50 me-2" placeholder="">
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">Quantidade:</label>
                <input class="form-control-sm w-25 me-2" type="number">
              </div>

              <div class="col">
                  <input class="form-check-input filter" type="checkbox" value="" id="">
                  Uso Contínuo
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">Superfície Corporal:</label>
                <input class="form-control-sm me-2" placeholder="Cálculo Automático">
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix">Justificativa:</label>
              </div>
              <div class="col">
                <textarea name="" id="" cols="30" rows="10" class="form-control-sm w-100 mt-2"></textarea>
              </div><br>

              <div class="container formulario_divisoria mb-3 mt-0">
                <h3>Período de Tratamento</h3>
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">Data Inicial:</label>
                <input class="form-control-sm me-2" placeholder="00/00/0000">
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">Duração:</label>
                <input class="form-control-sm me-2" placeholder="00:00:00">
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix margem_mobile">Data Final:</label>
                <input class="form-control-sm me-2" placeholder="00/00/000">
              </div><br>
              
              <div class="container formulario_divisoria mb-3 mt-0">
                <h3>Requisição de Exames</h3>
              </div>

              <div class="formulario_nome d-flex d-inline-flex col">
                <label class="label_fix">Exames:</label>
              </div>

              <div class="col">
                <textarea name="" id="" cols="30" rows="10" class="form-control-sm w-100 mt-2"></textarea>
              </div><br>


            <div class="mt-2 mb-5 d-flex justify-content-end gap-2">
                <a href="#" class="px-8 pt-2 pb-2 text-decoration-none botao_submit">
                  <img src="../../icones/cancelar-branco.svg" alt="cancelar.svg">Cancelar
                </a>
            
                <a href="./saidaAtend-ficha.php" class="px-8 pt-2 pb-2 text-decoration-none botao_submit">
                <img src="../../icones/adicionar.svg" alt="adicionar.svg">
                Salvar
                </a>
            </div>



        </div>

      </form>
      <a id="backToTopButton" href="#homeFicha">
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

  <!-- MASK -->
  <script src="jquery.js" type="text/javascript"></script>
  <script src="jquery.maskedinput.js" type="text/javascript"></script>
</body>

</html>
<?php
unset($_SESSION['info']);

?>