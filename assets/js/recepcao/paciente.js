class Paciente{
    constructor(props) {
        this.props = props;
        this.endereco = new Endereco(this.props.idEnder);
    }

    get idade() {
        return this.calcAge(new Date(this.props.nascimento));
    }

    get responsavel() {
        if (this.idade < 18) {
            return new Responsavel(this.props.idRespons);
        }
    }

    calcAge(nascDate) {
        let today = new Date();
        let diffYears = today.getFullYear() - nascDate.getFullYear();

        if (
            new Date(today.getFullYear(), today.getMonth(), today.getDate()) <
            new Date(nascDate.getFullYear(), nascDate.getMonth(), nascDate.getDate())
        )
            diffYears--;
        return diffYears;
    }

    calcCiclo(idade) {
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

    updateInformations(notUpdate) {
        this.calcCiclo(this.idade);
        document.querySelector('#id').value = this.props.id;
        document.querySelector('#nome').value = this.props.nome;
        document.querySelector('#nomeS').value = this.props.nomeSocial;
        if (notUpdate != 'cns') {
            document.querySelector('#cns').value = this.props.cns;
        } 
        if (notUpdate != 'cpf') {
            document.querySelector('#cpf').value = this.props.cpf;
        }
        document.querySelector('#rg').value = this.props.rg;
        document.querySelector('#nascimento').value = this.props.nascimento;
        document.querySelector('#genero').value = this.props.genero;
        document.querySelector('#telefone').value = this.props.telefone;
        document.querySelector('#nomeMae').value = this.props.nomeMae;
        document.querySelector('#inlineCheckbox1').checked = this.props.nomeMae == "" ? true : false;
        document.querySelector('#nomePai').value = this.props.nomePai;
        document.querySelector('#inlineCheckbox2').checked = this.props.nomePai == "" ? true : false;
        this.endereco.propsEnder();
        if (this.idade < 18) {
            this.responsavel.propsReponsavel();
        }
    }
    
    cleanInformations() {
        document.querySelector('#nome').value = "";
        document.querySelector('#nomeS').value = "";
        document.querySelector('#cns').value = "";
        document.querySelector('#cpf').value = "";
        document.querySelector('#rg').value = "";
        document.querySelector('#nascimento').value = "";
        document.querySelector('#genero').value = "";
        document.querySelector('#localAtend').value = "01 - UPA REGIONAL MATINHOS";
        document.querySelector('#municipio').value = "MATINHOS - PR";
        document.querySelector('#unOrig').value = "01 - UPA PRAIA GRANDE";
        document.querySelector('#telefone').value = "";
        document.querySelector('#nomeMae').value = "";
        document.querySelector('#nomePai').value = "";
        document.querySelector('#ciclo').value = "";
        document.querySelector('#inlineCheckbox1').checked = false;
        document.querySelector('#inlineCheckbox2').checked = false;
        document.querySelector('#divResp').style = "display: none;";
        document.querySelector('#inlineCheckbox3').checked = false;
        this.endereco.cleanInformations();
        if (this.idade < 18) {
            this.responsavel.cleanInformations();
        }
    }
}
