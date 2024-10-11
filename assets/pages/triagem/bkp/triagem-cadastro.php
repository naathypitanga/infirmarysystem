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
  <title>Geral</title>
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/triagemform.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100;8..144,200;8..144,300;8..144,400;8..144,500;8..144,600;8..144,700;8..144,800;8..144,900;8..144,1000&display=swap" rel="stylesheet">
</head>

<body>

  <?php include('../sidebar/sidebar.php'); ?>
  <?php include('../header/header.php'); ?>

  <!------------------------>


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
          <label class="label_fix">Prof. da Triagem:</label>
          <input type="text" list="professional" class="form-control-sm w-100 col column_filter" placeholder="Digite o nome do profissional" name="Nome Prof." value="<?php echo($_SESSION['user']['nomeCompleto'])?>" readonly>
          <datalist id="professional" name="Profissional">
            <?php include('../../php/triagem/selectProf.php') ?>
          </datalist>
          </div>

          <div class="d-flex d-inline-flex col formulario_nome">
          <label class="label_fix">Especialidade:</label>
          <input type="text" list="especialidade" class="form-control-sm w-100 col column_filter" placeholder="Digite o nome da especialidade" name="Especialidade">
          <datalist id="especialidade" name="Especialidade">
            <?php include('../../php/triagem/selectProf.php') ?>
          </datalist>
          </div>

        <div class="d-flex d-inline-flex col chainMe">
          <label for="arterial" class="label_fix">Pressão Arterial:</label>
          <input type="text" class="form-control-sm w-10 me-2 validate chainMe" maxlength="5" onkeypress="return isNumber(event)" id="idPas" onblur="validAndCalc()" onkeyup="calcHipertensao()">
          /
          <input type="text" class="form-control-sm w-10 mx-2 validate" maxlength="5" id="idPad" onblur="validAndCalc()" onkeyup="calcHipertensao()">
          mmHg       
          </div>

          <div class="d-flex d-inline-flex col">
          <label for="ciclov" class="label_fix">Posição da PA:</label>
          <select type="text" class="form-control-sm w-100 col validate" name="genero">
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
          <label class="label_fix">Grau de Hipertensão:</label>
          <input class="form-control-sm w-100 col" id="idCalcHiper" readonly onkeyup="calcHipertensao()" placeholder="cálculo"> 
        </div>

        <div class="d-flex d-inline-flex col chainMe">
          <label for="arterial" class="label_fix">Peso/Altura:</label>
          <input type="text" class="form-control-sm w-10 me-2 validate chainMe" id="idPeso" maxlength="5" onblur="imc()">
          Kg

          <input type="text" class="form-control-sm w-10 mx-2 ms-5 validate chainMe" id="idAltura" maxlength="3" onblur="imc()">
          cm      
          </div>
     
          <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">I.M.C.:</label>
          <input class="form-control-sm w-100 col" readonly placeholder="cálculo" id="resultImc">
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Superf. Corporal:</label>
          <input class="form-control-sm w-25 me-2" placeholder="cálculo">
          m²
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Pulsação Arterial:</label>
          <input class="form-control-sm w-25 me-2">
          /min
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Freq. Respiratória:</label>
          <input class="form-control-sm w-25 me-2">
          /min
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Risco Co-morb.:</label>
          <input class="form-control-sm w-25" placeholder="cálculo">
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Est. Nutri.:</label>
          <input class="form-control-sm w-25" placeholder="cálculo">
        </div>

        <div class="d-flex d-inline-flex col chainMe">
          <label for="arterial" class="label_fix">Cintura/Quadril:</label>
          <input type="text" class="form-control-sm w-10 me-2 validate chainMe" maxlength="5" onkeypress="return isNumber(event)">
          cm

          <input type="text" class="form-control-sm w-10 mx-2 ms-5 validate chainMe" maxlength="3" onkeypress="return isNumber(event)">
          cm      
          </div>

          <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">I.C.Q.:</label>
          <input class="form-control-sm w-25" placeholder="cálculo">
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Perímetro Cefálico:</label>
          <input class="form-control-sm w-25 me-2">
          cm
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Glicemia Capilar:</label>
          <input class="form-control-sm w-25 me-2">
          mg/dl
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Momento da coleta:</label>
          <select type="text" class="form-control-sm validate" name="coleta">
          <option value="" selected>Selecione</option>  
          <option>Jejum</option>
          <option>Pré-Prandial</option>
          <option>Pós-Prandial</option>
          <option>Não definido</option>
          </select>
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Saturação (SpO2):</label>
          <input class="form-control-sm w-10 me-2">
          0 a 100
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Temperatura:</label>
          <input class="form-control-sm w-10 me-2">
          °C
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">HDL:</label>
          <input class="form-control-sm w-10 me-2">
          mg/dl
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Triglicerídeos:</label>
          <input class="form-control-sm w-10 me-2">
          mg/dl 
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">LDL:</label>
          <input class="form-control-sm w-10 me-2">
          mg/dl
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Hemoglobina Glicada:</label>
          <input class="form-control-sm w-10 me-2">
          %
        </div>

        <div class="d-flex d-inline-flex col">
          <label for="sangue" class="label_fix">Tipo Sanguíneo:</label>
          <select type="text" class="form-control-sm validate" name="sangue">
          <option value="" selected>Selecione</option>  
          <option>A+</option>
          <option>A-</option>
          <option>B+</option>
          <option>B-</option>
          <option>AB+</option>
          <option>AB-</option>
          <option>O+</option>
          <option>O-</option>
          </select>
          </div>

          <div class="d-flex d-inline-flex col">
          <label for="rh" class="label_fix">Fator RH:</label>
            <select type="text" class="form-control-sm validate" name="rh">
            <option value="" selected>Selecione</option>  
            <option>Positivo</option>
            <option>Negativo</option>
            </select>
          </div>

          <div class="d-flex d-inline-flex col">
          <label for="rh" class="label_fix">C.R.:</label>
            <select type="text" class="form-control-sm validate form_cr--cor" name="rh">
            <option value="" selected>Selecione</option>  
            <option>Imediato</option>
            <option>10 minutos</option>
            <option>60 minutos</option>
            <option>120 minutos</option>
            <option>240 minutos</option>
            </select>
          </div>

          <div class="col">
          <label for="justificativa" class="label_fix">Justificativa do Atendimento:</label>
          <textarea name="justificativa" id="idJustificativa" cols="30" rows="10" class="form-control-sm w-100 mt-2"></textarea>
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
          </div>

          <div class="container form_nascimento mb-3 mt-3">
            <h3>Informações de Nascimento</h3>
          </div>

          <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">I.G.N.:</label>
          <input class="form-control-sm w-10 me-2">
          Semanas
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Peso ao Nascer:</label>
          <input class="form-control-sm w-10 me-2">
          Kg
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Apgar 1º minuto:</label>
          <input class="form-control-sm w-10 me-2">
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Apgar 5º minuto:</label>
          <input class="form-control-sm w-10 me-2 text-center">
        </div>

        <div class="col">
          <label for="justificativa" class="label_fix">Alimentação na Alta:</label>
          <textarea name="justificativa" id="idJustificativa" cols="30" rows="10" class="form-control-sm w-100 mt-2" placeholder="Não Informado"></textarea>
          </div>

          

        <div class="mt-2 mb-5 d-flex justify-content-end gap-2"> 
        <a href="http://172.17.34.254:1200/projetos/202100002/projetointegrador/assets/pages/triagem/" class="px-8 pt-2 pb-2 text-decoration-none botao_submit">
          <img src="../../icones/cancelar-branco.svg" alt="cancelar.svg">Cancelar
        </a>
        
        <button class="px-8 pt-2 pb-2 botao_submit" type="button">
        <a href="#" class="botao_submit--f">
          <img src="../../icones/adicionar.svg" alt="adicionar.svg">
          Salvar
          </a>
        </button>

      </div>

      </form>


    </div>


  </div>

  <!------------------------------>

  <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="../../js/triagem/triagem_form.js"></script>
  <script src="./../../js/triagem/pressaoArterial/validaPressao.js"></script>


</body>

</html>