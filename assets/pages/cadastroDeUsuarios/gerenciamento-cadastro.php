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



    <div class="container d-flex mx-auto" id="homeGerenciamentoCad">
        <div class="container_geral mx-2 mt-4">
            <div class="d-grid mx-5 mt-5 gap-2 text-white texto_sombra">
                <div class="d-flex w-100 justify-content-center texto_sombra">
                    <h4>Adicionar Grupo de Serviço</h4>
                </div>
                <form action="../../php/cadastroDeUsuario/criarGrupo.php" method="post">
                    <hr class="linha">
    
                    <div class="d-flex d-inline-flex col mb-5">
                        <label class="label_fix margem_mobile" for="qtde">Nome:</label>
                        <input name="descricao" type="text" class="form-control-sm w-100 col" placeholder="Grupo de Serviço" required>
                    </div>
    
                    <div class="texto_permissoes">
                        <p>Permissões de usuário:</p>
                    </div>
    
                    <div>
                        <input class="form-check-input filter" type="checkbox" name="check1" value="cadEst" id="check1">
                        Permissão para cadastro de produtos
                    </div>
                    <div>
                        <input class="form-check-input filter" type="checkbox" name="check2" value="pagLog" id="check2">
                        Acesso à página de Log de usuário
                    </div>
                    <div>
                        <input class="form-check-input filter" type="checkbox" name="check3" value="histUn" id="check3">
                        Acesso ao histórico da unidade
                    </div>
                    <div>
                        <input class="form-check-input filter" type="checkbox" name="check4" value="triaCons" id="check4">
                        Acesso à triagem de consultas
                    </div>
                    <div>
                        <input class="form-check-input filter" type="checkbox" name="check5" value="atendCons" id="check5">
                        Acesso ao atendimento de consultas
                    </div>
                    <div>
                        <input class="form-check-input filter" type="checkbox" name="check6" value="recp" id="check6">
                        Acesso à página de recepção
                    </div>
                    <div>
                        <input class="form-check-input filter" type="checkbox" name="check7" value="gerGrup" id="check7">
                        Acesso ao gerenciamento de grupos
                    </div>
                    <div>
                        <input class="form-check-input filter" type="checkbox" name="check8" value="cadUser" id="check8">
                        Acesso ao cadastro de usuário
                    </div>
                    <div>
                        <input class="form-check-input filter" type="checkbox" name="check9" value="movEst" id="check9">
                        Permissão para movimentar o estoque
                    </div>
                    <div>
                        <input class="form-check-input filter" type="checkbox" name="check10" value="estUB" id="check10">
                        Acesso ao estoque da UBS
                    </div>
                    <div>
                        <input class="form-check-input filter" type="checkbox" name="check11" value="estG" id="check11">
                        Acesso ao estoque geral
                    </div>
                    <div>
                        <input class="form-check-input filter" type="checkbox" name="check12" value="estUP" id="check12">
                        Acesso ao estoque da UPA
                    </div>
    
                    <div class="mt-2 mb-5 d-flex botao_mobile botao_desktop gap-2">
                        <a href="gerenciamento-usuario.php" class="px-8 pt-2 pb-2 text-decoration-none botao_submit">
                            <img src="../../icones/cancelar-branco.svg" alt="cancelar.svg">Cancelar
                        </a>
    
                        <button class="px-8 pt-2 pb-2 botao_submit">
                            <img src="../../icones/adicionar.svg" alt="adicionar.svg">
                            Salvar
                            </a>
                        </button>
                    </div>
                </form>
            </div>

            <a id="backToTopButton" href="#homeGerenciamentoCad">
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