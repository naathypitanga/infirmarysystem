<?php
    mysqli_query($conexao, "insert into tbl_accesslog (id, user_id, data_log, ip) values (UUID(), '".$_SESSION["user"]["CPF"]."', '".setDate()."', '".$_SERVER["REMOTE_ADDR"]."')");
?>