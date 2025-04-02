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

        ],
        columnDefs: [
            {
                targets: -1, // Última coluna
                orderable: false,
                searchable: false,
                class: "text-center",
                render: function(data, type, row) {
                    if(row.status == 1)
                        return `<span class="text-success"> Confirmado </span>`
                    if(row.status == 2)
                        return `<span class="text-danger"> Não irei </span>`
                    
                    return `<button class="btn-confirmar" data-id="${data}" data-nome="${row.nome}">Confirmar</button>`;
                }
            }
        ],
        searching: true,
        ordering: true,
        "paging": false,          // Remove paginação
        "lengthChange": false,    // Remove seleção de quantidade de registros
        "info": false,            // Remove informação de "Mostrando X de Y registros"
        "scrollY": "500px",       // Adiciona rolagem vertical (opcional)
        "scrollCollapse": true  ,
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

    // Evento de clique no botão "Confirmar"
    $('#lista tbody').on('click', '.btn-confirmar', function () {
        let id = $(this).data('id');
        let nome = $(this).data('nome');
        $("#titulo-nome").text(`Confirmação de (${nome})`)
        $('[data-action="confirmarAcao"]').data('id', id); // Passa o ID para o botão de confirmação do modal
        $('#confirmarModal').modal('show'); // Abre o modal
    });

    // Evento de clique no botão "Confirmar" dentro do modal
    $('[data-action="confirmarAcao"]').on('click', function () {
        let id = $(this).data('id');
        let action = $(this).data('custom');
        let qtd = $('input[name="qtd_convidados"]').val().trim(); // Removendo espaços extras

        if (!qtd && action=="confirmar") {
            alert('Por favor, informe a quantidade de convidados.'); // Exibe um alerta
            $('input[name="qtd_convidados"]').focus(); // Foca no campo
            return; // Impede que o código continue
        }

          $.ajax({
            url: $("input[name=app-url]").val() + '/api/updateStatus',
            type: 'PUT',
            data: {
                id: id,
                action: action,
                qtd: qtd
            },
            success: function(response) {
                console.log(response)
                $('input[name="qtd_convidados"]').val("");
                $('#confirmarModal').modal('hide'); // Fecha o modal
            },
            error: function(response) {
                console.log(response)
            },
              complete:function(response){
  $('#lista').DataTable().ajax.reload(null, false);
              }
        });


    });

});


