<?php 
require('../../php/util.php');
//require('../../php/notificacao/createNoti.php');

$user= md5($_SESSION["user"]["CPF"]);


if(isset($_GET['usuario'])) {

    $sql = "UPDATE tbl_notificacao SET visualizado = 1 WHERE user_id = '$user'";
    $sql_query = mysqli_query($conexao, $sql);

}


?>