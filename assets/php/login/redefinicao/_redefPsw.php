<?php
    require_once('../../util.php');

    if (strlen($_POST["pass"]) < 6) {  //Valida se a senha é menor que 6 caracteres
        generateWarning("As senha não pode ter menos de 6 caracteres!");        
    } elseif ($_POST["pass"] != $_POST["confirmPass"]) {  //Valida se a senha é a mesma da confirmação
        generateWarning("As senhas não são iguais!");        
    } elseif ($_POST["pass"] == $_SESSION["user"]["senha"]) {  //Valida se a senha é igual a antiga
        generateWarning("A senha nova não pode ser igual a antiga!");        
    } else {
        if (mysqli_query($conexao, "update tbl_usuarios set senha = '".md5($_POST["pass"])."' where CPF = '".$_SESSION["user"]["CPF"]."'")) {  //Faz a redefinição da senha
            generateWarning("Senha alterada com sucesso!</br><div class='spinner-border text-success mt-2'></div>", false);
            $_SESSION["redef"] = false;
            unset($_SESSION["user"]);
        } else {
            generateWarning("Senha não alterada!");
        }    
    }
    header("Location:../../../pages/login/redefinicao/frmRedefPsw.php");
    mysqli_close($conexao);
?>