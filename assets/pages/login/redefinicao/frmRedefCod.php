<?php
  require_once("../../../php/login/validLogged.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Senac Saúde</title>
        <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../../css/EasyColors1.0.css">
        <link rel="stylesheet" href="../../../css/login.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    </head>
    <body>
        <img class="background" id="fundo" src="../../../img/login/ambulancia.png" alt="background">
        <div class="form-signin m-auto text-center">            
            <form action="../../../php/login/redefinicao/_redefConfirmCode.php" method="POST">
                <img src="../../../img/login/logo3.png" alt="" class="mb-2">
                <?php
                    if(isset($_SESSION["warning"])) { ?>
                        <div class="alert alert-<?php 
                            if ($_SESSION["warning"]["have"]) {
                                echo("danger");
                            }
                        ?> p-2 mb-3">
                            <?php echo($_SESSION["warning"]["msg"]);?>
                        </div>
                <?php }?>                  
                <h5>Esqueci minha senha</h5>
                <div class="form-floating mb-2">
                    <input class="form-control" type="text" id="floatingCode" placeholder="usuario" max="999999" name="code" required autocomplete="off">
                    <label for="floatingCode">Código</label>
                </div>
                <a href="frmRedefEmail.php" class='nav-link mb-2'>Não recebi nenhum código</a>
                <button class="w-100 btn btn-lg btn-blue" type="submit" id="enterBtn">Verificar</button>
                <p class="mt-3 mb-1 text-muted">&copy; 2022-2023 Senac</p>
            </form>
        </div>
        <script src="../../../bootstrap/js/bootstrap.min.js"></script>
        <script src="../../../js/login/login.js"></script>   
    </body>
</html>
<?php
    unset($_SESSION["warning"]);
?>