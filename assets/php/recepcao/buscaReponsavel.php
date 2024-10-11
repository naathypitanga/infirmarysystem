<?php
    require_once('../util.php');

    $query = mysqli_query($conexao, "select * from tbl_responsavel where id = '".$_POST['respId']."'");

    echo($query->num_rows != 0 ? json_encode(mysqli_fetch_assoc($query)) : "null");
?>