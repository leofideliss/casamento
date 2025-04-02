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

<div class="row justify-content-between">
    <h2 class="col-3 mb-4 text-center">
        <a href="{{ route('lista') }}" class="nav-link {{ request()->routeIs('lista') ? 'active' : '' }}">Lista de Presença</a>
    </h2>
    <h2 class="col-3 mb-4 text-center">
        <a href="{{ route('presente') }}" class="nav-link {{ request()->routeIs('presente') ? 'active' : '' }}">Lista de Presentes</a>
    </h2>
    <h2 class="col-3 mb-4 text-center">
        <a href="{{ route('informacoes') }}" class="nav-link {{ request()->routeIs('informacoes') ? 'active' : '' }}">Informações</a>
    </h2>
</div>
     <div class="divisor">
    <span>L&L</span> <!-- Ícone ou caractere decorativo -->
</div>

     <h2>Informações</h2>

</body>

</html>
