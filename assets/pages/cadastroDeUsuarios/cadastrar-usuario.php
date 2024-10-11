<?php
require('../../php/util.php');
include('../../seaLibrary/seaLibrary.php');

require_once('../../php/login/validNotLogged.php');

if(isset($_GET['id'])){
    $sqlUser = "SELECT * FROM tbl_usuarios WHERE CPF = '".$_GET['id']."'";
    $queryUser = mysqli_query($conexao, $sqlUser);
    $edt = mysqli_fetch_assoc($queryUser);

    $nomeCompleto = $edt['nomeCompleto'];
    $nomeSocial = $edt['nomeSocial'];
    $email = $edt['email'];
    $cpfClass = 'style= "display: none!important;"';
    $cpf = $_GET['id'];
    $cns = $edt['CNS'];
    $cnsClass = 'style= "display: none!important;"';
    $telefone = $edt['Telefone'];
    $endereco = $edt['endereco'];
    $edit = true;

}else{
  $edit = false;
    $nomeCompleto = '';
    $nomeSocial = '';
    $cpfClass = 'text';
    $cpf= '';
    $cnsClass = 'text';
    $email = '';
    $cns = '';
    $telefone = '';
    $endereco = '';
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Usuários</title>
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
  <script>
    jQuery(function($) {
      $("#cns").mask("000.000.000.000");
    });
  </script>
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



  <div class="container d-flex mx-auto" id="homeCadUsuario">
    <div class="container_geral mx-2 mt-4">

      <form class="d-grid mx-3 mt-3 gap-3 text-white formulario_sombra formulario_nome--sombra row" id="formPesquisa" method="POST" action="../../php/cadastroDeUsuario/add.php">

        <div class="container formulario_divisoria mb-3 mt-0">
          <h3>Cadastro de Usuários</h3>
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Grupo de Serviço:</label>
          <select type="select" class="form-control-sm w-100 col" placeholder="Digite o grupo de serviço" id="col6_filter" name="grpService">
            <?php
            include('../../php/cadastroDeUsuario/selectGrpService.php');
            ?>
          </select>
          <button class="ms-2 botao_acao" type="button">
            <!-- <a href="../../php/cadastroDeUsuario/add.php" class="text-decoration-none text-white"> -->
            <a href="gerenciamento-cadastro.php" class="text-decoration-none text-white">
              <img src="../../icones/adicionar.svg" alt="adicionar.svg">
            </a>
          </button>

        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Nome Completo:</label>
          <input type="text" value="<?php echo $nomeCompleto;
                                    if (isset($_SESSION['info']) && isset($_SESSION['info']['nmCompleto'])) {
                                      echo ($_SESSION['info']['nmCompleto']);
                                    }
                                    ?>" class="form-control-sm w-100 col" placeholder="Digite o nome do usuário" id="" name="nmCompleto">
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Nome Social:</label>
          <input type="text" value="<?php echo $nomeSocial ?>" class="form-control-sm w-100 col" placeholder="Digite o nome social do usuário" id="" name="nmSocial">
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">E-mail:</label>
          <input type="text" class="form-control-sm w-100 col" value="<?php echo $email;
                                                                      if (isset($_SESSION['info']) && isset($_SESSION['info']['email'])) {
                                                                        echo ($_SESSION['info']['email']);
                                                                      }
                                                                      ?>" placeholder="Digite o e-mail do usuário" id="" name="email">
        </div>

        <div class="formulario_nome d-flex d-inline-flex col" <?php echo $cpfClass ?>>
          <label class="label_fix">CPF:</label>
          <input type="text" <?php echo cpfMask()?> value="<?php echo $cpf;
                                                            if (isset($_SESSION['info']) && isset($_SESSION['info']['cpf'])) {
                                                              echo ($_SESSION['info']['cpf']);
                                                            }
                                                            ?>" class="form-control-sm w-100 col" placeholder="Digite o CPF do usuário" id="" name="cpf">
        </div>

        <input type="hidden" name="edit" value="<?php echo $edit; ?>">

        <div class="d-flex d-inline-flex col" <?php echo $cnsClass ?>>
          <label for="cns" class="label_fix">C.N.S.:</label>
          <input type="text" class="form-control-sm w-100 col validate" <?php echo cnsMask() ?> value="<?php echo $cns;
                                                                                                        if (isset($_SESSION['info']) && isset($_SESSION['info']['cns'])) {
                                                                                                          echo ($_SESSION['info']['cns']);
                                                                                                        }
                                                                                                        ?>" name="cns" id="cns" placeholder="000.000.000.000">
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Telefone:</label>
          <input type="text" class="form-control-sm w-100 col" <?php echo phoneMask() ?> placeholder="(00) 0 0000-0000" value="<?php echo $telefone;
                                                                                                                                if (isset($_SESSION['info']) && isset($_SESSION['info']['celPhone'])) {
                                                                                                                                  echo ($_SESSION['info']['celPhone']);
                                                                                                                                }
                                                                                                                                ?>" id="" name="celPhone">
        </div>

        <div class="formulario_nome d-flex d-inline-flex col">
          <label class="label_fix">Endereço:</label>
          <input class="form-control-sm w-100 col" <?php echo cidadeInput(); ?> value= "<?php echo $endereco; ?> ">

        </div>

        <div class="mt-2 mb-5 d-flex justify-content-end gap-2">
          <a href="index.php" class="px-8 pt-2 pb-2 text-decoration-none botao_submit">
            <img src="../../icones/cancelar-branco.svg" alt="cancelar.svg">Cancelar
          </a>

          <button class="px-8 pt-2 pb-2 botao_submit">
            <img src="../../icones/adicionar.svg" alt="adicionar.svg">
            Salvar
            </a>
          </button>


        </div>

      </form>

      <a id="backToTopButton" href="#homeCadUsuario">
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

  </style>
  <!-- MASK -->
  <script src="jquery.js" type="text/javascript"></script>
  <script src="jquery.maskedinput.js" type="text/javascript"></script>
</body>

</html>
<?php
unset($_SESSION['info']);

?>