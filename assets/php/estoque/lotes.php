<script>
  var lotes = [
    <?php require_once("constructLotes.php")?> //Arquivo que faz a construção do objeto dos lotes
  ];
  
  var selectPro = document.querySelector("#produto");
  var selectLote = document.querySelector("#loteSelect");
  var valid = document.querySelector("#valid");
  var qtde = document.querySelector("#quantidade");
  var qtdTot = document.querySelector("#quantidade-tot");

  selectPro.addEventListener("change", () => changeLoteSelect());
  selectLote.addEventListener("change", () => changeInformationsLote());

  const changeInformationsLote = () => { //Muda as informações do produto de acordo com o lote selecionado
    var qtdT = 0;
    lotes.forEach(produto => {
      if (produto.id_produto == selectPro.value) { 
        produto.lote.forEach(loteFinal => { 
          qtdT += loteFinal.qtd;
          if (loteFinal.id == selectLote.value.replace('"', '').replace('"', '')) {
            if (loteFinal.validade != "00/00/0000") {  //Faz a máscara de entrada da data
              valid.innerHTML = loteFinal.validade;
            } else {
              valid.innerHTML = "Indeterminado"
            }
            qtde.innerHTML = loteFinal.qtd;
          }
        })
      }
    });
    qtdTot.innerHTML= qtdT;
  };

  const changeLoteSelect = () => { //Muda os lotes de acordo com o produto selecionado
    selectLote.innerHTML = "";
    for (let index = 0; index < lotes.length; index++) {
      if (lotes[index].id_produto == selectPro.value) {
        lotes[index].lote.forEach(element => {
          selectLote.innerHTML += `<option value='"${element.id}"'>${element.desc}</option>`;
        });
      }        
    }
    changeInformationsLote();
  };

  changeLoteSelect();
  changeInformationsLote();
</script>