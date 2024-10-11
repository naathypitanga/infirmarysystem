<?php
    $sqlConsultas = "SELECT  tbl_triagem.CR, tbl_trajetoPaciente.sit, tbl_recepcao.dia, tbl_paciente.nome, tbl_paciente.nomeSocial, tbl_usuarios.nomeCompleto, tbl_triagem.Hora_Fim_Triagem
            FROM ((((tbl_recepcao
            INNER JOIN tbl_triagem ON tbl_recepcao.ID_recepcao = tbl_triagem.ID_recepcao)
            INNER JOIN tbl_trajetoPaciente ON tbl_recepcao.ID_recepcao = tbl_trajetoPaciente.idRecepcao)
            INNER JOIN tbl_paciente ON tbl_recepcao.ID_paciente = tbl_paciente.id)
            INNER JOIN tbl_usuarios ON tbl_recepcao.ID_usuario = tbl_usuarios.CPF)
    ";
    $queryConsultas = mysqli_query($conexao, $sqlConsultas);
    
    while ($row = mysqli_fetch_assoc($queryConsultas)) {
?>

<tr>
    <th><?php echo $row['CR'] ?></th>
    <th><?php echo $row['sit'] ?></th>
    <th><?php echo $row['dia'] ?></th>
    <th><?php echo $row['Nome'] ?></th>
    <th><?php echo $row['nomeSocial'] ?></th>
    <th><?php echo $row['ID_profissional'] ?></th>
    <th><?php echo $row['Hora_Fim_Triagem'] ?></th>
  </tr>

<?php }
