<?php
$url = $_SERVER['REQUEST_URI'];
if (isset($_SESSION['unidade'])&&$_SESSION['unidade']=="ESTOQUE"){

        if(strpos($url,'/pages/estoque/')==false){
            unset($_SESSION['unidade']);
            header('location: http://172.17.34.254:1200/projetos/202100002/projetointegrador/assets/pages/seletordeunidademobile/');
            ob_end_flush();
        }

}

if (isset($_SESSION['unidade'])&&$_SESSION['unidade']=="CADUSER"){

        if(strpos($url,'/pages/cadastroDeUsuarios/')==false){
            unset($_SESSION['unidade']);
            header('location: http://172.17.34.254:1200/projetos/202100002/projetointegrador/assets/pages/seletordeunidademobile/');
            ob_end_flush();
        }

}

if (isset($_SESSION['unidade'])&&$_SESSION['unidade']=="EDTUSER"){

    if(strpos($url,'/pages/configuracaoDeUsuario')==false){
        unset($_SESSION['unidade']);
        header('location: http://172.17.34.254:1200/projetos/202100002/projetointegrador/assets/pages/seletordeunidademobile/');
        ob_end_flush();
    }

}