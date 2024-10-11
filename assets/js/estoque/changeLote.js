const change = () => {
    $.ajax({
        url: '../../php/estoque/getLote.php',
        method: 'POST',
        data: {
            nomeProduto: document.querySelector('#prod').value
        }
    }).done(response => {
        document.querySelector('#uniMed').value = response
    })
}