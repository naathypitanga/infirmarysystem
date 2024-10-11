function calcularIcq (gen) {
    if (document.querySelector('#cint').value != "" && document.querySelector('#quad').value != "") {
        validarIcq(parseFloat(document.querySelector('#cint').value) / parseFloat(document.querySelector('#quad').value), gen)
    }
}

function validarIcq (valorIcq, genero) {
    $.ajax({
        url: '../../js/triagem/icq/icq.json',
        data: 'json',
        success: data => {
            if (genero == 'masculino') {
                var gen = 0;
            } else {
                var gen = 1;
            }

            data[gen].forEach(item => {
                if (valorIcq >= item.min && valorIcq <= item.max) {
                    document.querySelector('#calcIcq').value = item.desc;
                }
            });
        }
    })
}