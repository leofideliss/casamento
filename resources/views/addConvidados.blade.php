<!DOCTYPE html>
<html lang="pt-br">


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

<body>
    <div class="container mt-5">
        <form>
            <div class="mb-3 d-flex">
                <input type="text" class="form-control me-2" id="convidadoNome" placeholder="Nome do convidado">
                <button type="button" class="btn btn-primary" id="adicionarConvidado">Adicionar</button>

            </div>
            <div class="mb-3">
                <label class="form-label">Escolha um nome:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="familia" id="luiza" value="Luiza" checked>
                    <label class="form-check-label" for="luiza">Luiza</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="familia" id="leonardo" value="Leonardo">
                    <label class="form-check-label" for="leonardo">Leonardo</label>
                </div>
            </div>

     <input type="hidden" name="app-url" value="{{ env('APP_URL') }}">

        </form>


        <h2 class="mb-4">Lista de Presença</h2>
        <table class="table table-striped" id="lista">
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


    </div>

</body>

</html>
