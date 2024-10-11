<?php


$sqlProf = "SELECT * FROM `tbl_paciente`";
$queryProf = mysqli_query($conexao, $sqlProf);


  while ($row = mysqli_fetch_assoc($queryProf)) {
    echo "<option value='".$row['nome']."'>" . $row['nome'] . "</option>";
  }

?>