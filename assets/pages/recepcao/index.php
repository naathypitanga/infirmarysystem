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
  <title>Recepção</title>
  <!-- Stylesheet Bootstrap -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Stylesheet Manual -->
  <link rel="stylesheet" href="../../css/reset.css">
  <link rel="stylesheet" href="../../css/root.css">
  <link rel="stylesheet" href="../../css/recepcao.css">
  <!-- Stylesheet Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100;8..144,200;8..144,300;8..144,400;8..144,500;8..144,600;8..144,700;8..144,800;8..144,900;8..144,1000&display=swap" rel="stylesheet">
</head>
<body>

  <!-- Sidebar -->
  <?php include('../sidebar/sidebar.php'); ?>

  <!-- Header -->
  <?php include('../header/header.php'); ?>

  <!-- Main -->
  <div class="container d-flex mx-auto" id="homeRecep">
    <div class="container_geral mx-2 mt-4">
      <form class="d-grid mx-3 mt-3 gap-3 text-white formulario_sombra formulario_nome--sombra row" id="formPesquisa" action="../../php/recepcao/cadastraPaciente.php" method="POST">
        <!-- Informações do paciente -->
        <div class="container formulario_divisoria">
          <h3>Informações do Paciente</h3>
        </div>
        <input type="hidden" name="id" id="id" value="<?php 
          echo((isset($_SESSION['info']) && isset($_SESSION['info']['id'])) ? $_SESSION['info']['id'] : '')
        ?>">
        <div class="d-flex d-inline-flex col">
        <label for="horarioi" class="label_fix margem_mobile">Nome:</label>
        <input type="text" class="form-control-sm w-100 col validate" name="nome" id="nome" maxlength="56" placeholder="Digite o nome do paciente" value="<?php 
          echo((isset($_SESSION['info']) && isset($_SESSION['info']['nome'])) ? $_SESSION['info']['nome'] : '')
        ?>">
        </div>
        <div class="d-flex d-inline-flex col">
        <label for="horarioi" class="label_fix margem_mobile">Nome Social:</label>
        <input type="text" class="form-control-sm w-100 col validate" name="nomeS" id="nomeS" maxlength="56" placeholder="Digite o nome social do paciente" value="<?php 
          echo((isset($_SESSION['info']) && isset($_SESSION['info']['nomeS'])) ? $_SESSION['info']['nomeS'] : '')
        ?>">
        </div>
        <div class="d-flex d-inline-flex col">
        <label for="cns" class="label_fix margem_mobile">C.N.S.:</label>
        <input type="text" class="form-control-sm w-100 col validate" name="cns" id="cns" placeholder="000.000.000.000" onblur="buscaPaciente('cns')" value="<?php 
          echo((isset($_SESSION['info']) && isset($_SESSION['info']['cns'])) ? $_SESSION['info']['cns'] : '')
        ?>">
        </div>
        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix margem_mobile">CPF:</label>
          <input class="form-control-sm w-100 col" placeholder="000.000.000-00" name="cpf" id="cpf" onblur="buscaPaciente('cpf')" value="<?php 
            echo((isset($_SESSION['info']) && isset($_SESSION['info']['cpf'])) ? $_SESSION['info']['cpf'] : '')
          ?>">
        </div>
        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix margem_mobile">RG:</label>
          <input class="form-control-sm w-100 col" placeholder="00.000.000-0" name="rg" id="rg" value="<?php 
            echo((isset($_SESSION['info']) && isset($_SESSION['info']['rg'])) ? $_SESSION['info']['rg'] : '')
          ?>">
        </div> 
        <div class="d-flex d-inline-flex col">
          <label for="datan" class="label_fix margem_mobile">Data de Nascimento:</label>
          <input type="date" class="form-control-sm w-100 col validate js-date" name="datan" id="nascimento" maxlength="10" placeholder="00/00/0000" value="<?php 
            echo((isset($_SESSION['info']) && isset($_SESSION['info']['datan'])) ? $_SESSION['info']['datan'] : '')
          ?>">
        </div>

        <div class="d-flex d-inline-flex col">
          <label for="ciclov" class="label_fix margem_mobile">Ciclo de Vida:</label>
          <select type="text" class="form-control-sm w-100 col validate" name="cicloVida" id="ciclo">
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
          <label for="genero" class="label_fix margem_mobile">Gênero:</label>
          <select type="text" class="form-control-sm w-100 col validate" name="genero" id="genero">
            <option value="" selected>Selecione</option>   
            <option>Feminino</option>
            <option>Masculino</option>
            <option>Transexual Feminino</option>
            <option>Transexual Masculino</option>
          </select>
        </div>   
     
        <div class="d-flex d-inline-flex col">
          <label class="label_fix margem_mobile">Local de Atendimento:</label>
          <select class="form-control-sm w-100 col" name="localAtend" id="localAtend">
            <option>01 - UPA REGIONAL MATINHOS</option>
            <option>02 - UPA PRAIA GRANDE</option>
          </select>
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix margem_mobile">Município:</label>
          <select class="form-control-sm w-100 col" name="municipio" id="municipio">
            <option>MATINHOS - PR</option>
            <option>GUARATUBA - PR</option>
          </select>
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix margem_mobile">Un. Saúde de Origem:</label>
          <select class="form-control-sm w-100 col" name="unOrig" id="unOrig">
            <option>01 - UPA PRAIA GRANDE</option>
            <option>01 - UPA REGIONAL MATINHOS</option>
          </select>
        </div>
        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix margem_mobile">Telefone:</label>
          <input class="form-control-sm w-100 col"  placeholder="(00) 0 0000-0000" name="telefone" id="telefone" value="<?php 
            echo((isset($_SESSION['info']) && isset($_SESSION['info']['telefone'])) ? $_SESSION['info']['telefone'] : '')
          ?>">
        </div>
        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix margem_mobile">Nome da Mãe:</label>
          <input class="form-control-sm w-100 col" name="nomeMae" id="nomeMae" placeholder="Digite o nome da mãe do paciente" value="<?php 
            echo((isset($_SESSION['info']) && isset($_SESSION['info']['nomeMae'])) ? $_SESSION['info']['nomeMae'] : '')
          ?>" onblur="validResps()">
        </div>
        <div class="form-check form-check-inline ms-2">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox1">
          <label class="form-check-label mx-1" for="inlineCheckbox1">Mãe desconhecida</label>
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix margem_mobile">Nome do Pai:</label>
          <input class="form-control-sm w-100 col" name="nomePai" id="nomePai" placeholder="Digite o nome do pai do paciente" value="<?php 
            echo((isset($_SESSION['info']) && isset($_SESSION['info']['nomePai'])) ? $_SESSION['info']['nomePai'] : '')
          ?>" onblur="validResps()">
        </div>

        <div class="form-check form-check-inline ms-2">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox2">
          <label class="form-check-label mx-1" for="inlineCheckbox2">Pai desconhecido</label>
        </div>
        <div class="form-check form-check-inline ms-2 mb-3">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox3">
          <label class="form-check-label mx-1" for="inlineCheckbox3">Responsável</label>
        </div>
        <div id="divResp" class="hide_content">
          <div class="d-grid gap-3 text-white formulario_sombra formulario_nome--sombra row">
            <!-- Informações do responsável -->
            <div class="container formulario_divisoria mb-3 mt-3">
              <h3>Informações do Responsável</h3>
            </div>
            <input type="hidden" name="idResp" id="idResp" value="<?php 
              echo((isset($_SESSION['info']) && isset($_SESSION['info']['idResp'])) ? $_SESSION['info']['idResp'] : '')
            ?>">
            <div class="d-flex d-inline-flex col">
              <label for="horarioi" class="label_fix margem_mobile">Nome:</label>
              <input type="text" class="form-control-sm w-100 col validate" name="nomeResp" id="nomeResp" maxlength="56" placeholder="Digite o nome do responsável" value="<?php 
                echo((isset($_SESSION['info']) && isset($_SESSION['info']['nomeResp'])) ? $_SESSION['info']['nomeResp'] : '')
              ?>">
            </div>
  
            <div class="d-flex d-inline-flex col">
              <label for="cns" class="label_fix margem_mobile">C.N.S.:</label>
              <input type="text" class="form-control-sm w-100 col validate" name="cnsResp" id="cnsResp" placeholder="000.000.000.000" value="<?php 
                echo((isset($_SESSION['info']) && isset($_SESSION['info']['cnsResp'])) ? $_SESSION['info']['cnsResp'] : '')
              ?>">
            </div>
            <div class="formulario_nome d-flex d-inline-flex col">
              <label class="label_fix margem_mobile">CPF:</label>
              <input class="form-control-sm w-100 col" placeholder="000.000.000-00" name="cpfResp" id="cpfResp" value="<?php 
                echo((isset($_SESSION['info']) && isset($_SESSION['info']['cpfResp'])) ? $_SESSION['info']['cpfResp'] : '')
              ?>">
            </div>
            <div class="formulario_nome d-flex d-inline-flex col">
              <label class="label_fix margem_mobile">RG:</label>
              <input class="form-control-sm w-100 col" placeholder="00.000.000-0" name="rgResp" id="rgResp" value="<?php 
                echo((isset($_SESSION['info']) && isset($_SESSION['info']['rgResp'])) ? $_SESSION['info']['rgResp'] : '')
              ?>">
            </div>
            <div class="d-flex d-inline-flex col">
              <label for="datan" class="label_fix margem_mobile">Data de Nascimento:</label>
              <input type="date" class="form-control-sm w-100 col validate js-date" name="datanResp" id="nascimentoResp" maxlength="10" placeholder="00/00/0000" value="<?php 
                echo((isset($_SESSION['info']) && isset($_SESSION['info']['datanResp'])) ? $_SESSION['info']['datanResp'] : '')
              ?>">
            </div>
            
            <div class="d-flex d-inline-flex col">
              <label for="genero" class="label_fix margem_mobile">Gênero:</label>
              <select type="text" class="form-control-sm w-100 col validate" name="generoResp" id="generoResp">
                <option value="" selected>Selecione</option>   
                <option>Feminino</option>
                <option>Masculino</option>
                <option>Transexual Feminino</option>
                <option>Transexual Masculino</option>
              </select>
            </div>   
            <div class="formulario_nome d-flex d-inline-flex col mb-4">
              <label class="label_fix margem_mobile">Telefone:</label>
              <input class="form-control-sm w-100 col" placeholder="(00) 0 0000-0000" name="telefoneResp" id="telefoneResp" value="<?php 
                echo((isset($_SESSION['info']) && isset($_SESSION['info']['telefoneResp'])) ? $_SESSION['info']['telefoneResp'] : '')
              ?>">
            </div>
            <!-- Endereço do Responsável -->
            <div class="container formulario_divisoria">
              <h3>Endereço do Responsável</h3>
            </div>
  
            <input type="hidden" name="idEndResp" id="idEndResp" value="<?php 
              echo((isset($_SESSION['info']) && isset($_SESSION['info']['idEndResp'])) ? $_SESSION['info']['idEndResp'] : '')
            ?>">
            <div class="formulario_nome d-flex d-inline-flex col">
              <label class="label_fix margem_mobile">CEP:</label>
              <input class="form-control-sm w-100 col" name="cepResp" id="cepResp" placeholder="00000-000" value="<?php 
                echo((isset($_SESSION['info']) && isset($_SESSION['info']['cepResp'])) ? $_SESSION['info']['cepResp'] : '')
              ?>">
            </div>
            <div class="formulario_nome d-flex d-inline-flex col">
              <label class="label_fix margem_mobile">Rua:</label>
              <input class="form-control-sm w-100 col" name="ruaResp" id="ruaResp" value="<?php 
                echo((isset($_SESSION['info']) && isset($_SESSION['info']['ruaResp'])) ? $_SESSION['info']['ruaResp'] : '')
              ?>">
            </div>
            <div class="formulario_nome d-flex d-inline-flex col">
              <label class="label_fix margem_mobile">Número:</label>
              <input class="form-control-sm w-100 col" name="numResp" id="numResp" value="<?php 
                echo((isset($_SESSION['info']) && isset($_SESSION['info']['numResp'])) ? $_SESSION['info']['numResp'] : '')
              ?>" onblur="validResps()">
            </div>
            <div class="form-check form-check-inline ms-2">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox4Resp">
              <label class="form-check-label mx-1" for="inlineCheckbox4Resp">Sem número</label>
            </div>
            <div class="formulario_nome d-flex d-inline-flex col">
              <label class="label_fix margem_mobile">Bairro:</label>
              <input class="form-control-sm w-100 col" name="bairResp" id="bairResp" value="<?php 
                echo((isset($_SESSION['info']) && isset($_SESSION['info']['bairResp'])) ? $_SESSION['info']['bairResp'] : '')
              ?>">
            </div>
            <div class="formulario_nome d-flex d-inline-flex col">
              <label class="label_fix margem_mobile">Cidade:</label>
              <input class="form-control-sm w-100 col" name="cityResp" id="cityResp" value="<?php 
                echo((isset($_SESSION['info']) && isset($_SESSION['info']['cityResp'])) ? $_SESSION['info']['cityResp'] : '')
              ?>">
            </div>
            <div class="formulario_nome d-flex d-inline-flex col mb-3">
              <label class="label_fix margem_mobile">Estado:</label>
              <input class="form-control-sm w-100 col" name="estaResp" id="estaResp" value="<?php 
                echo((isset($_SESSION['info']) && isset($_SESSION['info']['estaResp'])) ? $_SESSION['info']['estaResp'] : '')
              ?>">
            </div>
          </div>
        </div>

        <!-- Endereço do Paciente -->
        <div class="container formulario_divisoria">
          <h3>Endereço do Paciente</h3>
        </div>
        <input type="hidden" name="idEnd" id="idEnd" value="<?php 
          echo((isset($_SESSION['info']) && isset($_SESSION['info']['idEnd'])) ? $_SESSION['info']['idEnd'] : '')
        ?>">
        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix margem_mobile">CEP:</label>
          <input class="form-control-sm w-100 col" name="cep" id="cep" placeholder="00000-000" value="<?php 
            echo((isset($_SESSION['info']) && isset($_SESSION['info']['cep'])) ? $_SESSION['info']['cep'] : '')
          ?>">
        </div>
        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix margem_mobile">Rua:</label>
          <input class="form-control-sm w-100 col" name="rua" id="rua" value="<?php 
            echo((isset($_SESSION['info']) && isset($_SESSION['info']['rua'])) ? $_SESSION['info']['rua'] : '')
          ?>">
        </div>
        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix margem_mobile">Número:</label>
          <input class="form-control-sm w-100 col" name="num" id="num" value="<?php 
            echo((isset($_SESSION['info']) && isset($_SESSION['info']['num'])) ? $_SESSION['info']['num'] : '')
          ?>" onblur="validResps()">
        </div>
        <div class="form-check form-check-inline ms-2">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox4">
          <label class="form-check-label mx-1" for="inlineCheckbox4">Sem número</label>
        </div>
        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix margem_mobile">Bairro:</label>
          <input class="form-control-sm w-100 col" name="bair" id="bair" value="<?php 
            echo((isset($_SESSION['info']) && isset($_SESSION['info']['bair'])) ? $_SESSION['info']['bair'] : '')
          ?>">
        </div>
        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix margem_mobile">Cidade:</label>
          <input class="form-control-sm w-100 col" name="city" id="city" value="<?php 
            echo((isset($_SESSION['info']) && isset($_SESSION['info']['city'])) ? $_SESSION['info']['city'] : '')
          ?>">
        </div>
        <div class="formulario_nome d-flex d-inline-flex col mb-3">
          <label class="label_fix margem_mobile">Estado:</label>
          <input class="form-control-sm w-100 col" name="esta" id="esta" value="<?php 
            echo((isset($_SESSION['info']) && isset($_SESSION['info']['esta'])) ? $_SESSION['info']['esta'] : '')
          ?>">
        </div>
        
        <!-- Botões -->
        <div class=" container mt-2 mb-5 d-flex justify-content-end gap-2"> 
          <a href="#" class="px-8 pt-2 pb-2 text-decoration-none botao_submit" onclick="cleanFormInformations()">
            <img src="../../icones/cancelar-branco.svg" alt="cancelar.svg">Cancelar
          </a>
          
          <button class="px-8 pt-2 pb-2 botao_submit">       
            <img src="../../icones/adicionar.svg" alt="adicionar.svg">
            Salvar
          </a>
        </button>
      </form>
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

  <!-- Gera o modal com as mensagens (sucesso, erro, etc) -->

  <?php createModalWarnings(); ?>

  
  <!-------- AJAX / MASK --------->
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
  
  <!-- Javascript Manual -->
  <script src="../../js/shered/scrollback.js"></script>
  <script src="../../js/recepcao/endereco.js"></script>
  <script src="../../js/recepcao/responsavel.js"></script>
  <script src="../../js/recepcao/paciente.js"></script>
  <script src="../../js/recepcao/buscaPaciente.js"></script>

  <script>
    $('#cns').mask('000.000.000.000');
    $('#cpf').mask('000.000.000-00');
    $('#rg').mask('00.000.000-0');
    $('#telefone').mask('(00) 0 0000-0000');
    $('#cnsResp').mask('000.000.000.000');
    $('#cpfResp').mask('000.000.000-00');
    $('#rgResp').mask('00.000.000-0');
    $('#telefoneResp').mask('(00) 0 0000-0000');
    $('#cep').mask('00000-000');
    $('#cepResp').mask('00000-000');
  </script>

</body>

</html>
<?php
  unset($_SESSION['info'])
?>