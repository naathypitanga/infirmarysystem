<?php
    require_once('../util.php');

    if (mysqli_query($conexao, "delete from tbl_notificacao where id = '".$_POST['notId']."'")) {
        mysqli_query($conexao, "insert into tbl_delNotific values ('".$_POST['notId']."')");
        echo "success";
    } else {
        echo "failed";
    }
?>