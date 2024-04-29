<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="row">
        <div class="col-5">

        </div>
        <div class="col-2">
            
            <form class="mt-4" method="POST" action="{{ action([App\Http\Controllers\UsuariController::class, 'authenticate']) }}">
                @csrf

                <h3>{{ 'Iniciar Sesión' }}</h3>

                <div class="card">
                    <div class="card-body">
                        <div class="form-group row px-2">
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="username" name="user_name"
                                    value="{{ old('username') }}" placeholder="Nombre de Usuario">
                            </div>
                        </div>
                        <div class="form-group row mt-3 px-2">
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="pswd"
                                    value="{{ old('password') }}" placeholder="Contraseña">
                                <iconify-icon class="eye-active" icon="mdi:eye" height="24"></iconify-icon>
                                <iconify-icon class="eye-unactive" icon="ph:eye-closed" height="24"></iconify-icon>
                            </div>
                        </div>

                        <div class="button-container d-inline-block">
                            <button class="btn btn-primary" type="submit">Iniciar Sessió</button>

                        </div>
                    </div>
                </div>

            </form>
        </div>
        <div class="col-5">

        </div>
    </div>
</body>

</html>
