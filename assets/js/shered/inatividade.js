const MINUTOS_INATIVIDADE = 60;

const TEMPO_INATIVIDADE = MINUTOS_INATIVIDADE * 60000;   //##########  NÃO MUDAR, SUJEITO A PAULADA  ##########

const tempoInativo = function() {
    let time;

    window.onload = resetarTimer;
    document.onmousemove = resetarTimer;
    document.onkeydown = resetarTimer;

    function suspencao() {
        window.location.href = 'http://172.17.34.254:1200/projetos/202100002/projetointegrador/assets/pages/login/frmSuspens.php';
    }

    function resetarTimer() {
        clearTimeout(time);
        time = setTimeout(suspencao, TEMPO_INATIVIDADE);
    }
}

tempoInativo();