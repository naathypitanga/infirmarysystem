<?php
    require_once('../util.php');

    $uniMed = mysqli_query($conexao, "select * from tbl_estoque where nomeProduto = '".$_POST['nomeProduto']."'");

    if ($uniMed->num_rows != 0) {
        echo(mysqli_fetch_assoc($uniMed)['unidadeDeMedida']);
    }
?>