<?php
    require_once('../util.php');
    $permis = 'permissoes,';
    for ($i = 0; $i < 12; $i++) {
        $permis .= isset($_POST['check'.$i]) ? $_POST['check'.$i].',' : '';
    }
    if (mysqli_query($conexao, "update tbl_cargo set permissoes = '".rtrim($permis, ', ')."' where ID_cargo = '".$_POST['id']."'"))  {
        generateWarning('Grupo de serviço atualizado com sucesso!', false);
    } else {
        generateWarning('Grupo de serviço não foi atualizado');
    }
    header('location:../../pages/cadastroDeUsuarios/gerenciamento-editar.php?id='.$_POST['id']);
?>