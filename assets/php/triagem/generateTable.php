
<?php
$sqlRecepcao = "SELECT tbl_recepcao.ID_recepcao ,tbl_recepcao.dia, tbl_paciente.nome, tbl_paciente.nomeSocial, tbl_paciente.id FROM tbl_recepcao INNER JOIN tbl_paciente ON tbl_paciente.id = tbl_recepcao.ID_paciente;";
$queryRecepcao = mysqli_query($conexao, $sqlRecepcao);


while ($row = mysqli_fetch_assoc($queryRecepcao)) {

?>
    <tr>
        <th>SIT1</th> 
        <th>1</th>
        <th><?php echo date_format(date_create($row['dia']), 'd/m/Y'); ?></th>
        <th><?php echo date_format(date_create($row['dia']), 'h:i:s') ?></th>
        <th><?php echo $row['nome'] ?></th>
        <th><?php echo $row['nomeSocial'] ?></th>
        <th><a href="../../pages/triagem/triagem-cadastro.php?id=<?php echo $row['ID_recepcao']?>"><button class="botao_acao">Triagem</button></a></th>
    </tr>
<?php } 

?>
 
 