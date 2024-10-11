<!-- Ainda não tá pronto lynn -->
<?php
  $sqlHistorico = "SELECT tbl_recepcao.dia, tbl_triagem.CR, tbl_consulta.horaFim, tbl_trajetoPaciente.sit, tbl_paciente.nome, tbl_recepcao.localAtend, tbl_trajetoPaciente.idRecepcionista, tbl_trajetoPaciente.idEnfermeiro, tbl_triagem.Hora_Fim_Triagem, tbl_consulta.ID_profissional
    FROM tbl_recepcao
    INNER JOIN tbl_paciente ON tbl_paciente.id = tbl_recepcao.ID_paciente
    INNER JOIN tbl_trajetoPaciente ON tbl_trajetoPaciente.idRecepcionista = tbl_recepcao.ID_usuario
    INNER JOIN tbl_consulta ON tbl_consulta.ID_recepcao = tbl_recepcao.ID_recepcao
    INNER JOIN tbl_triagem ON tbl_triagem.ID_recepcao = tbl_recepcao.ID_recepcao
  ";
  $queryHistorico = mysqli_query($conexao, $sqlHistorico);


  while ($row = mysqli_fetch_assoc($queryHistorico)) {

  ?>


  

  <tr>
    <th><?php echo $row['dia'] ?></th>
    <th><?php echo $row['CR'] ?></th>
    <th><?php echo date_format(date_create($row['dia']), 'd/m/Y'); ?></th>
    <th><?php echo date_format(date_create($row['dia']), 'h:i:s'); ?></th>
    <th><?php echo $row['sit'] ?></th>
    <th><?php echo $row['nome'] ?></th>
    <th><?php echo $row['localAtend'] ?></th>
    <th><button class="botao_acao">Ver</button></th>
    <th><?php echo $row['idRecepcionista'] ?></th>
    <th><?php echo $row['idEnfermeiro'] ?></th>
    <th><?php echo $row['Hora_Fim_Triagem'] ?></th>
    <th><?php echo $row['ID_profissional'] ?></th>
  </tr>
<?php } 

?>

<!-- SELECT tbl_recepcao.ID_recepcao, tbl_triagem.CR, tbl_consulta.horaFim, tbl_trajetoPaciente.sit, tbl_paciente.nome, tbl_recepcao.localAtend, tbl_trajetoPaciente.idRecepcionista, tbl_trajetoPaciente.idEnfermeiro, tbl_triagem.Hora_Fim_Triagem, tbl_consulta.ID_profissional
FROM tbl_recepcao
INNER JOIN tbl_recepcao ON tbl_recepcao.dia = tbl_trajetoPaciente.dataRecepcao
INNER JOIN tbl_triagem ON 
INNER JOIN tbl_consulta ON
INNER JOIN tbl_trajetopaciente ON
INNER JOIN tbl_paciente ON

SELECT tbl_recepcao.ID_recepcao, tbl_consulta.horaFim, tbl_consulta.ID_profissional 
FROM tbl_recepcao
INNER JOIN tbl_recepcao ON tbl_recepcao.ID_recepcao = tbl_consulta.ID_recepcao -->