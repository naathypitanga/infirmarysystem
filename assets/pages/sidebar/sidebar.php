<?php
ob_start();
  $url = $_SERVER['REQUEST_URI'];

  $iconeDasboard = strpos($url, '/pages/dashboard') ? "../../icones/dashboard-select.svg" : "../../icones/dashboard.svg";
  $iconeTriagem = strpos($url, '/pages/triagem') ? "../../icones/triagem-de-consultas-select.svg" : "../../icones/triagem-de-consultas.svg";
  $iconeEstoque = strpos($url, '/pages/estoque') ? "../../icones/estoque-select.svg" : "../../icones/estoque.svg";
  $iconeAtendConsultas = strpos($url, '/pages/atendConsultas') ? "../../icones/atendimento-de-consultas-select.svg" : "../../icones/atendimento-de-consultas.svg";
  $iconeRecep = strpos($url, '/pages/recepcao') ? "../../icones/recepcao-select.svg" : "../../icones/recepcao.svg";
  $iconeHistorico = strpos($url, '/pages/historicodaunidade') ? "../../icones/historico-da-unidade-select.svg" : "../../icones/historico-da-unidade.svg";
  $iconeUserCad = strpos($url, '/pages/cadastroDeUsuarios') ? "../../icones/cadastro-de-usuarios-select.svg" : "../../icones/cadastro-de-usuarios.svg";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sidebar</title>
  <!-- Stylesheet do bootstrap -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" />
  <!-- Stylesheet Manual -->
  <link rel="stylesheet" href="../../css/reset.css">
  <link rel="stylesheet" href="../../css/root.css">
  <link rel="stylesheet" href="../../css/sidebar.css" />
</head>

<body>
  <div class="sidebar_prioridade flex-column bg-white h-100 align-items-center position-fixed d-lg-flex d-none">
    <ul class="nav flex-column px-2">
      <li class="nav-item menu_dashboard--options">
        <a href="../dashboard">
          <button type="button" class="bg-transparent border-0 mt-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard">
            <img class="icone_tamanho botao_sombra align-middle" src="<?php echo $iconeDasboard; ?>" alt="" />
          </button>
        </a>
      </li>
      <hr class="linha m-0" />
      <li class="nav-item menu_dashboard--options">
        <a href="../recepcao">
          <button type="button" class="bg-transparent border-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Recepção">
            <img class="icone_tamanho botao_sombra" src="<?php echo ($iconeRecep) ?>" alt="Recepção" />
          </button>
        </a>
      </li>
      <hr class="linha m-0" />
      <li class="nav-item menu_dashboard--options">
        <a href="../historicodaunidade">
          <button type="button" class="bg-transparent border-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Histórico da Unidade">
            <img class="icone_tamanho botao_sombra" src="<?php echo ($iconeHistorico) ?>" alt="historico-da-unidade.svg" />
          </button>
        </a>
      </li>
      <hr class="linha m-0" />
      <li class="nav-item menu_dashboard--options">
        <a href="../triagem">
          <button type="button" class="bg-transparent border-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Triagem de Consultas">
            <img class="icone_tamanho botao_sombra" src="<?php echo $iconeTriagem ?>" alt="Triagem de consultas" />
          </button>
        </a>
      </li>
      <hr class="linha m-0" />
      <li class="nav-item menu_dashboard--options">
        <a href="../atendConsultas">
          <button type="button" class="bg-transparent border-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Atendimento de Consultas">
            <img class="icone_tamanho botao_sombra" src="<?php echo ($iconeAtendConsultas) ?>" alt="Atendimento de consultas" />
          </button>
        </a>
      </li>
      <hr class="linha m-0" />
      <li class="nav-item menu_dashboard--options">
        <a href="../estoque">
          <button type="button" class="bg-transparent border-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Estoque">
            <img class="icone_tamanho botao_sombra" src="<?php echo $iconeEstoque; ?>" alt="Estoque" />
          </button>
        </a>
      </li>
      <hr class="linha m-0" />
      <li class="nav-item menu_dashboard--options">
        <a href="../cadastroDeUsuarios">
          <button type="button" class="bg-transparent border-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Cadastro de Usuários">
            <img class="icone_tamanho botao_sombra" src="<?php echo $iconeUserCad; ?>" alt="Cadastro de usuários" />
          </button>
        </a>
      </li>
      <hr class="linha m-0" />
      <li class="nav-item menu_dashboard--options">
        <a href="../seletordeunidademobile">
          <button type="button" class="bg-transparent border-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Seleção de Unidade">
            <img class="icone_tamanho botao_sombra" src="../../icones/selecao-de-unidade.svg" alt="Seleção de unidade" />
          </button>
        </a>
      </li>
    </ul>
  </div>
  
  <!-- Menu mobile -->
  <script src="../header/menu.js"></script>
</body>

</html>