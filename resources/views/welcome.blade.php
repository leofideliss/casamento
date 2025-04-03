<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Presença Leonardo e Luiza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <link href="{{asset("css/style.css")}}" rel="stylesheet">
    <link href="{{asset("css/datatable.css")}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{asset("js/datatable.js")}}"> </script>
    <script src="{{asset("js/default.js")}}"> </script>
    <link rel="icon" type="image/png" href="{{ asset('lel.png') }}">
    <meta property="og:title" content="Casamento Leonardo e Luiza">
    <meta property="og:description" content="Leonardo e Luiza vão se casar!">
    <meta property="og:image" content="{{ asset('lel.png') }}">
    <meta property="og:url" content="{{ route('lista') }}">
    <meta property="og:type" content="website">
</head>

<body class="container mt-5">
    <div class="d-flex justify-content-center">
        <img src="{{asset("lel.png")}}" class="logo">
    </div>

    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-3 col-12 mb-3">
                <h2>
                    <a href="{{ route('lista') }}" class="nav-link {{ request()->routeIs('lista') ? 'active' : '' }}">Lista de Presença</a>
                </h2>
            </div>
            <div class="col-md-3 col-12 mb-3">
                <h2>
                    <a href="{{ route('presente') }}" class="nav-link {{ request()->routeIs('presente') ? 'active' : '' }}">Lista de Presentes</a>
                </h2>
            </div>
            <div class="col-md-3 col-12 mb-3">
                <h2>
                    <a href="{{ route('informacoes') }}" class="nav-link {{ request()->routeIs('informacoes') ? 'active' : '' }}">Informações</a>
                </h2>
            </div>
        </div>
    </div>
    <div class="divisor">
        <span>L&L</span> <!-- Ícone ou caractere decorativo -->
    </div>

    <h2>Convidados</h2>
    <table class="table pb-5" id="lista">
        <thead>
            <tr>
                <th>Familia</th>
                <th>Nome</th>
                <th class="text-center">Confirmar</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <input type="hidden" name="app-url" value="{{ env('APP_URL') }}">

    <!-- Modal -->
    <div class="modal fade" id="confirmarModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titulo-nome">Confirmação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja confirmar?</p>
                    <small>Quantidade de pessoas:</small>
                    <input type="number" required name="qtd_convidados" placeholder="Quantidade de pessoas">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-confirmar" style="background-color: #dcdcdc !important;border:1px solid #dcdcdc;" data-bs-dismiss="modal" data-action="confirmarAcao" data-custom="cancelar">Não vou ao evento</button>
                    <button type="button" class="btn-confirmar" data-custom="confirmar" data-action="confirmarAcao">Sim, Irei ao evento</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
