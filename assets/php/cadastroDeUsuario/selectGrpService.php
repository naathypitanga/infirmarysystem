<?php
//lista as opções do grupo de serviço da tabela tbl_cargo
$sql = "SELECT * FROM `tbl_cargo`";
$query = mysqli_query($conexao, $sql);
$usr = "SELECT * FROM tbl_usuarios where CPF = '".$_GET['id']."'";
$usr = mysqli_query($conexao, $usr);
$usr = mysqli_fetch_assoc($usr);

while($row = mysqli_fetch_assoc($query)){
    if ($usr['ID_cargo'] == $row['ID_cargo']) {
        $select = 'selected';
    } else {
        $select = '';
    }
    echo '<option '.$select.' value="'.$row['ID_cargo'].'">'.$row['descricao'].'</option>';
}

?>