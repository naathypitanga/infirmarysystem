var paciente;

const buscaPaciente = (campo) => {
    $.ajax({
        url: '../../php/recepcao/buscaPaciente.php',
        method: 'POST',
        data: {
            camp: campo,
            valor: document.querySelector('#'+campo).value
        },
        success: data => {
            if (data != '') {
                paciente = new Paciente(JSON.parse(data));
    
                if (paciente.props != null) {
                    paciente.updateInformations(campo);
                }
            }
        }
    })
};

const cleanFormInformations = () => {
    paciente.cleanInformations();
}

document.querySelector('#inlineCheckbox3').addEventListener('change', () => {
    document.querySelector('#divResp').style = document.querySelector('#inlineCheckbox3').checked ? "display: block;" : "display: none;"
})

document.querySelector('#nascimento').addEventListener('blur', () => {
    calcCiclo(calcAge(document.querySelector('#nascimento').value));
})

function calcAge(nascDate) {
    let today = new Date();
    let nasc = new Date(nascDate)
    let diffYears = today.getFullYear() - nasc.getFullYear();

    if (
        new Date(today.getFullYear(), today.getMonth(), today.getDate()) <
        new Date(nasc.getFullYear(), nasc.getMonth(), nasc.getDate())
    )
        diffYears--;
    return diffYears;
}

function calcCiclo(idade) {
    $.ajax({
        url: '../../js/recepcao/cicloDeVida.json',
        data: 'json'
    }).done(response => {
        response.forEach(item => {
            if (idade >= item.min && idade <= item.max) {
                document.querySelector('#ciclo').value = item.desc
            }
            document.querySelector('#inlineCheckbox3').checked = idade < 18 ? true : false;
            document.querySelector('#divResp').style =  document.querySelector('#inlineCheckbox3').checked ? "display: block;" : "display: none;";
        })
    });
}

calcCiclo(calcAge(document.querySelector('#nascimento').value));

function validResps() {
    document.querySelector('#inlineCheckbox1').checked = document.querySelector('#nomeMae').value == "" ? true : false;
    document.querySelector('#inlineCheckbox2').checked = document.querySelector('#nomePai').value == "" ? true : false;
    document.querySelector('#inlineCheckbox4').checked = document.querySelector('#num').value == "" ? true : false;
    document.querySelector('#inlineCheckbox4Resp').checked = document.querySelector('#numResp').value == "" ? true : false;
}

validResps();
