<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="../../css/estoque.css">

<?php
    $moviment = mysqli_query($conexao, "select estq.nomeProduto as nomeProduto, estq.unidadeDeMedida as unidMed, lot.lote as lote, lot.validade as valid, moviment.quantidadeMovimentada as qtdMovi, moviment.dataCompleta as dataComp, tbUser.nomeCompleto as nomeComp from tbl_movimentacao as moviment inner join tbl_lotes as lot on moviment.ID_lote = lot.id inner join tbl_estoque as estq on lot.prod_id = estq.ID_produto inner join tbl_usuarios as tbUser on moviment.ID_usuario = tbUser.CPF")
    ?>
        <table id="tableEstoque" class="display cell-border nowrap" style="width:100%" border ="1">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Lote</th>
                    <th>Unidade de medida</th>
                    <th>Validade</th>
                    <th>Tipo de movimentação</th>
                    <th>Quantidade Movimentada</th>
                    <th>Data da Movimentação</th>
                    <th>Usuário</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($moviment as $element) {
                        if($element['valid'] == '0000-00-00'||$element['valid']==''){
                            $showValid = 'Indeterminado';
                        }else{
                            $showValid = date('d/m/Y',strtotime($element['valid']));                
                        }
                        ?>
                            <tr>
                                <td><?php echo($element['nomeProduto'])?></td>
                                <td><?php echo($element['lote'])?></td>
                                <td><?php echo($element['unidMed'])?></td>
                                <td><?php echo($showValid)?></td>
                                <td><?php echo($element['qtdMovi'] > 0 ? "Entrada" : "Saida")?></td>
                                <td><?php echo($element['qtdMovi'] > 0 ? $element['qtdMovi'] : $element['qtdMovi'] * -1)?></td>
                                <td><?php echo(date('d/m/Y H:i:s', strtotime($element['dataComp'])))?></td>
                                <td><?php echo($element['nomeComp'])?></td>
                            </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    <?php
    $voltar = '';
?>