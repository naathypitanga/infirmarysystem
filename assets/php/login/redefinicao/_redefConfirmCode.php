<?php
    require_once('../../util.php');

    if (!isset($_SESSION['user']['email'])) {    //Valida se foi a página não foi acessada diretamente pelo link
        header("Location:../../../pages/login/frmLogin.php");
        exit();
    }

    $validCode = mysqli_fetch_assoc(mysqli_query($conexao, "select * from tbl_redef where email_usuario = '".$_SESSION['user']['email']."'"));

    if (isset($validCode["codigo"])) {   //Valida se existe um código de redefinição para o email solicitado 
        if ($validCode["codigo"] == $_POST["code"]) {       //Valida se o usuario digitou o código correto
            mysqli_query($conexao, "delete from tbl_redef where email_usuario = '".$_SESSION['user']['email']."'");  //Deleta o código
            if ((int)$validCode["hora_vencimento"] > strtotime(date('H:i:s'))) {    //valida se o código já está vencido
                $_SESSION["redef"] = true;
                header("Location:../../../pages/login/redefinicao/frmRedefPsw.php");
                exit();
            } else {
                generateWarning("Código já expirado, reenvie o código e tente novamente!");
            }
        } else {
            generateWarning("Código inválido!");
        }
    } else {
        generateWarning("Não foi encontrado nenhum código de redefinição pertencente ao seu email.");
    }
    header("Location:../../../pages/login/redefinicao/frmRedefCod.php");
    mysqli_close($conexao);
?>