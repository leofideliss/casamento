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

     <h2 class="mb-4 mt-4">Informações</h2>
<ul class="pb-5 mb-5">
    <li><strong>Local:</strong>
        <p>Endereço: Rodovia Julio Budiski - Residencial Campos Verdes, Álvares Machado - SP, 19160-000</p>
        <p><a href="https://g.co/kgs/LRQAaaW" target="_blank">Ver no Google Maps</a></p>
        <p><strong>Data:</strong> 17/05/2025 às 11:30</p>
    </li>
    <li><strong>Siga o código de vestimenta:</strong>
        <p>Sugerimos trajes adequados para a ocasião, como o estilo esporte fino, que é ideal para este dia especial. Assim, todos poderão se sentir confortáveis e em sintonia com o evento.</p>
    </li>
    <li><strong>Não use branco:</strong>
        <p>Essa é a cor reservada para a noiva. Evite também tons muito próximos, como off-white ou bege claro.</p>
    </li>
    <li><strong>Deixe a decoração no local:</strong>
        <p>A decoração foi pensada para criar um ambiente mágico. Pedimos que evitem levar qualquer parte dela como lembrança, a menos que seja oferecido algo pelos noivos.</p>
    </li>
    <li><strong>Aguarde o momento certo para os doces:</strong>
        <p>A mesa de doces será liberada no momento oportuno, e queremos que todos possam aproveitar ao máximo!</p>
    </li>
    <li><strong>Confirme sua presença com antecedência:</strong>
        <p>Sua presença é muito importante para nós! Por isso, pedimos que nos avise com antecedência se poderá comparecer. Isso nos ajudará a organizar tudo da melhor forma possível.</p>
    </li>
</ul>

</body>

</html>
