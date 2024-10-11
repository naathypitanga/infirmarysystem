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
    <title>Gerenciamento dos Grupos de Serviço</title>
    <!-- Stylesheet Bootstrap -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Stylesheet Manual -->
    <link rel="stylesheet" href="../../css/reset.css">
    <link rel="stylesheet" href="../../css/root.css">
    <link rel="stylesheet" href="../../css/cadastroDeUsuarios.css">
    <!-- Stylesheet Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100;8..144,200;8..144,300;8..144,400;8..144,500;8..144,600;8..144,700;8..144,800;8..144,900;8..144,1000&display=swap" rel="stylesheet">
</head>

<body>

    <!---------MENU LATERAL DESKTOP---------->

    <?php 
        if (isset($_SESSION['unidade']) && $_SESSION['unidade'] != 'CADUSER') {
            include('../sidebar/sidebar.php'); 
        }
    ?>

    <!---------NAVBAR---------->

    <?php include('../header/header.php'); ?>

    <!---------PARTE INTERNA DA TELA---------->



    <div class="container d-flex mx-auto" id="homeGerenciamento">
        <div class="container_geral mx-2 mt-4">
            <div class="d-grid mx-3 mt-3 gap-2 text-white">
                <?php include('../../php/cadastroDeUsuario/generatePermissoes.php') ?>


                <div class="mt-2 mb-5 d-flex justify-content-end gap-2">
                    <a href="index.php" class="px-8 pt-2 pb-2 text-decoration-none botao_submit">
                        <img src="../../icones/cancelar-branco.svg" alt="cancelar.svg">Voltar
                    </a>

                    <button class="px-8 pt-2 pb-2 botao_submit">
                        <a href="gerenciamento-cadastro.php" class="text-decoration-none text-white">
                        <img src="../../icones/adicionar.svg" alt="adicionar.svg">
                        Adicionar
                        </a>
                    </button>
                </div>
            </div>

            <a id="backToTopButton" href="#homeGerenciamento">
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
    <?php createModalWarnings()?>

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