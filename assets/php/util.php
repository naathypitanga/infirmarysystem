<?php
    session_start();
    require_once("conexao.php");
    date_default_timezone_set('America/Sao_Paulo');
   // require_once('http://172.17.34.254:1200/projetos/202100002/projetointegrador/assets/seaLibrary/seaLibrary.php');

    function generateCode($prefix = "S-", $lenght = 6) {  //Gera um token, com um prefixo padrão sendo 'S-' e um tamanho de 6 digitos a partir do prefixo
        $code = $prefix;
        for($i = 0; $i < $lenght; $i++) {
            $code .= rand(0,9);
        }
        return $code;
    }

    function generateWarning($msg, $isWarning = true) {  //Gera um aviso que é mostrado em um alert como parametro uma msg obrigatamente, e sendo 'isWarning' como true, pois a maioria dos alertas são negativos
        $_SESSION["warning"] = [
            "have" => $isWarning,
            "msg" => $msg
        ];
    }

    function generateDate($addHour, $addMinute = 0, $addSecond = 0) {  //Gera uma data para calculo, no formato padão do php, adicionando ou hora(Parametro obrigatório), Minutos e segundos
        return strtotime(
            date('H')+$addHour . ":" . date('i')+$addMinute . ":" . date('s')+$addSecond
        );
    }

    function setDate() {  //Gera uma data com o fuzo horário brasileiro
        $Object = new DateTime();  
        $Object->setTimezone(new DateTimeZone('GMT-3'));
        return $Object->format("Y-m-d H:i:s");
    }
    
    function replace_cpf($cpf){  //Altera o cpf para retirar a máscara de entrada
        return str_replace(".", "", str_replace("-", "", $cpf));
    }

    function replace_tel($tell){  //Altera o cpf para retirar a máscara de entrada
        return str_replace("(", "", str_replace(")", "", str_replace("-", "", str_replace(" ", "", $tell))));
    }

    function generateName(){
        return $_SESSION["user"]["nomeCompleto"];
    }

    function createModalWarnings() {
        if (isset($_SESSION["warning"])) {
            ?>
                <div class="modal fade" tabindex="-1" id="modalMov">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark"><?php
                                    if (!$_SESSION["warning"]["have"]) {
                                        echo("Sucesso");
                                    } else {
                                        echo("Atenção");
                                    }
                                ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: #fff;"></button>
                            </div>
                            <div class="modal-body text-dark">
                                <p><?php echo($_SESSION["warning"]["msg"])?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(() => {
                        $("#modalMov").modal(`show`)
                    });
                </script>
            <?php
            unset($_SESSION["warning"]);
        }
    }

    function semafaro($validade, $diasAmarelo = 90, $diasVermelho=0){
        date_default_timezone_set('America/Sao_Paulo'); //define o horario padrão

        $diff = diffDaysToday($validade);

        if($diff>$diasAmarelo){ 
            $class= "verde";
        }elseif($diff<$diasAmarelo&&$diff>$diasVermelho){
            $class="amarelo";
        }else{
            $class="vermelho";
        }
        return $class;
    }

    function semafaroValue($validade, $diasAmarelo = 90, $diasVermelho=0){
        date_default_timezone_set('America/Sao_Paulo'); //define o horario padrão

        $diff = diffDaysToday($validade);

        if($diff>$diasAmarelo){ 
            $value = 3;
        }elseif($diff<$diasAmarelo&&$diff>$diasVermelho){
            $value = 2;
        }else{
            $value = 1;
        }
        return $value;
    }

    function diffDaysToday($date) {
        $hoje=date_create(date('Y-m-d'));

        $dateCompare=date_create($date);  //cria o objeto data a partir da data do server
        $dateCompare = $dateCompare->diff($hoje);  //cria a diferença entre o objeto da validade e o objeto hoje 

        if($dateCompare->invert==0){ //verifica se a diferença é invertida ou não
           return $dateCompare->days*-1;  //se for transforma o número em negativo
        }
        return $dateCompare->days;  //se não, mantém o mesmo
    }

    function calcAge($diffDays) {
        return intval(($diffDays / 365) * -1);
    }
    
    function notificationDate($date,$info= "",$info2=""){
        date_default_timezone_set('America/Sao_Paulo');
        $count = "";
        $ano=$date->y;
        $mes=$date->m;
        $dia=$date->d;
        $hora=$date->h;
        $minuto=$date->i;

        if($ano == 1){
            $count = $ano." ano";
        }elseif($date->y > 1){
            $count = $ano." anos";
        }elseif($mes==1){
            $count = $mes." mês";
        }elseif($mes>1){
            $count = $mes." meses";
        }elseif($dia==1){
            $count = $dia." dia";
        }elseif($dia>1){
            $count = $dia." dias";
        }elseif($hora==1){
            $count = $hora." hora";
        }elseif($hora>1){
            $count = $hora." horas";
        }elseif($minuto==1){
            $count = $minuto." minuto";
        }elseif($minuto>1){
            $count = $minuto." minutos";
        }else{
            $count = "alguns segundos";
        }

        return $info." ".$count." ".$info2;
    }

    function notifyValidUser($conn, $notifyId, $userId) {
        date_default_timezone_set('America/Sao_Paulo');
        if (mysqli_query($conn, "select * from tbl_viewnotfyuser where notfyId = '$notifyId' and userId = '$userId'")->num_rows > 0) {
            return 1;
        }
        return 0;
    }

    function validaCPF($cpf) {
 
        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
         
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
    
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
    
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    
    }

    function montarValues($dados){
        for($i = 0;$i < count($dados);$i++){
            if(!is_numeric($dados[$i])){
                $dados[$i] = "'".$dados[$i]."'";
            }else{
                $dados[$i]=$dados[$i];
            }
        }
        
        $dados = implode(',',$dados);
        
        return $dados;
        }
    
?>
