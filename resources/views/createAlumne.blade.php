@extends('layouts.main')

@section('content')

<form method="POST" action="{{ action([App\Http\Controllers\UsuariController::class, 'store']) }}">
    @csrf
    <div class="form-group">
        <label for="nom_usuari">Nom Usuari:</label>
        <input type="text" class="form-control" id="nom_usuari" name="nom_usuari">
    </div>
    <div class="form-group">
        <label for="contrasenya">Contrasenya:</label>
        <input type="password" class="form-control" id="contrasenya" name="contrasenya">
    </div>
    <div class="form-group">
        <label for="correu">Correu:</label>
        <input type="email" class="form-control" id="correu" name="correu">
    </div>
    <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" class="form-control" id="nom" name="nom">
    </div>
    <div class="form-group">
        <label for="cognom">Cognom:</label>
        <input type="text" class="form-control" id="cognom" name="cognom">
    </div>
    <div class="form-group">
        
        <input style="display:none" type="text" id='actiu' value="1">
    </div>
    <div class="form-group">
        
        <input style="display:none" type="text" class="form-control" id="tipus_usuaris_id" name="tipus_usuaris_id" value="3">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection