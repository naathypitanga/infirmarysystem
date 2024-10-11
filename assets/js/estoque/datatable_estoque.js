// configurações da tabela para deixa-lá responsiva, assim como ocultar algumas informações e definir limites de paginação.
    $(document).ready(function() {
        $('#tableEstoque').DataTable({
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