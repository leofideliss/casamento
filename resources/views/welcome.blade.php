<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Presença Leonardo e Luiza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset("css/style.css")}}" rel="stylesheet">
    <link href="{{asset("css/datatable.css")}}" rel="stylesheet">
     <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{asset("js/datatable.js")}}"> </script>
    <script src="{{asset("js/default.js")}}"> </script>

</head>

<body class="container mt-5">
     <div class="d-flex justify-content-center">
     <img src="{{asset("lel.png")}}" class="logo">
     </div>
    <h2 class="mb-4">Lista de Presença</h2>
    <table class="table table-striped" id="lista">
        <thead>
            <tr>
                <th>Familia</th>
                <th>Nome</th>
                <th>Confirmar</th>
            </tr>
        </thead>
        <tbody >

        </tbody>
    </table>

</body>

</html>
