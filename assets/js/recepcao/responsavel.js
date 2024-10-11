class Responsavel{
    constructor(id) {
        this.id = id;
    } 
    
    propsReponsavel() {
        $.ajax({
            url: '../../php/recepcao/buscaReponsavel.php',
            method: 'POST',
            data: {
                respId: this.id
            },
            success: data => {
                this.props = JSON.parse(data);
                this.endereco = new Endereco(this.props.idEnderc, true);
                this.updateInformations();
                this.endereco.propsEnder();
            }
        });
    }

    updateInformations() {
        document.querySelector('#idResp').value = this.props.id;
        document.querySelector('#nomeResp').value = this.props.nome;
        document.querySelector('#cnsResp').value = this.props.cns;
        document.querySelector('#cpfResp').value = this.props.cpf;
        document.querySelector('#rgResp').value = this.props.rg;
        document.querySelector('#nascimentoResp').value = this.props.nascimento;
        document.querySelector('#generoResp').value = this.props.genero;
        document.querySelector('#telefoneResp').value = this.props.telefone;
    }

    cleanInformations() {
        document.querySelector('#nomeResp').value = "";
        document.querySelector('#cnsResp').value = "";
        document.querySelector('#cpfResp').value = "";
        document.querySelector('#rgResp').value = "";
        document.querySelector('#nascimentoResp').value = "";
        document.querySelector('#generoResp').value = "";
        document.querySelector('#telefoneResp').value = "";
        this.endereco != undefined ? this.endereco.cleanInformations() : '';
    }
}