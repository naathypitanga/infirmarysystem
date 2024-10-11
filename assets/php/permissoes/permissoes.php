<?php
$url = $_SERVER['REQUEST_URI'];

$sqlValid = "SELECT tbl_usuarios.CPF, tbl_cargo.permissoes FROM tbl_usuarios INNER JOIN tbl_cargo ON tbl_usuarios.ID_cargo = tbl_cargo.ID_cargo WHERE CPF = '".$_SESSION['user']['CPF']."'";
$queryValid = mysqli_query($conexao, $sqlValid);
$queryValid = mysqli_fetch_assoc($queryValid);

$pagErro = 'Location:http://172.17.34.254:1200/projetos/202100002/projetointegrador/assets/pages/erro/error.php';

if(strpos($url,'/pages/atendConsultas/' )){
    
    if(strpos($queryValid['permissoes'],"atendCons")==false){
        header($pagErro);
        ob_end_flush();
    }
    
}

if(strpos($url,'/pages/historicodaunidade/')){
    
    if(strpos($queryValid['permissoes'],"histUn")==false){
        header($pagErro);
        ob_end_flush();
    }
    
}

if(strpos($url,'/pages/triagem/' )){
    
    if(strpos($queryValid['permissoes'],"triaCons")==false){
        header($pagErro);
        ob_end_flush();
    }
    
}

if(strpos($url,'/pages/recepcao/' )){
    
    if(strpos($queryValid['permissoes'],"recp")==false){
        header($pagErro);
        ob_end_flush();
    }
    
}

if(strpos($url,'/pages/estoque/' )&&$_SESSION['unidade']=='UPA'){
    
    if(strpos($queryValid['permissoes'],"estUP")==false){
        header($pagErro);
        ob_end_flush();
    }
    
}

if(strpos($url,'/pages/estoque/' )&&$_SESSION['unidade']=='UBS'){
    
    if(strpos($queryValid['permissoes'],"estUB")==false){
        header($pagErro);
        ob_end_flush();
    }
    
}

if(strpos($url,'/pages/estoque/' )&&$_SESSION['unidade']=='ESTOQUE'){
    ?><script> console.log("<?php echo($queryValid['permissoes']) ?>")</script><?php
    if(strpos($queryValid['permissoes'],"estG")==false){
        header($pagErro);
        ob_end_flush();
    }
    
}

if(strpos($url,'/pages/estoque/entrada-produto.php' )){
    
    if(strpos($queryValid['permissoes'],"movEst")==false){
        header($pagErro);
        ob_end_flush();
    }
    
}

if(strpos($url,'/pages/estoque/cadastrar-produto.php' )){
    
    if(strpos($queryValid['permissoes'],"cadEst")==false){
        header($pagErro);
        ob_end_flush();
    }
    
}

if(strpos($url,'/pages/cadastroDeUsuarios/' )){
    
    if(strpos($queryValid['permissoes'],"cadUser")==false){
        header($pagErro);
        ob_end_flush();
    }
    
}