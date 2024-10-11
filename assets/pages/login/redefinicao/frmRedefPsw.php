<?php
    session_start();
    if ((isset($_SESSION["logged"]) && $_SESSION["logged"]) && !isset($_SESSION["warning"])) {
        header("Location:../../../../");
    } elseif (!isset($_SESSION["redef"])) {
        header("Location:../frmLogin.php");
    }
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
            <form action="../../../php/login/redefinicao/_redefPsw.php" method="POST">
                <img src="../../../img/login/logo3.png" alt="" class="mb-2">
                    <?php
                        if(isset($_SESSION["warning"])) { ?>
                            <div class="alert alert-<?php 
                                if ($_SESSION["warning"]["have"]) {
                                    echo("danger");
                                } else {
                                    echo("success");
                                }
                            ?> p-2 mb-3">
                                <?php echo($_SESSION["warning"]["msg"]);?>
                            </div>
                    <?php }?>                  
                    <h5>Trocar senha</h5>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="password" id="floatingPass" placeholder="Senha" maxlength="50" name="pass" required autocomplete="off">
                        <i class="far fa-eye" id="togglePassword" style="margin-top: -36px; margin-left: 80px; cursor: pointer; position: fixed;"></i>
                        <label for="floatingPass">Nova senha</label>
                    </div>                
                    <div class="form-floating mb-3">
                        <input class="form-control" type="password" id="floatingPass2" placeholder="Senha" maxlength="50" name="confirmPass" required autocomplete="off">
                        <i class="far fa-eye" id="togglePassword2" style="margin-top: -36px; margin-left: 80px; cursor: pointer; position: fixed;"></i>
                        <label for="floatingPass2">Confirmar nova senha</label>
                    </div>
                <button class="w-100 btn btn-lg btn-blue" type="submit" id="enterBtn">Trocar senha</button>
                <p class="mt-3 mb-1 text-muted">&copy; 2022-2023 Senac</p>
            </form>
        </div>
        <script src="../../../bootstrap/js/bootstrap.min.js"></script>
        <script src="../../../js/login/login.js"></script>  
        <?php
            if (isset($_SESSION["warning"]) && !$_SESSION["warning"]["have"] && isset($_SESSION["redef"]) && !$_SESSION["redef"]) {
                ?>
                    <script src="../../../js/login/redirectToLogin.js"></script>
                    <script src="../../../js/login/disableUpdate.js"></script>    
                <?php
            }
        ?>
    </body>
</html>
<?php
    unset($_SESSION["warning"]);
?>
