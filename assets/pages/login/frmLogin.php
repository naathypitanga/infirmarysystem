<?php
require_once("../../php/login/validLogged.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senac Saúde</title>
    <!-- Stylesheet Bootstrap -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Stylesheet Manual -->
    <link rel="stylesheet" href="../../css/login.css">
   <!-- Stylesheet FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>
    <img class="background" id="fundo" src="../../img/login/ambulancia.png" alt="background">
    <div class="form-signin m-auto text-center">
        <form action="../../php/login/_login.php" method="POST">
            <img src="../../img/login/logo3.png" alt="" class="mb-2">
            <?php
            if (isset($_SESSION["warning"])) { ?>
                <div class="alert alert-<?php
                                        if ($_SESSION["warning"]["have"]) {
                                            echo ("danger");
                                        } else {
                                            echo ("success");
                                        }
                                        ?> p-2 mb-3">
                    <?php echo ($_SESSION["warning"]["msg"]); ?>
                </div>
            <?php } ?>
            <div class="form-floating mb-3">
                <input class="form-control" type="text" id="floatingUser" placeholder="000.000.000-00" maxlength="11" name="cpf" required autocomplete="off" onkeypress="$(this).mask('000.000.000-00');" value="<?php
                                                                                                                                                                                                                    if (isset($_SESSION["cpfDesc"])) {
                                                                                                                                                                                                                        echo ($_SESSION["cpfDesc"]);
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                    ?>">
                <label for="floatingUser">CPF</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" type="password" id="floatingPass" placeholder="Senha" maxlength="50" name="pass" required autocomplete="off">
                <i class="far fa-eye password-reveal" id="togglePassword"></i>
                <label for="floatingPass">Senha</label>
            </div>
            <div class='text-center'>
                <?php
                if (isset($_SESSION["warning"])) {
                    if (isset($_SESSION['err']) && $_SESSION['err'] == 'senha') {
                        echo ("<a href='redefinicao/frmRedefEmail.php' class='nav-link'>Esqueci minha senha</a>");
                        unset($_SESSION['err']);
                    }
                }
                ?>
            </div>
            <button class="mt-3 w-100 btn btn-lg btn-blue" type="submit" id="enterBtn">Login</button>
            <p class="mt-3 mb-1 text-muted">&copy; 2022-2023 Senac</p>
        </form>
    </div>
    <?php
    if (isset($_SESSION["warning"]) && !$_SESSION["warning"]["have"]) { ?>
        <div class="alert-exp">
            <div class="alert alert-success">
                <span>Para uma melhor experiência tecle f11 para colocar em tela cheia!</span>
            </div>
        </div>
    <?php } ?>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../js/login/login.js"></script>
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <?php if (isset($_SESSION["logged"]) && $_SESSION["logged"]) { ?>
        <script src="../../js/login/timeOutLogin.js"></script>
    <?php } ?>
    <script>
        $('#floatingUser').mask('000.000.000-00');
    </script>
</body>

</html>
<?php
unset($_SESSION["warning"]);
?>