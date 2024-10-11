<?php
require_once("../../php/util.php");
require_once('../../php/login/validNotLogged.php');
if (isset($_GET['unid'])) {
  $_SESSION['unidade'] = $_GET['unid'];
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo ($_SESSION['unidade']) ?></title>
  <!-- Stylesheet Bootstrap -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Stylesheet Manual -->
  <link rel="stylesheet" href="../../css/reset.css">
  <link rel="stylesheet" href="../../css/root.css">
  <link rel="stylesheet" href="../../css/dashboard.css">
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

  <!-- Conteúdo -->
  <div class="container main pt-4">
    <div class="row row-cols-2 row-cols-md-3 mt-5 botao_texto botao_categorias--img">
      <div class="col d-flex justify-content-center align-items-start">
        <a class="d-flex flex-column align-items-center botao_hover" href="../recepcao/index.php" data-toggle="tooltip" data-placement="top" title="Recepção">
          <img src="../../icones/recepcao.svg" alt="recepcao.svg">
          Recepção
        </a>
      </div>
      <div class="col d-flex justify-content-center align-items-start">
        <a class="d-flex flex-column align-items-center text-center botao_hover" href="../historicodaunidade/index.php" data-toggle="tooltip" data-placement="top" title="Histórico da Unidade">
          <img src="../../icones/historico-da-unidade.svg" alt="historico-da-unidade.svg">
          Histórico da <br> Unidade
        </a>
      </div>
      <div class="col pt-4 pt-md-0 d-flex justify-content-center align-items-start">
        <a class="d-flex flex-column align-items-center text-center botao_hover" href="../triagem/" data-toggle="tooltip" data-placement="top" title="Triagem de Consultas">
          <img src="../../icones/triagem-de-consultas.svg" alt="triagem-de-consultas.svg">
          Triagem de <br> Consultas
        </a>
      </div>
      <div class="col pt-4 d-flex justify-content-center align-items-start">
        <a class="d-flex flex-column align-items-center text-center botao_hover" href="../atendConsultas/index.php" data-toggle="tooltip" data-placement="top" title="Atendimento de Consultas">
          <img src="../../icones/atendimento-de-consultas.svg" alt="atendimento-de-consultas.svg">
          Atendimento <br> de Consultas
        </a>
      </div>
      <div class="col pt-4 d-flex justify-content-center align-items-start">
        <a class="d-flex flex-column align-items-center botao_hover" href="../estoque/" data-toggle="tooltip" data-placement="top" title="Estoque">
          <img src="../../icones/estoque.svg" alt="estoque.svg">
          Estoque
        </a>
      </div>
      <div class="col pt-4 d-flex justify-content-center align-items-start ">
        <a class="d-flex flex-column align-items-center text-center botao_hover" href="../cadastroDeUsuarios/index.php" data-toggle="tooltip" data-placement="top" title="Cadastro de Usuários">
          <img src="../../icones/cadastro-de-usuarios.svg" alt="cadastro-de-usuarios.svg">
          Cadastro de <br> Usuários
        </a>
      </div>
    </div>
  </div>
  </div>

</body>

</html>