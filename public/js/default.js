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

function qtdConfirmados(){
    console.log($("input[name=app-url]").val() + "/api/getAllConvidadosNoTable")
    $.ajax({
        url: $("input[name=app-url]").val() + "/api/getAllConvidadosNoTable",
        type: 'GET',
        success: function(response) {
            let total = 0;
            let convidados = response.data
            for(i in convidados)
            {
                total += convidados[i].qtd_convidados;
            }

            $("#qtd_confirmados").text(`Quantidade de confirmados: ${total}`)
        },
        error: function(response) {
            console.log(response)
        }
    });
}

function iniciarContagemRegressiva() {
    let dataEvento = new Date("2025-05-17T11:30:00").getTime();

    let contador = setInterval(function() {
        let agora = new Date().getTime();
        let diferenca = dataEvento - agora;

        if (diferenca <= 0) {
            clearInterval(contador);
            document.getElementById("contador").innerHTML = "O grande dia chegou! 🎉";
            return;
        }

        let dias = Math.floor(diferenca / (1000 * 60 * 60 * 24));
        let horas = Math.floor((diferenca % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutos = Math.floor((diferenca % (1000 * 60 * 60)) / (1000 * 60));
        let segundos = Math.floor((diferenca % (1000 * 60)) / 1000);

        document.getElementById("contador").innerHTML = `
            <div class="tempo">
                <span>${dias}</span> <small>Dias</small>
            </div>
            <div class="tempo">
                <span>${horas}</span> <small>Horas</small>
            </div>
            <div class="tempo">
                <span>${minutos}</span> <small>Min</small>
            </div>
            <div class="tempo">
                <span>${segundos}</span> <small>Seg</small>
            </div>
        `;
    }, 1000);
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
    qtdConfirmados();
    loadTable();
    enviarConvidado();
    iniciarContagemRegressiva()
    // Evento de clique no botão "Confirmar"
    $('#lista tbody').on('click', '.btn-confirmar', function () {
        let id = $(this).data('id');
        let nome = $(this).data('nome').trim(); // Remove espaços extras no início e no fim
        // Divide apenas quando "e" estiver isolado com espaços ou quando houver vírgula
        let nomesArray = nome.split(/\s+e\s+|\s*,\s*/i).map(n => n.trim()); 
        let quantidadePessoas = nomesArray.length; // Conta os nomes corretamente
        $('input[name="qtd_convidados"]').val(quantidadePessoas).attr('max', quantidadePessoas);

        $("#titulo-nome").text(`Confirmação de (${nome})`)
        $('[data-action="confirmarAcao"]').data('id', id); // Passa o ID para o botão de confirmação do modal
        $('#confirmarModal').modal('show'); // Abre o modal
    });

    $('body').on('input', 'input[name="qtd_convidados"]', function() {
        let valorDigitado = parseInt($(this).val(), 10);
        let max = parseInt($(this).attr('max'), 10);
        
        if (valorDigitado > max) {
            $(this).val(max); // Define o valor máximo caso ultrapasse
        }
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
                location.href = $("input[name=app-url]").val() + "/listapresente"
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


