<?php
  session_start();
  if(!isset($_SESSION["logged"]) || !$_SESSION["logged"]) {
    header("Location:http://172.17.34.254:1200/projetos/202100002/projetointegrador/assets/pages/login/frmLogin.php");
  } else {
    header("Location:./assets/pages/seletordeunidademobile/");
  }
?>