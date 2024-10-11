// configurações da tabela para deixa-lá responsiva, assim como ocultar algumas informações e definir limites de paginação.
$(document).ready(function() {
  $('#table_cadastro').DataTable({
      responsive: true,
      bInfo: false,
      bPaginate: true,
      lengthChange: false,
      select: true,
      pageLength: 10,
      autoWidth: false,
      language: {
          search: "<label class='dataTables_busca'>Busca:</label>"
      }
    })

  })

  var coll = document.getElementsByClassName("botao_collapse--collapsible");
  var i;
  
  for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
      this.classList.toggle("botao_collapse--active");
      var content = this.nextElementSibling;
      if (content.style.maxHeight){
        content.style.maxHeight = null;
      } else {
        content.style.maxHeight = content.scrollHeight + "px";
      } 
    });
  }