<?php
    session_start();

    header("Location:../../pages/login/frmLogin.php");

    session_unset();
    session_destroy();
?>