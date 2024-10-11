<?php
    include('../../php/util.php');



    if(isset($_POST['nomeProduto'])){ 

        $usuario=$_SESSION['user']['CPF'];
        $nomeProduto=$_POST['nomeProduto'];
        $quantidade=$_POST['quantidade'];
        $undMedida=$_POST['undMedida'];
        $validade=$_POST['validade'];
        $lote=$_POST['lote'];
        
        if ($validade != "") {
            if (diffDaysToday($validade) <= 0) {  //Valida se a validade é menor que a data atual
                $_SESSION['informations'] = $_POST;
                generateWarning("A validade não pode ser anterior a data atual");
                header("location:../../pages/estoque/cadastrar-produto.php");
                exit();
            }
        }

        $ttrProduto = trim(filter_input(INPUT_POST, 'nomeProduto'));

        if (preg_match('/[^\sa-zA-ZÀ-Úà-ú]/', $ttrProduto)) {  //Valida se contem caracteres especiais no nome do produto
            $_SESSION['informations'] = $_POST;
            generateWarning("Não pode conter caracteres especiais no nome do produto");
            header("location:../../pages/estoque/cadastrar-produto.php");
            exit();
        }



        if($nomeProduto<>""&&$quantidade<>""&&$undMedida<>""&&$lote<>""){
            if (mysqli_query($conexao, "select * from tbl_estoque where nomeProduto = '".$nomeProduto."'")->num_rows == 0) {
                mysqli_query($conexao, "insert into tbl_estoque (ID_usuario, nomeProduto, unidadeDeMedida) values ('".$usuario."', '".$nomeProduto."', '".$undMedida."')");
            } 
            $prodId = mysqli_fetch_assoc(mysqli_query($conexao, "select * from tbl_estoque where nomeProduto = '".$nomeProduto."'"))['ID_produto'];
            if ($prodId != "" && isset($prodId) && $prodId != null) {
                if (mysqli_query($conexao, "select * from tbl_lotes where prod_id = '".$prodId."' and lote = '".$lote."'")->num_rows == 0) {
                    mysqli_query($conexao, "insert into tbl_lotes (prod_id, ID_usuario, qtd, lote, validade) values ('$prodId', '$usuario', $quantidade, '$lote', '$validade')");    
                } else {
                    $_SESSION['informations'] = $_POST;
                    generateWarning("Lote já atrelado ao produto informado!");
                    header("location:../../pages/estoque/cadastrar-produto.php");
                    exit();
                }
            }
        }else{
            $_SESSION['informations'] = $_POST;
            generateWarning("A informações a serem preenchidas<br>");
        }
        
        
    };
    
    if(mysqli_affected_rows($conexao)>0){
        generateWarning("Produto cadastrado com sucesso!");
    }else{
        $_SESSION['informations'] = $_POST;
        generateWarning("Erro ao cadastrar o produto");
    }

    header("location:../../pages/estoque/cadastrar-produto.php");
?>