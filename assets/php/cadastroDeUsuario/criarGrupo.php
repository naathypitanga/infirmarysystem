<?php
    require_once('../util.php');
    $permis = 'permissoes,';
    for ($i = 0; $i < 12; $i++) {
        $permis .= isset($_POST['check'.$i]) ? $_POST['check'.$i].',' : '';
    }
    if (mysqli_query($conexao, "insert into tbl_cargo (ID_cargo, descricao, permissoes) values (UUID(), '".$_POST['descricao']."', '".rtrim($permis, ', ')."')"))  {
        generateWarning('Grupo de serviço criado com sucesso!', false);
    } else {
        generateWarning('Grupo de serviço não foi criado');
    }
    header('location:../../pages/cadastroDeUsuarios/gerenciamento-cadastro.php');
?>