<?php
require('../util.php');
$userID = $_GET['id'];
$sqlUsers = "SELECT * from tbl_usuarios where CPF = '$userID'";
$queryUsers = mysqli_query($conexao, $sqlUsers);
$queryUsers = mysqli_fetch_assoc($queryUsers);

if($queryUsers['ativo']==0){
    $sql = "UPDATE tbl_usuarios SET ativo = 1 where CPF = '$userID'";
    $sqlStart = mysqli_query($conexao, $sql);
}else{
    $sql = "UPDATE tbl_usuarios SET ativo = 0 where CPF = '$userID'";
    $sqlStart = mysqli_query($conexao, $sql);
}

header('location:http://172.17.34.254:1200/projetos/202100002/projetointegrador/assets/pages/cadastroDeUsuarios/index.php');