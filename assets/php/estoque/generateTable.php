<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="../../css/estoque.css">
<!-- Captura as informações do banco e reproduzem na tabela -->
<?php
    
    if(isset($_GET['prod'])){
        $selec = "SELECT * from tbl_estoque WHERE ID_produto = '".$_GET['prod']."'";
        $query = mysqli_query($conexao, $selec);

        if ($query->num_rows == 0) {                
            grtTables($result, $conexao);
            $voltar="";
        } else {
            $nomeProd = mysqli_fetch_assoc(mysqli_query($conexao, "select nomeProduto from tbl_estoque where ID_produto = '".$_GET['prod']."'"))['nomeProduto'];

            echo('<label class="dataTables_busca"> Exibindo os lotes do produto: '.$nomeProd.'</label>');

            $lotes = mysqli_query($conexao, "select * from tbl_lotes where prod_id = '".$_GET['prod']."'");
            ?>
            <table id="tableEstoque" class="display cell-border nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Lote</th>
                        <th>Quantidade</th>
                        <th>Validade</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
            <?php
            foreach ($lotes as $lote) {
                if($lote['validade'] == '00000-00-00'|| $lote['validade'] ==''){
                    $showValid = 'Indeterminado';
                    $semafaro = "verde";
                    $semafaroVal = 3;
                }else{
                    $showValid = date('d/m/Y',strtotime($lote['validade']));
                    $semafaro = semafaro($lote['validade']);
                    $semafaroVal = semafaroValue($lote['validade']);                        
                }
                ?>
                    <tr>
                        <td><?php echo($lote['lote'])?></td>
                        <td><?php echo($lote['qtd'])?></td>
                        <td><?php  echo $showValid?></td>
                        <td><div class="status_fix"><?php echo $semafaroVal?></div><div class="<?php echo $semafaro;?>"></div></td>
                    </tr>
                <?php
                
            }
            ?>
                </tbody>
                </table>
            <?php
            $voltar = " <a class='botao_submit px-8 pt-2 pb-2 ms-2' href='./' data-toggle='tooltip' data-placement='top' title='Relatório'><img src='../../icones/cancelar-branco.svg' alt='cancelar-branco.svg.svg'>Voltar</a>";
        }
    } else {
        grtTables($result, $conexao);
        $voltar="";
    }

            function grtTables($r, $con) {
                ?>
                    <table id="tableEstoque" class="display cell-border nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Quantidade</th>
                                <th>Unidade de Medida</th>
                                <th>Validade</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php                
                while ($row = mysqli_fetch_assoc($r)) {
                    $lotes = mysqli_query($con, "SELECT * from tbl_lotes where prod_id = '".$row['id']."' and qtd > 0");
                    $valid = '';
                    $qtdTot = 0;
                    foreach ($lotes as $lote) {                
                        $qtdTot += $lote['qtd'];
                        if ($valid == '') {
                            $valid = $lote['validade'];
                        } elseif (diffDaysToday($valid) > diffDaysToday($lote['validade'])) {
                            $valid = $lote['validade'];
                        }
                    }

                   if ($qtdTot != 0) { 
                    if($valid == '0000-00-00'||$valid==''){
                        $showValid = 'Indeterminado';
                        $semafaro = "verde";
                        $semafaroVal = 3;
                    }else{
                        $showValid =date('d/m/Y',strtotime($valid));
                        $semafaro = semafaro($valid);
                        $semafaroVal = semafaroValue($valid);                        
                    }
                        ?>
                    <tr>
                            <td><?php echo $row["Prod"] ?></td>
                            <td><?php echo $qtdTot ?></td>
                            <td><?php echo $row["uniMed"] ?></td>
                            <td><?php echo $showValid ?></td>
                            <td><div class="status_fix"><?php echo $semafaroVal?></div><div class="<?php echo $semafaro;?>"></div></td>
                            <td><button onclick="chama('<?php echo($row['id'])?>')" class="botao_acao">Visualizar Lotes</button></td>
                        </tr> 
                        <?php
                  }
            
                            
            }
            ?>
                 </tbody>
                </table>
            <?php
            }
        ?>