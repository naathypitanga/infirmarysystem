<?php
    require_once('../util.php');

    $login = $_POST;
    if (sizeof($login) === 0) {  //Valida se foi a página não foi acessada diretamente pelo link
        header("location:../../pages/login/frmLogin.php");
        exit();
    }

    $_SESSION["logged"] = false;  //Define que não hà ninguem logado no sistema

    if (!isset($_SESSION["user"]) || (isset($_SESSION["user"]["CPF"]) && $_SESSION["user"]["CPF"] != md5($login["cpf"]))) {                 //Valida se o usuario já tentou fazer login anteriormente ou
        $_SESSION["user"] = mysqli_fetch_array(mysqli_query($conexao, "select * from tbl_usuarios where CPF = '".md5(replace_cpf($login["cpf"]))."'"));      //se não está tentando fazer login com um usuario diferente, caso 
    }                  
    
    $_SESSION['cpfDesc'] = $login["cpf"];
    
    //contrario, ele busca o usuario no banco de dados.

    if (isset($_SESSION["user"]["CPF"])) {                //Válida se foi encontrado algum usuario
        if ($_SESSION["user"]["ativo"]) {                        //Valida o usuario está ativo
            if (md5($login["pass"]) != $_SESSION["user"]["senha"]) {     //Valida a senha do usuario
                generateWarning("Usuário ou Senha incorretos!");
                $_SESSION['err'] = 'senha';
            } else {
                require_once("./_accessLog.php");   //Registra o log de acesso
                generateWarning("Bem-vindo(a) <b>".$_SESSION["user"]["nomeCompleto"]."</b>!</br><div class='spinner-border text-success mt-2'></div>", false);
                $_SESSION["logged"] = true;         //Define que hà alguem logado no sistema
            }
        } else {
            generateWarning("Usuário inativo!");
            unset($_SESSION["user"]);
        }
    } else {
        generateWarning("Usuário ou Senha incorretos!");
        $_SESSION['err'] = 'user';
    }
    header("location:../../pages/login/frmLogin.php");
    mysqli_close($conexao);
?>