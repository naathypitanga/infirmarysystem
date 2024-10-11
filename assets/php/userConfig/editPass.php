<?php
    require_once('../util.php');

    if (isset($_POST['act']) && $_POST['act'] != "" && isset($_POST['new']) && $_POST['new'] != "" && isset($_POST['conf']) && $_POST['conf'] != "") {
        if (md5($_POST['act']) != $_SESSION['user']['senha']) {
            generateWarning("Não foi digitada a senha atual corretamente!");
        } elseif ($_POST['new'] != $_POST['conf']) {
            generateWarning("As senhas não são iguais!");   
        } elseif (strlen($_POST['new']) < 6) {
            generateWarning("As senha não pode ter menos de 6 caracteres!");     
        } elseif ($_POST['act'] == $_POST['new']) {
            generateWarning("Nova senha não pode ser igual a antiga!");
        } else {
            if (mysqli_query($conexao, "update tbl_usuarios set senha = '".md5($_POST['new'])."' where CPF = '".$_SESSION['user']['CPF']."'")) {
                generateWarning("Senha atualizada com sucesso!", false);
                $_SESSION['user']['senha'] = md5($_POST['new']);
            } else {
                generateWarning("Senha não atualizada!");                
            }
        }
    } else {
        generateWarning("Nem todos os dados foram preenchidos!");        
    }

    header('location:../../pages/configuracaoDeUsuario/configUsuario.php');
?>