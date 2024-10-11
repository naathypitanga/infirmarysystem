<?php

$sqlUsers = "SELECT tbl_usuarios.nomeCompleto,tbl_cargo.descricao,tbl_usuarios.ativo,tbl_usuarios.CPF from tbl_usuarios inner join tbl_cargo on tbl_usuarios.ID_cargo = tbl_cargo.ID_cargo";
$queryUsers = mysqli_query($conexao, $sqlUsers);



while ($row = mysqli_fetch_assoc($queryUsers)){
?>
<tr>
    <td><?php echo $row['nomeCompleto']?></td>
    <td><?php echo $row['descricao'] ?></td>
    <td><div class="status_fix"><?php echo $row['ativo']?></div><div class="<?php echo $row['ativo'] == 1 ? 'verde' : 'vermelho';?>"></div></td>
    <td><a href="./cadastrar-usuario.php?id=<?php echo $row['CPF'] ?>"><button class="botao_acao" alt="botao-editar.svg" data-toggle="tooltip" data-placement="top" title="Editar Usuário"><img src="../../icones/botao-editar.svg" ></button></a>
    <a href="../../php/cadastroDeUsuario/desativar.php?id=<?php echo $row['CPF'] ?>"><button class="botao_acao" data-toggle="tooltip" data-placement="top" title="Desligar Usuário"><img src="../../icones/botao-desligar.svg" alt="botao-desligar.svg" ></button></a></td>
</tr>

<?php } ?>