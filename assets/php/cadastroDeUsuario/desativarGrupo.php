<?php
    require_once('../util.php');
    $usersGroup = mysqli_query($conexao, "select * from tbl_usuarios where ID_cargo = '".$_GET['id']."' and ativo = 1");
    if ($usersGroup->num_rows == 0) {
        if (mysqli_query($conexao, "delete from tbl_cargo where ID_cargo = '".$_GET['id']."'")) {
            generateWarning('Grupo de serviço excluido!', false);
        } else {
            generateWarning('Ouve algum erro inesperado!');
        }
    } else {
        generateWarning('Não podem conter usuários cadastrados no Grupo: <b>'.mysqli_fetch_assoc(mysqli_query($conexao, "select * from tbl_cargo where ID_cargo = '".$_GET['id']."'"))['descricao'].'</b> para ocorrer a exclusão. Existem <b>'.$usersGroup->num_rows.'</b> usuários cadastrados no grupo');
    }
    header('location:../../pages/cadastroDeUsuarios/gerenciamento-usuario.php');
?>