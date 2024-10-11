<?php
//Constrói os lotes
    foreach ($result as $produto) {
        echo("{id_produto: '".$produto['ID_produto']."',lote: [");
        $lotes = mysqli_query($conexao, "select * from tbl_lotes where prod_id = '".$produto['ID_produto']."'");
        $qtdTot = 0;
        foreach ($lotes as $lote) {
            $qtdTot += $lote['qtd'];
            echo("{id: '".$lote['id']."', qtd: ".$lote['qtd'].", validade: '".date('d/m/Y', strtotime($lote['validade']))."', desc: '".$lote['lote']."'},");
        }
        echo('],qtdTot: '.$qtdTot.'},');
    }
?>