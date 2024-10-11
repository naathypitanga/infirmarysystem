<?php
    require_once("../../util.php");

    $email = $_POST["email"];

    if ($email == $_SESSION["user"]["email"]) {   //Valida se o email informado pertence ao usuário que está tentando alterar a senha
        $cod = generateCode();
        $delLastCode = mysqli_query($conexao, "Delete from tbl_redef where email_usuario = '$email';");
        $inserirCod = mysqli_query($conexao, "insert into tbl_redef (codigo, email_usuario, hora_vencimento) values ('$cod', '".$_SESSION["user"]["email"]."', '".generateDate(1)."');");
        if($inserirCod) {            
            require_once("./_sendMail.php");          
        }
    } else {
        generateWarning("Email não pertence ao usuário informado anteriormente!");
    }
    mysqli_close($conexao);
    header("Location:../../../pages/login/redefinicao/frmRedefEmail.php");   
?>