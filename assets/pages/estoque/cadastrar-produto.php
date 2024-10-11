<?php
include('../../php/util.php');
require_once('../../php/login/validNotLogged.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar Produto</title>
  <!-- Stylesheet Bootstrap -->
  <link rel="stylesheet" href="../.././bootstrap/css/bootstrap.min.css">
  <!-- Stylesheet Manual -->
  <link rel="stylesheet" href="../../css/reset.css">
  <link rel="stylesheet" href="../../css/root.css">
  <link rel="stylesheet" href="../.././css/estoque.css">
  <!-- Stylesheet Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100;8..144,200;8..144,300;8..144,400;8..144,500;8..144,600;8..144,700;8..144,800;8..144,900;8..144,1000&display=swap" rel="stylesheet">
</head>

<body>
  <!-- Sidebar -->
  <?php
  if (isset($_SESSION['unidade']) && $_SESSION['unidade'] != 'ESTOQUE') {
    include('../sidebar/sidebar.php');
  }
  ?>

  <!-- Header -->
  <?php include('../header/header.php'); ?>

  <!-- Main -->
  <div class="container d-flex mx-auto">
    <div class="container_geral mx-2 mt-4 text-white">

      <div class="d-flex mt-4 w-100 justify-content-center texto_sombra">
        <h4>Cadastrar Produto</h4>
      </div>

      <hr class="linha">

      <form class="d-grid mx-3 mt-5 gap-3 text-white formulario_sombra formulario_nome--sombra row" action="../../php/estoque/add.php" method="post">

        <div class="d-flex d-inline-flex col">
          <label class="label_fix" for="nameProduto">Nome do produto:</label>
          <input name="nomeProduto" type="text" class="form-control-sm" id="prod" value="<?php
                                                                                          if (isset($_SESSION['informations']) && isset($_SESSION['informations']['nomeProduto'])) {
                                                                                            echo ($_SESSION['informations']['nomeProduto']);
                                                                                          }
                                                                                          ?>" placeholder="Produto" list="produtos" autocomplete="off" onchange="change()" onblur="change()">
          <datalist id="produtos">
            <?php
            $prods = mysqli_query($conexao, "select * from tbl_estoque");

            foreach ($prods as $prod) {
            ?>
              <option value="<?php echo ($prod['nomeProduto']) ?>">
              <?php
            }
              ?>
          </datalist>
        </div>

        <div class="d-flex d-inline-flex col">
          <label class="label_fix" for="quantidade">Quantidade:</label>
          <input name="quantidade" type="number" class="form-control-sm" value="<?php
                                                                                if (isset($_SESSION['informations']) && isset($_SESSION['informations']['quantidade'])) {
                                                                                  echo ($_SESSION['informations']['quantidade']);
                                                                                }
                                                                                ?>" placeholder="qt. de produtos">
        </div>

        <div class="d-flex d-inline-flex col">
          <label class="label_fix" for="undMedida">Unidade de Medida:</label>
          <select name="undMedida" class="form-control-sm" id="uniMed">
            <option selected value="UND">UND</option>
            <option value="CX">CX</option>
            <option value="ML">ML</option>
            <option value="L">L</option>
            <option value="G">G</option>
            <option value="KG">KG</option>
          </select>
        </div>

        <div class="d-flex d-inline-flex col">
          <label class="label_fix" for="lote">Lote:</label>
          <input name="lote" type="text" class="form-control-sm" value="<?php
                                                                        if (isset($_SESSION['informations']) && isset($_SESSION['informations']['lote'])) {
                                                                          echo ($_SESSION['informations']['lote']);
                                                                        }
                                                                        ?>" placeholder="0000">
        </div>
        <div class="d-flex d-inline-flex col mb-5">
          <label class="label_fix">Validade:</label>
          <input name="validade" type="date" class="form-control-sm" value="<?php
                                                                            if (isset($_SESSION['informations']) && isset($_SESSION['informations']['validade'])) {
                                                                              echo ($_SESSION['informations']['validade']);
                                                                            }
                                                                            ?>">
        </div>

        <div class="d-flex pb-3 w-100 justify-content-start mt-2 mb-3 botao_mobile">

          <a class="botao_submit px-8 pt-2 pb-2" href="entrada-produto.php" data-toggle="tooltip" data-placement="top" title="Voltar">
            <img src="../../icones/retroceder-branco.svg" alt="retroceder-branco.svg"></a>

          <a class="botao_submit px-8 pt-2 pb-2 ms-2" href="index.php" data-toggle="tooltip" data-placement="top" title="Cancelar">
            <img src="../../icones/cancelar-branco.svg" alt="cancelar-branco.svg.svg">
            Cancelar</a>

          <button class="botao_submit px-8 pt-2 pb-2 ms-2" data-toggle="tooltip" data-placement="top" title="Salvar">
            <img src="../../icones/adicionar.svg" alt="adicionar.svg">
            <input type="submit" value="" class="hide_content" name="save">
            Salvar
          </button>

        </div>
      </form>

    </div>
  </div>

  <!-- Gera o modal com as mensagens (sucesso, erro, etc) -->
  <?php createModalWarnings() ?>

  <!-- JQUERY -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <!-- Javascript Manual -->
  <script src="../../js/estoque/changeLote.js"></script>

</body>

</html>

<script>
  document.querySelector('#uniMed').value = '<?php
                                              if (isset($_SESSION['informations']) && isset($_SESSION['informations']['undMedida'])) {
                                                echo ($_SESSION['informations']['undMedida']);
                                              }
                                              ?>';
</script>

<?php
unset($_SESSION['informations']);
?>