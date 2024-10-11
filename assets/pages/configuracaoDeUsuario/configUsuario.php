<?php
  include('../../php/util.php');
  $sql = 'SELECT Est.ID_produto as id, Est.nomeProduto as Prod, Est.unidadeDeMedida as uniMed from tbl_estoque as Est';
  $result = mysqli_query($conexao,$sql);
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
  <meta http-equiv="cache-control" content="no-cache" />

  <title>Configuração de Usuário</title>
  <!-- Stylesheet Bootstrap -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Stylesheet Manual -->
  <link rel="stylesheet" href="../../css/">
  <link rel="stylesheet" href="../../css/root.css">
  <link rel="stylesheet" href="../../css/configUsuario.css">
  <!-- Stylesheet Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100;8..144,200;8..144,300;8..144,400;8..144,500;8..144,600;8..144,700;8..144,800;8..144,900;8..144,1000&display=swap" rel="stylesheet">
</head>
<body>
  <!---------- Sidebar ---------->
  <?php
    if (isset($_SESSION['unidade']) && $_SESSION['unidade'] != 'ESTOQUE' ||  $_SESSION['unidade'] != 'CADUSER') {
      include('../sidebar/sidebar.php'); 
    }
  ?>
  
  <!---------- Header ---------->
  <?php include('../header/header.php'); ?>

  <!---------- Mask ------------>
   <?php include('../../seaLibrary/brMask/mask.php'); ?>

  <!---------- Main ---------->
  <div class="container d-flex">
    
    <div class="container_geral mx-2 mt-4 px-3 py-5 text-center">
      <form class="d-grid" action="../../php/userConfig/edit.php" method="POST" enctype="multipart/form-data">
        

        <h2 class="texto">Configurações de Usuário</h2>
        <img class="d-block mx-auto mt-4 mb-3 rounded-circle user" src="<?php echo($imagem)?>" alt="Ícone usuário" id="preview">
        <div class="mb-3">
          <label class="botao_submit mb-3 py-2 px-3 btn_width d-inline" for="foto">Escolher arquivo</label>
          <p class="texto mt-1 mb-1" id="arquivo"></p>
          <input class="input_file" name="foto" type="file" id="foto">
        </div>
        <div class="mt-3 pb-2 d-flex d-inline-flex col formulario_sombra">
          <label class="texto label_fix">Telefone:</label>
          <input class="form-control-sm w-50" <?php echo phoneMask()?> value="<?php echo $_SESSION['user']['Telefone'] ?>" type="text" id="tel" name="telefone">
        </div>
        <div class="pb-2 d-flex d-inline-flex col formulario_sombra">
          <label class="texto label_fix">E-mail:</label>
          <input class="form-control-sm w-50" value="<?php echo $_SESSION['user']['email'] ?>" type="text" name="email">
        </div>
        <div class="d-flex w-100 mt-4 botao_mobile container mx-auto">
          <a class="botao_submit mb-3 py-1 px-2 me-2 text-center" href="javascript:history.back()"><img src="../../icones/voltar-branco.svg" alt="Ícone voltar">Voltar</a>
          <button type="button" class="botao_submit mb-3 py-1 px-2  me-2" data-bs-toggle="modal" data-bs-target="#saveChanges">Salvar Mudanças</button>
          <button type="button" class="botao_submit mb-3 py-1 px-2 " data-bs-toggle="modal" data-bs-target="#changePassword">Alterar Senha</button>
        </div>
        <!-- Modal salvar mudanças -->
        <div class="modal" id="saveChanges">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Digite sua senha para continuar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="formulario_sombra mb-3">
                  <label class="label_fix">Senha:</label>
                  <input class="form-control-sm w-50 form_border" type="password" name="password">
                </div>
                <input type="submit" class="botao_submit py-1 px-2 btn_width d-inline" value="Gravar" >
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- Modal trocar de senha -->
      <div class="modal" id="changePassword">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Alterar senha</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-grid">
              <form action="../../php/userConfig/editPass.php" method="post">
                <div class="formulario_sombra mb-3 col d-flex">
                  <label class="label_fix">Senha atual:</label>
                  <input class="form-control-sm w-50 form_border" type="password" required name="act">
                </div>
                <div class="formulario_sombra mb-3 col d-flex">
                  <label class="label_fix">Nova senha:</label>
                  <input class="form-control-sm w-50 form_border" type="password" required name="new">
                </div>
                <div class="formulario_sombra mb-3 col d-flex">
                  <label class="label_fix">Confirmar:</label>
                  <input class="form-control-sm w-50 form_border" type="password" required name="conf">
                </div>
                <input type="submit" class="botao_submit mx-auto py-1 px-2 btn_width d-inline" value="Gravar" >
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Gera o modal com as mensagens (sucesso, erro, etc) -->
  <?php createModalWarnings()?>

  <!-- JQUERY -->

  <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

  <!-- Javascript Manual -->

  <script src="../../js/configUser/script.js"></script>
</body>
</html>