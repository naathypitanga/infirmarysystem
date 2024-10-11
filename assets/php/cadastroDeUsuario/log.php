<?php
    $command = mysqli_query($conexao,"select tbl_usuarios.nomeCompleto as user, tbl_accesslog.data_log as data, ip, tbl_usuarios.foto as foto from tbl_accesslog inner join tbl_usuarios on tbl_accesslog.user_id = tbl_usuarios.CPF order by tbl_accesslog.data_log desc");

    foreach ($command as $studant) {
        ?>
            <tr>
                <td><?php echo(date('d/m/Y', strtotime($studant['data'])))?></td>
                <td><img src="<?php
                    echo($studant['foto'] != null ? "../../php/userConfig/uploads/" .$studant['foto'] : '../../icones/perfil-branco.svg' )
                ?>" alt="" style="width: 30px; height: 30px; border-radius: 50%;"></td>
                <td><?php echo($studant['user'])?></td>
                <td><?php echo(date('H:i:s', strtotime($studant['data'])))?></td>
                <td><?php echo($studant['ip'])?></td>
            </tr>
        <?php
    }
?>