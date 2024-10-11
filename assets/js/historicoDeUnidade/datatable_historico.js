var input = document.querySelectorAll('.js-date')[0];
var inputTime = document.querySelectorAll('.js-time')[0];
var inputTime2 = document.querySelectorAll('.js-time2')[0];

  
var dateInputMask = function dateInputMask(elm) {
  elm.addEventListener('keypress', function(e) {
    if(e.keyCode < 47 || e.keyCode > 57) {
      e.preventDefault();
    }
    
    var len = elm.value.length;
    
    // If we're at a particular place, let the user type the slash
    // i.e., 12/12/1212
    if(len !== 1 || len !== 3) {
      if(e.keyCode == 47) {
        e.preventDefault();
      }
    }
    
    // If they don't add the slash, do it for them...
    if(len === 2) {
      elm.value += '/';
    }

    // If they don't add the slash, do it for them...
    if(len === 5) {
      elm.value += '/';
    }
  });
};
  
dateInputMask(input);

var timeInputMask = function timeInputMask(elm) {
  elm.addEventListener('keypress', function(e) {
    if(e.keyCode < 47 || e.keyCode > 57) {
      e.preventDefault();
    }
    
    var len = elm.value.length;
    
    // If we're at a particular place, let the user type the slash
    // i.e., 12:12:12
    if(len !== 1 || len !== 3) {
      if(e.keyCode == 47) {
        e.preventDefault();
      }
    }
    
    // If they don't add the slash, do it for them...
    if(len === 2) {
      elm.value += ':';
    }

    // If they don't add the slash, do it for them...
    if(len === 5) {
      elm.value += ':';
    }
  });
};
  
timeInputMask(inputTime);

var timeInputMask2 = function timeInputMask2(elm) {
  elm.addEventListener('keypress', function(e) {
    if(e.keyCode < 47 || e.keyCode > 57) {
      e.preventDefault();
    }
    
    var len = elm.value.length;
    
    // If we're at a particular place, let the user type the slash
    // i.e., 12:12:12
    if(len !== 1 || len !== 3) {
      if(e.keyCode == 47) {
        e.preventDefault();
      }
    }
    
    // If they don't add the slash, do it for them...
    if(len === 2) {
      elm.value += ':';
    }

    // If they don't add the slash, do it for them...
    if(len === 5) {
      elm.value += ':';
    }
  });
};
  
timeInputMask2(inputTime2);

function clearFilter (){
  window.location.reload(true)
  
}
 
 function filterGlobal () {
    $('#table_historico').DataTable().search(
        $('#global_filter').val(),
    
    );
    }
    
    function filterColumn ( i ) {
        $('#table_historico').DataTable().column( i ).search(
            $('#col'+i+'_filter').val()
        );
    }      


    
    $(document).ready(function() {
        $('#table_historico').DataTable({
            responsive: true,
            dom: 'lrtip',
            bInfo: false,
            bPaginate: true,
            lengthChange: false,
            select: true,
            pageLength: 10,
            autoWidth: false,

            "columnDefs": [ {
              "targets": [1, 4],
              "createdCell": function (td, cellData, rowData, row, col) {
              if ( cellData == "CR1") {
                $(td).addClass('cr_imediato')
              } else if (cellData == "CR2"){
                $(td).addClass('cr_10')
              } else if (cellData == "CR3"){
                $(td).addClass('cr_60')
              } else if (cellData == "CR4"){
                $(td).addClass('cr_120')
              } else if (cellData == "CR5"){
                $(td).addClass('cr_240')
              } else if (cellData == "SIT1"){
                  $(td).addClass('natendido')
              } else if (cellData == "SIT2"){
                $(td).addClass('atriagem')
                } else if (cellData == "SIT3"){
                  $(td).addClass('atconsulta')
                  }
              }
            }],

          })
   
        $('input.global_filter').on( 'keyup click', function () {
            filterGlobal();
        } );
    
        $('input.column_filter').on( 'keyup click', function () {
            filterColumn( $(this).parents('div').attr('data-column') );
        } );
    } );

        $('select.column_filter').on('change', function () {
            filterColumn( $(this).parents('div').attr('data-column') );
        } );

        $(document).ready(function() {
            var oTable = $('#table_historico').dataTable();
            
           $("div.dataTables_filter input").unbind();0
           /* CHECKPOINT */
            $('#searchButton').click(function(e){
                oTable.fnFilter($("div.dataTables_filter input").val());

                $('input.filter').on('change', function() {
                  table.fnDraw();
                });
                $.fn.dataTable.ext.search.push(
                  function(settings, searchData, index, rowData, counter) {
                    // No filtered checked - show all rows
                    if ($('.filter:checked').length === 0) {
                      return true;
                    }
              
                    // Filter(s) checked, apply logic
                    var found = false;
                    $('.filter').each(function(index, elem) {
                      if (elem.checked && rowData[4] === elem.value) {
                        found = true;
                      }
                    });
              
                    return found;
                  }
                );


            });

            $('#searchButton').on('click', function () {
                dataTables.columns(12).search("").draw();
            
            });
                  
        });



        /*

      --- CÓDIGO PARA ADCIONAR CLASSE A UMA LINHA INTEIRA DO DATATABLES ---

        createdColumn: function( column, data, dataIndex ) {
          if ( data[0] == "2" ) {        
      $(column).addClass('recepcionado');

      --- CÓDIGO PARA FILTRAR DADOS UTILIZANDO CHECKBOX DE FORMA INSTANTÂNEA MANUAL ---

          function filterme() {
      otable = $('#table_historico').dataTable();
      //build a regex filter string with an or(|) condition
      var types = $('input:checkbox[name="type"]:checked').map(function() {
        return this.value;
      }).get().join('|');
      //filter in column 0, with an regex, no smart filtering, no inputbox,not case sensitive
      otable.fnFilter(types, 0, false, false, false, false)
     };

      --- CÓDIGO ALTERNATIVO PARA A MESMA FUNÇÃO DE FORMA AUTOMATIZADA ---

     $('.filter').on('change', function() {
                  $.fn.dataTable.ext.search.push(
                    function( settings, searchData, index, rowData, counter ) {
                      
                        if (filtered.includes(searchData[0])) {
                             return true;
                        }
                        return false;
               
                    }
                    
                );

                  var val = $(this).val();
                  var checked = $(this).prop('checked');
                  var index = filtered.indexOf( val );
                  
                  if (checked && index === -1) {
                    filtered.push(val);
                  } else if (!checked && index > -1) {
                    filtered.splice(index, 1);
                  }
                });
     
     */



        
        
        
        

