<?php
    //NOTIFICAÇÕES DE VÁLIDADE (cria as notificações de válidade)
    date_default_timezone_set('America/Sao_Paulo');
    $sqlLotes = "SELECT * FROM `tbl_lotes` ";
    $sqlEstoque = "SELECT * FROM `tbl_estoque`";
  

    $queryLotes = mysqli_query($conexao,$sqlLotes);
    $queryEstoque = mysqli_query($conexao,$sqlEstoque);

    while($row = mysqli_fetch_assoc($queryLotes)){
        $valid=$row['validade'];

        $diff=DiffDaysToday($valid);

        $sqlInner = "SELECT tbl_estoque.nomeProduto, tbl_lotes.validade, tbl_lotes.qtd from tbl_lotes INNER JOIN tbl_estoque on tbl_estoque.ID_Produto = tbl_lotes.prod_id WHERE id ='".$row['id']."'";

        $Inner = mysqli_query($conexao,$sqlInner);
        $Inner = mysqli_fetch_assoc($Inner);
        
        if (isset($Inner['nomeProduto']) && $Inner['nomeProduto'] != null && $Inner['nomeProduto'] != '') {

            if($diff<90&&$diff>0&&$Inner['qtd']>0){
                $user_id = md5($_SESSION["user"]["CPF"]);
                $id=md5($Inner['nomeProduto']."perdendo".$user_id);

                if (mysqli_query($conexao, "select * from tbl_delNotific where idNoti = '".$id."'")->num_rows == 0) {
                    $msg= "O produto ".$Inner['nomeProduto']." tem apenas $diff dias de validade";
                        $type= 1;
                        $user_group ="all";
                        $cat= "Estoque";
                        $target="http://172.17.34.254:1200/projetos/202100002/projetointegrador/assets/pages/estoque/";
                        $sql="INSERT INTO tbl_notificacao (id, msg, type, cat, user_group,target,user_id,visualizado) VALUES ('$id','$msg',$type,'$cat','$user_group','$target','$user_id',0);";
                        $sendSQL=mysqli_query($conexao,$sql);
                }

            }
    
        //SINALEIRO
    
            //Sinal amarelo
            if($diff<30&&$diff>0&&$Inner['qtd']>0){
                $user_id = $_SESSION["user"]["CPF"];
                $id=md5($Inner['nomeProduto']."quasePerdendo".$user_id);

                if (mysqli_query($conexao, "select * from tbl_delNotific where idNoti = '".$id."'")->num_rows == 0) {
                    $msg= "O produto ".$Inner['nomeProduto']." tem apenas $diff dias de validade";
                        $type= 1;
                        $user_group ="all";
                        $cat= "Estoque";
                        $target="http://172.17.34.254:1200/projetos/202100002/projetointegrador/assets/pages/estoque/";
                        $sql="INSERT INTO tbl_notificacao (id, msg, type, cat, user_group,target,user_id,visualizado) VALUES ('$id','$msg',$type,'$cat','$user_group','$target','$user_id',0);";
                        $sendSQL=mysqli_query($conexao,$sql);
                }
            }
            //Sinal vermelho
            if($diff<0){
                $user_id = md5($_SESSION["user"]["CPF"]);
                $id=md5($Inner['nomeProduto']."perdemo".$user_id);

                if (mysqli_query($conexao, "select * from tbl_delNotific where idNoti = '".$id."'")->num_rows == 0) {
                    $msg= "O produto ".$Inner['nomeProduto']." passou da validade";
                        $type= 2;
                        $user_group ="all";
                        $cat= "Estoque";
                        $target="http://172.17.34.254:1200/projetos/202100002/projetointegrador/assets/pages/estoque/";
                        $sql="INSERT INTO tbl_notificacao (id, msg, type, cat, user_group,target,user_id,visualizado) VALUES ('$id','$msg',$type,'$cat','$user_group','$target','$user_id',0);";
                        $sendSQL=mysqli_query($conexao,$sql);
                }
            }
        }

    }

    //NOTIFICAÇÕES DE SENHA
    $sqlUser = "SELECT * FROM tbl_usuarios WHERE CPF = '".$_SESSION['user']['CPF']."'";
    $userQuery = mysqli_query($conexao, $sqlUser);

    while($row = mysqli_fetch_assoc($userQuery)){
        $id = $_SESSION['user']['CPF']."senha";
        if($row['CPF']==$row['senha']){
            $msg= "Você está utilizando a senha padrão, altere sua senha!";
            $type= 1;
            $user_group ="all";
            $cat= "Segurança";
            $target="/projetos/202100002/projetointegrador/assets/pages/configuracaoDeUsuario/configUsuario.php";
            $sql="INSERT INTO tbl_notificacao (id, msg, type, cat, user_group,target,user_id,visualizado) VALUES ('$id','$msg',$type,'$cat','$user_group','$target','$user_id',0);";
            $sendSQL=mysqli_query($conexao,$sql);
        }
    }

?>