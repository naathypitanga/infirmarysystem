<?php
include('../../php/util.php');
require_once('../../php/login/validNotLogged.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Seleção de unidade</title>
  <!-- Stylesheet Bootstrap -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" />
  <!-- Stylesheet Manual -->
  <link rel="stylesheet" href="../../css/reset.css">
  <link rel="stylesheet" href="../../css/root.css">
  <link rel="stylesheet" href="../../css/seletordeunidade.css" />
  <!-- Stylesheet google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100;8..144,200;8..144,400;8..144,500;8..144,600&display=swap" rel="stylesheet" />
</head>

<body>
  <!----------NAVBAR MOBILE/DESKTOP---------->

  <?php include('../header/header.php'); ?>

  <!-- Conteúdo -->

  <div class="container d-flex">
    <div class="row row-cols-2 botao_texto mt-5">
      <div>
        <div class="col mt-5">
          <button type="button" class="botao_categorias" id="upa" data-toggle="tooltip" data-placement="top" title="UPA">
            <img class="botao_categorias--img" src="../../icones/upa.svg" alt="upa.svg" />
            <h1>UPA</h1>
          </button>

          <div class="col mt-5">
            <button type="button" class="botao_categorias" id="estoque" data-toggle="tooltip" data-placement="top" title="Estoque">
              <img class="botao_categorias--img" src="../../icones/estoque.svg" alt="estoque.svg" />
              <h1>Estoque</h1>
            </button>
          </div>
        </div>

      </div>

      <div>

        <div class="col mt-5">
          <button type="button" class="botao_categorias" id="ubs" data-toggle="tooltip" data-placement="top" title="UBS">
            <img class="botao_categorias--img" src="../../icones/ubs.svg" alt="ubs.svg" />
            <h1>UBS</h1>
          </button>
        </div>

        <div class="col mt-5">
          <button type="button" class="botao_categorias" id="cadUser" data-toggle="tooltip" data-placement="top" title="Cadastro de Usuários">
            <img class="botao_categorias--img" src="../../icones/cadastro-de-usuarios.svg" alt="cadastro-de-usuarios.svg" />
            <h1>Cadastro de <br> Usuários</h1>
          </button>
        </div>
      </div>
    </div>
  </div>
  <script>
    document.querySelector('#upa').addEventListener('click', () => {
      window.location.href = '../dashboard/?unid=UPA'
    })
    document.querySelector('#ubs').addEventListener('click', () => {
      window.location.href = '../dashboard/?unid=UBS'
    })
    document.querySelector('#estoque').addEventListener('click', () => {
      window.location.href = '../estoque/?unid=ESTOQUE'
    })
    document.querySelector('#cadUser').addEventListener('click', () => {
      window.location.href = '../cadastroDeUsuarios/?unid=CADUSER'
    })
  </script>
</body>

</html>