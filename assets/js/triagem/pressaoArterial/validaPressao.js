var pressaoPaciente = "";

var inputPresSis = document.querySelector('#idPas')
var inputPresDis = document.querySelector('#idPad')

const validAndCalc = () => {
    if (inputPresSis.value != "" && inputPresDis.value != "") {
        checagemPressao(parseFloat(inputPresSis.value), parseFloat(inputPresDis.value));
    }
}


const checagemPressao = (sistolicaPaciente, diastolicaPaciente) => {
    $.ajax({
        url: "../../js/triagem/pressaoArterial/pressao.json",
        data: "json",
        success: response => {
            var sistolica = validaPressoes(response.sistolica, sistolicaPaciente);
            var diastolica = validaPressoes(response.diastolica, diastolicaPaciente);

            if (sistolica.indice == 2 && diastolica.indice == 2) {
                pressaoPaciente = sistolica.descricao;
            } else {
                if (sistolica.indice > 2 && diastolica.indice > 2) {
                    if (sistolica.indice >= diastolica.indice) {
                        pressaoPaciente = sistolica.descricao;
                    } else {                        
                        pressaoPaciente = diastolica.descricao;
                    }
                } else if (sistolica.indice < 2 && diastolica.indice < 2) {
                    if (sistolica.indice <= diastolica.indice) {
                        pressaoPaciente = sistolica.descricao;
                    } else {                        
                        pressaoPaciente = diastolica.descricao;
                    }
                } else if (sistolica.indice >= diastolica.indice) {
                    pressaoPaciente = sistolica.descricao;
                } else {                        
                    pressaoPaciente = diastolica.descricao;
                }
            }
            document.querySelector('#idCalcHiper').value = pressaoPaciente;
        }
    })
}

const validaPressoes = (arrayPressoes, pressao) => {    
    for (let index = 0; index < arrayPressoes.length; index++) {
        const item = arrayPressoes[index];
        if (pressao >= item.min && pressao <= item.max) {
            return { 
                descricao: item.desc,
                indice: index
            };
        }
    }
}