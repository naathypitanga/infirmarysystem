<?php
    require_once('../util.php');

    validacoesEndereco();
    
    $idResp = validResp($conexao);
    $idEndere = validEndereco($conexao);

    if (isset($_POST['id']) && $_POST['id'] != null && $_POST['id'] != "") {        
        $idPaciente = $_POST['id'];     
        if (!mysqli_query($conexao, "update tbl_paciente set nome = '".$_POST['nome']."', cns = '".replace_cpf($_POST['cns'])."', 
            cpf = '".replace_cpf($_POST['cpf'])."', rg = '".replace_cpf($_POST['rg'])."', nascimento = '".$_POST['datan']."', 
            genero = '".$_POST['genero']."', telefone = '".replace_tel($_POST['telefone'])."', nomeMae = '".$_POST['nomeMae']."', 
            nomePai = '".$_POST['nomePai']."', idRespons = '".$idResp."', idEnder = '".$idEndere."', nomeSocial = '".$_POST['nomeS']."' where id = '".$idPaciente."'"
        )) {
            quitPhp('Erro inesperado ao atualizar o paciente!');
        }
    } else {        
        if (!mysqli_query($conexao, "insert into tbl_paciente (nome, cns, cpf, rg, nascimento, genero, telefone, nomeMae, nomePai, idRespons, idEnder, nomeSocial) values ('".$_POST['nome']."',
            '".replace_cpf($_POST['cns'])."','".replace_cpf($_POST['cpf'])."','".replace_cpf($_POST['rg'])."','".$_POST['datan']."',
            '".$_POST['genero']."','".replace_tel($_POST['telefone'])."','".$_POST['nomeMae']."', '".$_POST['nomePai']."', '".$idResp."', '".$idEndere."', '".$_POST['nomeS']."')"
        )) {
            quitPhp('Erro inesperado ao cadastrar o paciente!');
        }
        $idPaciente = mysqli_fetch_assoc(mysqli_query($conexao, "select id from tbl_paciente where nome = '".$_POST['nome']."' and cns = '".replace_cpf($_POST['cns'])."' and 
        cpf = '".replace_cpf($_POST['cpf'])."' and rg = '".replace_cpf($_POST['rg'])."' and nascimento = '".$_POST['datan']."' and 
        genero = '".$_POST['genero']."' and telefone = '".replace_tel($_POST['telefone'])."' and nomeMae = '".$_POST['nomeMae']."' and 
        nomePai = '".$_POST['nomePai']."' and idRespons = '".$idResp."' and idEnder = '".$idEndere."' and nomeSocial = '".$_POST['nomeS']."'")
        )['id'];
    }   
    
    if (mysqli_query($conexao, "insert into tbl_recepcao (ID_paciente, ID_usuario, dia, localAtend, municipio, unOrig) values ('".$idPaciente."', '".$_SESSION['user']['CPF']."',
        '".date('Y-m-d H:i:s')."', '".$_POST['localAtend']."', '".$_POST['municipio']."', '".$_POST['unOrig']."')")) {
        quitPhp('Paciente recepcionado com Sucesso!', true);
    } else {
        quitPhp('Ouve alguma falha inesperada!');
    }

    function validResp($conn) {
        $ids = [];
        if (calcAge(diffDaysToday($_POST['datan'])) < 18) {
            validacoesRespons();
            validacoesEndereco('Resp');
            $ids['endResp'] = validEndereco($conn, 'Resp');
            if (isset($_POST['idResp']) && $_POST['idResp'] != null && $_POST['idResp'] != "") {
                $ids['resp'] = $_POST['idResp'];
                if (!mysqli_query($conn, "update tbl_responsavel set nome = '".$_POST['nomeResp']."', cns = '".replace_cpf($_POST['cnsResp'])."', 
                    cpf = '".replace_cpf($_POST['cpfResp'])."', rg = '".replace_cpf($_POST['rgResp'])."', nascimento = '".$_POST['datanResp']."', 
                    genero = '".$_POST['generoResp']."', telefone = '".replace_tel($_POST['telefoneResp'])."', idEnderc = '".$ids['endResp']."' where id = '".$ids['resp']."'"
                )) {
                    quitPhp('Erro inesperado ao atualizar o responsavel!');
                }
            } else {
                if (!mysqli_query($conn, "insert into tbl_responsavel (nome, cns, cpf, rg, nascimento, genero, telefone, idEnderc) values ('".$_POST['nomeResp']."',
                    '".replace_cpf($_POST['cnsResp'])."','".replace_cpf($_POST['cpfResp'])."','".replace_cpf($_POST['rgResp'])."','".$_POST['datanResp']."',
                    '".$_POST['generoResp']."','".replace_tel($_POST['telefoneResp'])."','".$ids['endResp']."')"
                )) {
                    quitPhp('Erro inesperado ao cadastrar o responsavel!');
                }
                $ids['resp'] = mysqli_fetch_assoc(mysqli_query($conn, "select id from tbl_responsavel where nome = '".$_POST['nomeResp']."' and cns = '".replace_cpf($_POST['cnsResp'])."' and 
                    cpf = '".replace_cpf($_POST['cpfResp'])."' and rg = '".replace_cpf($_POST['rgResp'])."' and nascimento = '".$_POST['datanResp']."' and 
                    genero = '".$_POST['generoResp']."' and telefone = '".replace_tel($_POST['telefoneResp'])."' and idEnderc = '".$ids['endResp']."'")
                )['id'];
            }
        } else {
            $ids['resp'] = null;
        }
        return $ids['resp'];
    }

    function validEndereco($conn, $prefix = '') {        
        if (isset($_POST['idEnd'.$prefix]) && $_POST['idEnd'.$prefix] != null && $_POST['idEnd'.$prefix] != "") {    
            if (mysqli_query($conn, "select * from tbl_endereco where cep = '".replace_cpf($_POST['cep'.$prefix])."' and
                rua = '".$_POST['rua'.$prefix]."' and numero = ".$_POST['num'.$prefix]." and bairro = '".$_POST['bair'.$prefix]."' and
                cidade = '".$_POST['city'.$prefix]."' and estado = '".$_POST['esta'.$prefix]."'"
            )->num_rows == 0) {
                $idEndereco = insertEnd($conn, $prefix);
            } else {
                $idEndereco = $_POST['idEnd'.$prefix];
                if (!mysqli_query($conn, "update tbl_endereco set cep = '".replace_cpf($_POST['cep'.$prefix])."',
                    rua = '".$_POST['rua'.$prefix]."', numero = ".$_POST['num'.$prefix].", bairro = '".$_POST['bair'.$prefix]."',
                    cidade = '".$_POST['city'.$prefix]."', estado = '".$_POST['esta'.$prefix]."' where id = '".$idEndereco."'"
                )) {
                    quitPhp('Erro inesperado ao atualizar o endereço');
                }
            }
        } else {         
            $idEndereco = insertEnd($conn, $prefix);
        }
        return $idEndereco;
    }
    
    function insertEnd($conn, $prefix) {
        $idEndereco = md5(replace_cpf($_POST['cep'.$prefix]).$_POST['rua'.$prefix].$_POST['num'.$prefix].$_POST['bair'.$prefix].$_POST['city'.$prefix].$_POST['esta'.$prefix]);
        if (!mysqli_query($conn, "insert into tbl_endereco values ('".$idEndereco."', '".replace_cpf($_POST['cep'.$prefix])."', '".$_POST['rua'.$prefix]."',
            ".$_POST['num'.$prefix].", '".$_POST['bair'.$prefix]."', '".$_POST['city'.$prefix]."', '".$_POST['esta'.$prefix]."')"
        )) {
            quitPhp('Erro inesperado ao cadastrar o endereço');
        }
        return $idEndereco;
    }

    function quitPhp($msgQuit, $isSuccess = false) {
        $_SESSION['info'] = $isSuccess ? null : $_POST; 
        generateWarning($msgQuit, $isSuccess);
        header('location:../../pages/recepcao/index.php');
        exit();
    }

    function validacoesEndereco($prefix = '') {
        if (preg_match('/[^0-9]/', replace_cpf($_POST['cep'.$prefix]))) {
            quitPhp('Digite um CEP válido!');
        } elseif (strlen(replace_cpf($_POST['cep'.$prefix])) != 0 && strlen(replace_cpf($_POST['cep'.$prefix])) != 8) {
            quitPhp('Digite um CEP válido!');
        } elseif (preg_match('/[^0-9]/',$_POST['num'.$prefix])) {
            quitPhp('Digite um número válido!');
        }
    }
    
    function validacoesRespons() {
        if ((!isset($_POST['cnsResp']) && $_POST['cnsResp'] == null && $_POST['cnsResp'] == '') &&
            (!isset($_POST['cpfResp']) && $_POST['cpfResp'] == null && $_POST['cpfResp'] == '')) {
            quitPhp('Pelo menos o CNS ou CPF do responsável precisam ser informados');
        } elseif (preg_match('/[^0-9]/', replace_cpf($_POST['cnsResp']))) {
            quitPhp('Digite um CNS de responsável válido!');            
        } elseif (strlen(replace_cpf($_POST['cnsResp'])) != 0 && strlen(replace_cpf($_POST['cnsResp'])) != 12) {
            quitPhp('Digite um CNS de responsável válido!');            
        }elseif (preg_match('/[^0-9]/', replace_cpf($_POST['cpfResp']))) {
            quitPhp('Digite um CPF de responsável válido!');            
        }elseif (validaCPF($_POST['cpfResp'])) {
            quitPhp('Digite um CPF válido!');            
        } elseif (strlen(replace_cpf($_POST['cpfResp'])) != 0 && strlen(replace_cpf($_POST['cpfResp'])) != 11) {
            quitPhp('Digite um CPF de responsável válido!');            
        }elseif (preg_match('/[^0-9]/', replace_cpf($_POST['rgResp']))) {
            quitPhp('Digite um rg de responsável válido!');            
        } elseif (strlen(replace_cpf($_POST['rgResp'])) != 0 && strlen(replace_cpf($_POST['rgResp'])) != 9) {
            quitPhp('Digite um rg de responsável válido!');            
        }
    }

    function validacoesPacient() {
        if ((!isset($_POST['cns']) && $_POST['cns'] == null && $_POST['cns'] == '') &&
            (!isset($_POST['cpf']) && $_POST['cpf'] == null && $_POST['cpf'] == '')) {
            quitPhp('Pelo menos o CNS ou CPF precisam ser informados');
        }elseif (preg_match('/[^0-9]/', replace_cpf($_POST['cns']))) {
            quitPhp('Digite um CNS válido!');            
        } elseif (strlen(replace_cpf($_POST['cns'])) != 0 && strlen(replace_cpf($_POST['cns'])) != 12) {
            quitPhp('Digite um CNS válido!');            
        }elseif (preg_match('/[^0-9]/', replace_cpf($_POST['cpf']))) {
            quitPhp('Digite um CPF válido!');            
        }elseif (validaCPF($_POST['cpf'])) {
            quitPhp('Digite um CPF válido!');            
        } elseif (strlen(replace_cpf($_POST['cpf'])) != 0 && strlen(replace_cpf($_POST['cpf'])) != 11) {
            quitPhp('Digite um CPF válido!');            
        }elseif (preg_match('/[^0-9]/', replace_cpf($_POST['rg']))) {
            quitPhp('Digite um rg válido!');            
        } elseif (strlen(replace_cpf($_POST['rg'])) != 0 && strlen(replace_cpf($_POST['rg'])) != 9) {
            quitPhp('Digite um rg válido!');            
        }
    }
?>