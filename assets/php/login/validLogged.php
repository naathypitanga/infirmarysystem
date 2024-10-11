<?php
  session_start();
  if ((isset($_SESSION["logged"]) && $_SESSION["logged"]) && !isset($_SESSION["warning"])) {
    header("Location:../../../");
  }
?>