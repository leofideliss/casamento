function loadTable(){
    $('#lista').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: $("input[name=app-url]").val() + "/api/getAllConvidados", // Substitua pela sua rota correta
            type: "GET"
        },
        columns: [
            { data: "familia"},
            { data: "nome" },
            { data: "id" },
            //{ data: "status"}
        ],
         columnDefs: [
            {
                targets: -1, // Última coluna
                orderable: false,
                searchable: false,
                class: "text-center",
                render: function(data, type, row) {
                    return `<button class="btn btn-sm btn-primary" data-id="${data}">Confirmar</button>`;
                }
            }
         ],
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        language: {
            lengthMenu: "Mostrar _MENU_ registros por página",
            zeroRecords: "Nenhum registro encontrado",
            info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
            infoEmpty: "Nenhum registro disponível",
            infoFiltered: "(filtrado de _MAX_ registros no total)",
            search: "Buscar:",
            paginate: {
                first: "Primeiro",
                last: "Último",
                next: "Próximo",
                previous: "Anterior"
            }
        }
    });
}

function enviarConvidado (){
  $("body").on("click","#adicionarConvidado",function(e){
        e.preventDefault(); 
      let nameElement = $("#convidadoNome");
        let nome = nameElement.val()
        let familia
        $("input[type='radio']:checked").each(function() {
            familia = $(this).val();
        });
        
        $.ajax({
            url: $("input[name=app-url]").val() + '/api/createConvidado',
            type: 'POST',
            data: {
                nome: nome,
                familia: familia
            },
            success: function(response) {
                console.log(response)
                nameElement.val("")
                $('#lista').DataTable().ajax.reload(null, false);
            },
            error: function(response) {
                console.log(response)
            }
        });
  });
}
$(document).ready(function () {
    loadTable()
    enviarConvidado()
});


