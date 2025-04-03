<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Presentes Leonardo e Luiza</title>
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
    <div id="contador" class="mb-5 text-center" style="font-size: 1.5rem; font-weight: bold;"></div>
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

    <h2 class="mt-4 mb-4">Link para o site da lista de presentes:</h2>
    <span>Link para o site da lista de presentes (Magazine Luiza)</span><br>
    <span>CLique aqui -> </span><a href="https://www.finalfeliz.de/luiza-leonardofidelis">https://www.finalfeliz.de/luiza-leonardofidelis</a>
    </br>
    </br>

    <span class="pb-5">Para quem preferir PIX </br> -> Luiza: <strong>43608369880 (CPF)</strong> </br> -> Leonardo:<strong>47175598866 (CPF)</strong></span>
    </br>

</body>

</html>
