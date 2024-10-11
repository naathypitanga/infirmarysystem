class Endereco{
    constructor (idEnd, isResp = false) {
        this.id = idEnd;
        this.prefixResp = !isResp ? "" : "Resp";
    }

    propsEnder() {
        $.ajax({
            url: '../../php/recepcao/buscaEndereco.php',
            method: 'POST',
            data: {
                endId: this.id
            },
            success: data => {
                this.props = JSON.parse(data);
                this.updateInformations();
            }
        });
    }

    updateInformations() {
        document.querySelector('#idEnd'+this.prefixResp).value = this.props.id;
        document.querySelector('#cep'+this.prefixResp).value = this.props.cep;
        document.querySelector('#rua'+this.prefixResp).value = this.props.rua;
        document.querySelector('#num'+this.prefixResp).value = this.props.numero;
        document.querySelector('#inlineCheckbox4'+this.prefixResp).checked = this.props.numero == "" ? true : false;
        document.querySelector('#bair'+this.prefixResp).value = this.props.bairro;
        document.querySelector('#city'+this.prefixResp).value = this.props.cidade;
        document.querySelector('#esta'+this.prefixResp).value = this.props.estado;
    }
    
    cleanInformations() {
        document.querySelector('#cep'+this.prefixResp).value = "";
        document.querySelector('#rua'+this.prefixResp).value = "";
        document.querySelector('#num'+this.prefixResp).value = "";
        document.querySelector('#inlineCheckbox4'+this.prefixResp).checked = "";
        document.querySelector('#bair'+this.prefixResp).value = "";
        document.querySelector('#city'+this.prefixResp).value = "";
        document.querySelector('#esta'+this.prefixResp).value = "";
    }
}