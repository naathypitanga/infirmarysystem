<?php 
// Faz a movimentação do estoque
    include('../util.php');

    if(!isset($_POST['tipo'])){
        header("Location:../../pages/estoque/entrada-produto.php");
        exit();
    };
    $tipo= $_POST['tipo'];
    $item= str_replace('"', "", $_POST['lote']) ;
    $qnt= $_POST['qtde'];
    if($tipo==1){ 
        $qtde = $qnt;
        $sql2= "UPDATE tbl_lotes SET qtd = qtd+$qnt WHERE id= '$item';";
    }elseif($tipo==0){
        $qtde = -$qnt;
        if ($qnt <= mysqli_fetch_assoc(mysqli_query($conexao, "select qtd from tbl_lotes where id = '$item'"))["qtd"]) {
            $sql2= "UPDATE tbl_lotes SET qtd = qtd-$qnt WHERE id= '$item';";
        } else {
            generateWarning("A quantidade de saida não pode ser maior que a quantidade contida no estoque."); 
        }
    }

    if (isset($sql2)) {
        $result2=mysqli_query($conexao,$sql2);
        if(mysqli_affected_rows($conexao)>0){
            $sql3 = "insert into tbl_movimentacao (ID_lote, ID_usuario, quantidadeMovimentada, dataCompleta) values ('".$item."', '".$_SESSION["user"]["CPF"]."', ".$qtde.",'".setDate()."')";
            mysqli_query($conexao, $sql3);
            generateWarning("Alteração executada com sucesso!", false);
        }else{
            generateWarning("Ocorreu um erro durante o processo");
        }
    }
    header("Location:../../pages/estoque/entrada-produto.php");
    mysqli_close($conexao);
?>