<?php
require('../../php/util.php');


require_once('../../php/login/validNotLogged.php');

$generos = ['masculino', 'masculino'];

$genero = $generos[rand(0, 1)];

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Triagem do Paciente</title>
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

  <!------------------------>


  <!---------PARTE INTERNA DA TELA---------->

  <div class="container d-flex mx-auto" id="homeTriagemCadastro">
    <div class="container_geral mx-2 mt-4">
      <form method="post" action="../../php/triagem/newTriagem.php" class="d-grid mx-3 mt-5 gap-3 text-white formulario_sombra formulario_nome--sombra row" id="formPesquisa">
        <input type="hidden" value="<?php echo $_GET ['id'] ?>" name="id">
        <div class="d-flex d-inline-flex col formulario_nome">
          <label class="label_fix">Prof. da Triagem:</label>
          <input type="text" list="professional" class="form-control-sm w-100 col column_filter" placeholder="Digite o nome do profissional" name="nomeProf" value="<?php echo ($_SESSION['user']['nomeCompleto']) ?>" readonly>
          <datalist id="professional" name="Profissional">
            <?php include('../../php/triagem/selectProf.php') ?>
          </datalist>
        </div>

        <div class="d-flex d-inline-flex col formulario_nome">
          <label class="label_fix">Especialidade:</label>
          <input type="text" list="especialidade" class="form-control-sm w-100 col column_filter" placeholder="Digite o nome da especialidade" name="especialidade" value="<?php echo (mysqli_fetch_assoc(mysqli_query($conexao, "select * from tbl_cargo where ID_cargo = '" . $_SESSION['user']['ID_cargo'] . "'"))['descricao']) ?>" disabled>
          <datalist id="especialidade" name="Especialidade">
            <?php include('../../php/triagem/selectProf.php') ?>
          </datalist>
        </div>

        <div class="d-flex d-inline-flex col chainMe">
          <label for="arterial" class="label_fix">Pressão Arterial:</label>
          <input name="pressao1" type="text" class="form-control-sm w-10 me-2 validate chainMe" maxlength="5" onkeypress="return isNumber(event)" id="idPas" onblur="validAndCalc()" onkeyup="calcHipertensao()">
          /
          <input name="pressao2" type="text" class="form-control-sm w-10 mx-2 validate" maxlength="5" id="idPad" onblur="validAndCalc()" onkeyup="calcHipertensao()">
          mmHg
        </div>

        <div class="d-flex d-inline-flex col">
          <label for="ciclov" class="label_fix">Posição da PA:</label>
          <select type="text" class="form-control-sm w-100 col validate" name="posicaoPA">
            <option value="" selected>Selecione</option>
            <option value="01 - Ortostática">01 - Ortostática</option>
            <option value="02 - Sentado">02 - Sentado</option>
            <option value="03 - Decúbito Dorsal">03 - Decúbito Dorsal</option>
            <option value="04 - Decúbito Ventral">04 - Decúbito Ventral</option>
            <option value="05 - Decúbito Lateral">05 - Decúbito Lateral</option>
            <option value="06 - Sims">06 - Sims</option>
            <option value="07 - Fowler">07 - Fowler</option>
            <option value="08 - Ginecológica">08 - Ginecológica</option>
            <option value="09 - Litotômica">09 - Litotômica</option>
            <option value="10 - Genupeitoral">10 - Genupeitoral</option>
            <option value="11 - Tredelenbug">11 - Tredelenbug</option>
            <option value="12 - Kraske">12 - Kraske</option>
          </select>
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Grau de Hipertensão:</label>
          <input name="grauHipertensao" class="form-control-sm w-100 col" id="idCalcHiper" readonly onkeyup="calcHipertensao()" placeholder="cálculo">
        </div>

        <div class="d-flex d-inline-flex col chainMe">
          <label for="arterial" class="label_fix">Peso/Altura:</label>
          <input name="peso" type="text" class="form-control-sm w-10 me-2 validate chainMe" id="idPeso" maxlength="5" onblur="imc()">
          Kg

          <input type="text" class="form-control-sm w-10 mx-2 ms-5 validate chainMe" id="idAltura" maxlength="3" onblur="imc()">
          cm
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">I.M.C.:</label>
          <input name="altura" class="form-control-sm w-100 col" readonly placeholder="cálculo" id="resultImc">
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Superf. Corporal:</label>
          <input name="superf" class="form-control-sm w-25 me-2" placeholder="cálculo" id="superf">
          m²
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Pulsação Arterial:</label>
          <input name="pulsacaoArterial" class="form-control-sm w-25 me-2">
          /min
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Freq. Respiratória:</label>
          <input name="freqRespiratoria" class="form-control-sm w-25 me-2">
          /min
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Risco Co-morb.:</label>
          <input name="riscoComorb" class="form-control-sm w-25" placeholder="cálculo">
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Est. Nutri.:</label>
          <input name="estNutri" class="form-control-sm w-25" placeholder="cálculo">
        </div>

        <div class="d-flex d-inline-flex col chainMe">
          <label for="arterial" class="label_fix">Cintura/Quadril:</label>
          <input name="cintura" type="text" class="form-control-sm w-10 me-2 validate chainMe" maxlength="5" id="cint" onblur="calcularIcq('<?php echo ($genero); ?>')" onkeypress="return isNumber(event)">
          cm

          <input name="quadril" type="text" class="form-control-sm w-10 mx-2 ms-5 validate chainMe" maxlength="3" id="quad" onblur="calcularIcq('<?php echo ($genero); ?>')" onkeypress="return isNumber(event)">
          cm
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">I.C.Q.:</label>
          <input name="icq" class="form-control-sm w-25" placeholder="cálculo" id="calcIcq">
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Perímetro Cefálico:</label>
          <input name="perimetroCefalico" class="form-control-sm w-25 me-2">
          cm
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Glicemia Capilar:</label>
          <input name="glicemiaCapilar" class="form-control-sm w-25 me-2">
          mg/dl
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Momento da coleta:</label>
          <select name="momentoColeta" type="text" class="form-control-sm validate" name="coleta">
            <option value="" selected>Selecione</option>
            <option value="jejum">Jejum</option>
            <option value="Pré-Prandial">Pré-Prandial</option>
            <option value="Pós-Prandial">Pós-Prandial</option>
            <option value="Não definido">Não definido</option>
          </select>
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Saturação (SpO2):</label>
          <input name="saturacao" class="form-control-sm w-10 me-2">
          0 a 100
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Temperatura:</label>
          <input name="temperatura" class="form-control-sm w-10 me-2">
          °C
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">HDL:</label>
          <input name="hdl" class="form-control-sm w-10 me-2">
          mg/dl
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Triglicerídeos:</label>
          <input name="triglicerideos" class="form-control-sm w-10 me-2">
          mg/dl
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">LDL:</label>
          <input name="ldl" class="form-control-sm w-10 me-2">
          mg/dl
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Hemoglobina Glicada:</label>
          <input name="hemoglobina" class="form-control-sm w-10 me-2">
          %
        </div>

        <div class="d-flex d-inline-flex col">
          <label for="sangue" class="label_fix">Tipo Sanguíneo:</label>
          <select name="tipoSanguineo" type="text" class="form-control-sm validate">
            <option value="" selected>Selecione</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="AB">AB</option>
            <option value="O">O</option>
          </select>
        </div>

        <div class="d-flex d-inline-flex col">
          <label for="rh" class="label_fix">Fator RH:</label>
          <select type="text" class="form-control-sm validate" name="rh">
            <option value="" selected>Selecione</option>
            <option value="Positivo">Positivo</option>
            <option value="Negativo">Negativo</option>
          </select>
        </div>

        <div class="d-flex d-inline-flex col">
          <label for="rh" class="label_fix">C.R.:</label>
          <select type="text" class="form-control-sm validate form_cr--cor" name="cr">
            <option value="" selected>Selecione</option>
            <option value="Imediato">Imediato</option>
            <option value="10 minutos">10 minutos</option>
            <option value="60 minutos">60 minutos</option>
            <option value="120 minutos">120 minutos</option>
            <option value="240 minutos">240 minutos</option>
          </select>
        </div>

        <div class="d-flex d-inline-flex col">
          <label for="sangue" class="label_fix">Especialidade:</label>
          <select type="text" class="form-control-sm validate" name="especialidade">
            <option value="" selected>Selecione</option>
            <option value="Pediatra">Pediatra</option>
            <option value="Clínico Geral">Clínico Geral</option>
            <option value="Geriatra">Geriatra</option>
          </select>
        </div>

        <div class="col">
          <label for="justificativa" class="label_fix">Justificativa do Atendimento:</label>
          <textarea name="justificativa" id="idJustificativa" cols="30" rows="10" class="form-control-sm w-100 mt-2"></textarea>
        </div>

        <div>

          <div class="form-check form-check-inline">
            <input value="1" name="diarreia" class="form-check-input" type="checkbox" id="inlineCheckbox1">
            <label class="form-check-label mx-1" for="inlineCheckbox1">Diarréia</label>
          </div>

          <div class="form-check form-check-inline">
            <input value="1" name="dorToracica" class="form-check-input" type="checkbox" id="inlineCheckbox1">
            <label class="form-check-label mx-1" for="inlineCheckbox1">Dor Torácica</label>
          </div>
        </div>

        <div class="container formulario_divisoria mb-3 mt-3">
          <h3>Informações de Nascimento</h3>
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">I.G.N.:</label>
          <input name="ign" class="form-control-sm w-10 me-2">
          Semanas
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Peso ao Nascer:</label>
          <input name="pesoAoNascer" class="form-control-sm w-10 me-2">
          Kg
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Apgar 1º minuto:</label>
          <input name="priMinuto" class="form-control-sm w-10 me-2">
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Apgar 5º minuto:</label>
          <input name="quiMinuto" class="form-control-sm w-10 me-2 text-center">
        </div>

        <div class="col">
          <label for="justificativa" class="label_fix">Alimentação na Alta:</label>
          <textarea name="alimentacaoAlta" id="idJustificativa" cols="30" rows="10" class="form-control-sm w-100 mt-2" placeholder="Não Informado"></textarea>
        </div>

        <div class="mt-2 mb-5 d-flex justify-content-end gap-2">
          <a href="http://172.17.34.254:1200/projetos/202100002/projetointegrador/assets/pages/triagem/" class="px-8 pt-2 pb-2 text-decoration-none botao_submit">
            <img src="../../icones/cancelar-branco.svg" alt="cancelar.svg">Cancelar
          </a>

          <button class="px-8 pt-2 pb-2 botao_submit" type="submit">
              <img src="../../icones/adicionar.svg" alt="adicionar.svg">
              Salvar    
          </button>

        </div>

      </form>

      <a id="backToTopButton" href="#homeTriagemCadastro">
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="20" cy="20" r="20" fill="#6ea8fe"/>
            <path d="M20 27V13" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M13 20L20 13L27 20" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>  
    </a>

    </div>


  </div>

  <!------------------------------>

  <script src="../../js/shered/scrollback.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="../../js/triagem/triagem_form.js"></script>
  <script src="./../../js/triagem/pressaoArterial/validaPressao.js"></script>
  <script src="./../../js/triagem/icq/calcIcq.js"></script>


</body>

</html>