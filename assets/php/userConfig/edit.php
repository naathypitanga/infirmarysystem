<?php 
    require_once('../util.php');

    $pass = md5($_POST['password']);

    if($pass == $_SESSION['user']['senha']){

        if(isset($_FILES['foto'])){
            $novoDir = "./uploads/".$_SESSION['user']['CPF'].".jpeg";
            move_uploaded_file($_FILES['foto']['tmp_name'],$novoDir);
            $query= mysqli_query($conexao, "UPDATE tbl_usuarios SET foto = '".$_SESSION['user']['CPF'].".jpeg"."' where CPF = '".$_SESSION['user']['CPF']."'");        
        }

        if(isset($_POST['telefone'])){
            $sql = "UPDATE tbl_usuarios SET Telefone = '".replace_tel($_POST['telefone'])."' WHERE CPF = '".$_SESSION['user']['CPF']."'";
            $query = mysqli_query($conexao, $sql);
            $_SESSION['user']['Telefone'] = $_POST['telefone'];
        }

        if(isset($_POST['endereco'])){
            $sql = "UPDATE tbl_usuarios SET endereco = '".$_POST['endereco']."' WHERE CPF = '".$_SESSION['user']['CPF']."'";
            $query = mysqli_query($conexao, $sql);
            $_SESSION['user']['endereco'] = $_POST['endereco'];
        }

        if(isset($_POST['email'])){
            $sql = "UPDATE tbl_usuarios SET email = '".$_POST['email']."' WHERE CPF = '".$_SESSION['user']['CPF']."'";
            $query = mysqli_query($conexao, $sql);
            $_SESSION['user']['email'] = $_POST['email'];
        }

        generateWarning("Alterações realizadas com sucesso!",false);

    }else{
        generateWarning("Senha incorreta!");
    }   
     header('location:../../pages/configuracaoDeUsuario/configUsuario.php');