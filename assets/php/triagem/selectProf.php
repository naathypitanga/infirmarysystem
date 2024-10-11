<?php


$sqlProf = "SELECT * FROM `tbl_usuarios`";
$queryProf = mysqli_query($conexao, $sqlProf);


  while ($row = mysqli_fetch_assoc($queryProf)) {
    echo "<option value='".$row['nomeCompleto']."'>" . $row['nomeCompleto'] . "</option>";
  }

?>