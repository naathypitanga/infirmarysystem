<?php
include('../util.php');
//Recebe as informações do formulário

$grpService = isset($_POST['grpService']) ? $_POST['grpService'] : null; //obrigatórios
$nmCompleto = isset($_POST['nmCompleto']) ? $_POST['nmCompleto'] : null; //obrigatório
$nmSocial = isset($_POST['nmSocial']) ? $_POST['nmSocial'] : null; //opcional
$email = isset($_POST['email']) ? $_POST['email'] : null; //obrigatório
$cpf = isset($_POST['cpf']) ? replace_cpf($_POST['cpf']) : null; //obrigatório
$cns = isset($_POST['cns']) ? replace_cpf($_POST['cns']) : null; //obrigatório
$celPhone = isset($_POST['celPhone']) ? replace_tel($_POST['celPhone']) : null; //opcional
$edit = isset($_POST['edit']) ? $_POST['edit'] : null;
$endereco = isset($_POST['cidade']) ? $_POST['cidade'] : null; //eu sei que aqui endereço ta pegando da cidade, mas é assim msm confia

//recebe informações padrões
$senha = md5($cpf);

//validação se o usuário já existe
$sqlValid = "SELECT * FROM tbl_usuarios WHERE CPF = '$cpf'";
$query = mysqli_query($conexao, $sqlValid);

if($edit==true){
    $sqlUpdate = "UPDATE tbl_usuarios SET email = '$email', nomeCompleto = '$nmCompleto',nomeSocial = '$nmSocial',telefone = '$celPhone',endereco = '$endereco',ID_cargo = '$grpService'   WHERE CPF = '$cpf'";
    $sqlUpdate = mysqli_query($conexao, $sqlUpdate);
    if(mysqli_affected_rows($conexao)<0){
        generateWarning("Erro ao editar o usuário!");
    }else{
        generateWarning("Usuário editado com sucesso!");
    }
}else
//demais validações
if($nmCompleto == null){
    generateWarning("O nome é um campo obrigatório!");
}elseif($email == null){
    generateWarning("O e-mail é um campo obrigatório!");
}elseif(validaCPF($cpf)==false&&$edit==false){
    generateWarning("O CPF é inválido");
}elseif($cns == null){
    generateWarning("O CNS é um campo obrigatório!");
}elseif(strlen($cpf) <> 11&&$edit==false){
    generateWarning("Digite um CPF válido!");
}elseif(strlen($cns) <> 12){
    generateWarning("Digite um CNS válido!");
}elseif(strpos($email,"@") == false){
    generateWarning("Digite um e-mail válido!");
}else{ 

    //cria o usuário
    $cpf= md5($cpf);
    $addSQL = "INSERT INTO tbl_usuarios (CPF, senha, ativo, email, nomeCompleto, Estatus, Telefone, ID_cargo, endereco, nomeSocial, CNS) VALUES( '$cpf', '$cpf', 1, '$email', '$nmCompleto', 'ver dps', '$celPhone', '$grpService', '$endereco','$nmSocial','$cns')";
    $addQuery = mysqli_query($conexao, $addSQL);
    
        //mensagem de sucesso ou fracasso
        if(mysqli_affected_rows($conexao)<0){
            generateWarning("Erro ao cadastrar novo usuário!");
        }else{
            generateWarning("Usuário cadastrado com sucesso!");
        }
    }
    $_SESSION['info'] = $_POST;

    if($edit==false){
        header('location: ../../pages/cadastroDeUsuarios/cadastrar-usuario.php');
    }else{
        header('location: ../../pages/cadastroDeUsuarios/cadastrar-usuario.php?id='.$cpf);
        unset($_SESSION['info']);
    }
