// enter passa para próxima caixinha
var elts = document.getElementsByClassName('chainMe')
Array.from(elts).forEach(function(elt){
  elt.addEventListener("keyup", function(event) {
    // Number 13 is the "Enter" key on the keyboard
    if (event.keyCode === 13) {
      // Focus on the next sibling
      elt.nextElementSibling.focus()
    }
  });
})
 
// permite que apenas números e , sejam digitados
function isNumber(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;            
  var keyCode = key;
  key = String.fromCharCode(key);          
  if (key.length == 0) return;
  var regex = /^[0-9,\b]+$/;            
  if(keyCode == 188 || keyCode == 190){
     return;
  }else{
     if (!regex.test(key)) {
        theEvent.returnValue = false;                
        if (theEvent.preventDefault) theEvent.preventDefault();
     }
   }
   

}

//Calculo hipertensão
function calcHipertensao() {
  var valuePas = document.getElementById("#idPas");
  var valuePad = document.getElementById("#idPad");
  var valueHiper = document.getElementById("#idCalcHiper");


  if (valuePas < 80 && valuePad < 120) {
     return valueHiper == "Inválido";
  } else {
    return false;
  }
} 

 
// Teste lynn imc

function imc() {
  var peso = document.querySelector('#idPeso').value;
  var altura = document.querySelector('#idAltura').value;
  if (peso == "" || altura == "") {
    return;
  }
  var result = parseFloat(peso) / parseFloat((altura/100)**2);

  document.querySelector('#superf').value = parseFloat(0.007184 * (parseFloat((altura)))**0.725 * (parseFloat(peso))**0.425).toFixed(3)

  calculaImc(result);
}

function calculaImc(resultadoImc) {
  $.ajax({
    url: "../../js/triagem/tabelaImc.json",
    data: "json",
    success: data => {
      data.forEach(item => {
        if (resultadoImc >= item.imc_minimo && resultadoImc <= item.imc_maximo) {
          document.querySelector('#resultImc').value = item.categoria + " - Valor Imc: " + parseFloat(resultadoImc).toFixed(2)
        }
      }) 
    }
  })
}
