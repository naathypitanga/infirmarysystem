<!-- Chama o .php que cria as notificações -->
<?php 
ob_start();
require('../../php/permissoes/permissoes.php');
require('../../php/correcoes/correcao.php');
require('../../php/notificacao/createNoti.php');
require_once('../../php/login/validNotLogged.php');


$user = md5($_SESSION["user"]["CPF"]);  //captura o cpf do usuário logado
$countSQL = "SELECT * FROM `tbl_notificacao` WHERE visualizado = 0 AND user_id = '$user'"; //procura as notif não visualizadas
$countQuery = mysqli_query($conexao, $countSQL); //executa a query

$queryFoto = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT foto from tbl_usuarios WHERE CPF = '" . $_SESSION["user"]["CPF"] . "'"));

if ($queryFoto['foto'] <> NULL) {
  $imagem = "../../php/userConfig/uploads/" . $_SESSION["user"]["CPF"] . ".jpeg";
} else {
  $imagem = "../../icones/perfil-branco.svg";
}

$count = $countQuery->num_rows; //captura o número de linhas das notif não visualizadas

if ($count > 0) {
  $classNot = ""; //se houver mais de 0 notif não visualizadas mantém o badge de contagem invísivel 
} elseif ($count == 0) {
  $classNot = "hdr-notification-badge"; //se for igual a 0 notif não visualizadas deixa o badge visível 
};
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Header</title>
  <!-- Stylesheet do bootstrap -->
  <link rel="stylesheet" href="../../css/reset.css">
  <link rel="stylesheet" href="../../css/root.css">
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" />
  <!-- Stylesheet manual -->
  <link rel="stylesheet" href="../../css/reset.css">
  <link rel="stylesheet" href="../../css/root.css">
  <link rel="stylesheet" href="../../css/header.css" />
  <!-- Stylesheets fonte (Google Fonts) -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100;8..144,200;8..144,400;8..144,500;8..144,600&display=swap" rel="stylesheet" />
  <!-- Neste documento se encontra apenas o header da aplicação, que será chamado via 'include'. Os ícones vêm da pasta 'icones'.-->
</head>

<body>
  <header>
    <nav class="hdr" id="navigationBar">
      <div class="navbar p-0 justify-content-between ms-2 me-5">
        <button onclick="openMenu()" class="d-inline border-0 bg-transparent" type="button" id="open">
          <img class="hdr-icon-menu d-lg-none d-md-flex d-sm-flex" src="../../icones/menu-branco.svg" alt="Abrir menu" />
        </button>
        <!-- Menu mobile aberto -->
        <div class="menu-m bg-white position-absolute top-0 d-none" id="menu-aberto">
          <div class="d-flex w-100 justify-content-end">
            <button type="button" class="bg-transparent menu-mbuttons" onclick="openMenu()" id="close">
              <img src="../../icones/fechar-azul.svg" alt="Botão fechar menu">
            </button>
          </div>
          <hr class="line-nav m-0">
          <ul class="navflex-column m-0 p-0">
            <li class="nav-item menu-mlink">
              <a class="nav-link menu-mlinktext" aria-current="page" href="../dashboard">Dashboard</a>
            </li>
            <hr class="line-nav m-0">
            <li class="nav-item menu-mlink">
              <a class="nav-link menu-mlinktext" aria-current="page" href="../recepcao">Recepção</a>
            </li>
            <hr class="line-nav m-0">
            <li class="nav-item menu-mlink" data-bs-dismiss="offcanvas">
              <a class="nav-link menu-mlinktext" aria-current="page" href="../historicodaunidade">Histórico de Unidade</a>
            </li>
            <hr class="line-nav m-0">
            <li class="nav-item menu-mlink" data-bs-dismiss="offcanvas">
              <a class="nav-link menu-mlinktext" aria-current="page" href="../triagem">Triagem de Consultas</a>
            </li>
            <hr class="line-nav m-0">
            <li class="nav-item menu-mlink" data-bs-dismiss="offcanvas">
              <a class="nav-link menu-mlinktext" aria-current="page" href="../atendConsultas">Atendimento de Consultas</a>
            </li>
            <hr class="line-nav m-0">
            <li class="nav-item menu-mlink" data-bs-dismiss="offcanvas">
              <a class="nav-link menu-mlinktext" aria-current="page" href="../estoque">Estoque</a>
            </li>
            <hr class="line-nav m-0">
            <li class="nav-item menu-mlink" data-bs-dismiss="offcanvas">
              <a class="nav-link menu-mlinktext" aria-current="page" href="../cadastroDeUsuarios">Cadastro de Usuários</a>
            </li>
            <hr class="line-nav m-0">
            <li class="nav-item menu-mlink" data-bs-dismiss="offcanvas">
              <a class="nav-link menu-mlinktext" aria-current="page" href="../seletordeunidademobile">Seleção de Unidade</a>
            </li>
            <hr class="line-nav m-0">
          </ul>
          <div class="d-flex w-100 justify-content-end">
            <button type="button" class="bg-transparent menu-mbuttons" data-bs-dismiss="offcanvas" aria-label="Close">
              <img src="../../icones/ajuda-azul.svg" alt="Botão ajuda">
            </button>
          </div>
        </div>
        <!-- Fim menu mobile -->
        <div class="d-inline">
          <a href="../seletordeunidademobile/">
            <img class="hdr-icon-logo" src="../../icones/logo-branca.svg" alt="Logo Senac Saúde" />
          </a>
        </div>
        <div class="d-inline hdr-box">
          <button class="d-inline pe-3 border-0 bg-transparent hdr-box " type="button" name="usuario" value="<?php echo $user; //define o valor do botão de notif com o CPF do usuário logado 
                                                                                                              ?>" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="hdr-icon-bell" src="../../icones/sino-branco.svg" alt="Ícone notificações" />
            <span id="badge" class="position-absolute translate-middle badge rounded-pill bg-danger <?php echo $classNot ?>">
              <?php echo $count //mostra como texto o num de notif não visualizadas
              ?>
            </span>
          </button>
          <div class="dropdown-menu dropdown-menu-end bradius-dropdown-notification pt-4 pb-0 m-0 scroll-test" aria-labelledby="dropdownMenuButton1">
            <ul class="p-0">
              <!-- Require que chama o dropdown de notificações -->
              <?php require('../../php/notificacao/showNoti.php'); ?>
            </ul>
          </div>
          <div class="dropdown d-inline position-absolute">
            <button class="d-inline border-0 bg-transparent hdr-box" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="hdr-icon-user rounded-circle" src="<?php echo ($imagem) ?>" alt="Seu perfil" />
            </button>
            <!-- Dropdown ao clicar no usuário -->
            <ul class="dropdown-menu dropdown-menu-end hdr-dropdown-user p-0 m-0" aria-labelledby="dropdownMenuButton1">
              <!-- php que chama o nome do usuário logado -->
              <li>
                <h6 class="hdr-dropdown-header"><?php echo ($_SESSION["user"]["nomeCompleto"]) ?></h6>
              </li>
              <li>
                <hr class="hdr-dropdown-divider" />
              </li>
              <li>
                <a class="dropdown-item hdr-dropdown-item" href="../configuracaoDeUsuario/configUsuario.php<?php echo(!strpos($_SERVER['REQUEST_URI'], 'pages/seletordeunidademobile/') ? '' : '?unid=EDTUSER')?>">Configurações de usuário</a>
              </li>
              <li>
                <hr class="hdr-dropdown-divider" />
              </li>
              <li>
                <a class="dropdown-item hdr-dropdown-item dropdown-item-radius" href="../../php/login/_logout.php">Sair</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <!-- Teste update notificação (Marcelinho e Douglas) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <script src="../../js/notificacao/script.js"></script>
  <script src="../../js/header/scroll.js"></script>
  
  <!-- Scroll Reveal Lib  -->
  <script src="https://unpkg.com/scrollreveal"></script>

  <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../js/shered/inatividade.js"></script>
</body>

</html>