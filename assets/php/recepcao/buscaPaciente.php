<?php
    require_once('../util.php');

    $query = mysqli_query($conexao, "select * from tbl_paciente where ".$_POST['camp']." = '".replace_cpf($_POST['valor'])."'");

    echo($query->num_rows != 0 ? json_encode(mysqli_fetch_assoc($query)) : null);
?>