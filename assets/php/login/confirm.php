<?php
    require_once('../util.php');

    if (md5($_POST['pass']) == $_SESSION['user']['senha']) {
        unset($_SESSION['suspenso']);
        header('location:../../pages/seletordeunidademobile/');
    } else {
        generateWarning("Senha incorreta!");
        header('location:../../pages/login/frmSuspens.php');        
    }
?>