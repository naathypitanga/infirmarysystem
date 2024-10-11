<?php
  if(!isset($_SESSION["logged"]) || !$_SESSION["logged"]) {
    header("Location:http://172.17.34.254:1200/projetos/202100002/projetointegrador/assets/pages/login/frmLogin.php");
  } elseif (isset($_SESSION['suspenso']) && $_SESSION['suspenso']) {
    header("Location:http://172.17.34.254:1200/projetos/202100002/projetointegrador/assets/pages/login/frmSuspens.php");
  }
?>