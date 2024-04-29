@extends('layouts.main')

@section('content')
   
    <h1>Visualitzar Usuaris</h1>


    
    <div class="container">
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom usuari</th>
                    <th>Nom</th>
                    <th>Cognom</th>
                    <th>Tipus d'usuari</th>
                    
                    <!-- Add more table headers for other attributes if needed -->
                </tr>
            </thead>
            <tbody>
                @foreach($usuaris as $usuari)
                <tr>
                    <td>{{ $usuari->id }}</td>
                    <td>{{ $usuari->nom_usuari }}</td>
                    <td>{{ $usuari->nom }}</td>
                    <td>{{ $usuari->cognom }}</td>
                    <td>{{ $usuari->tipus->tipus }}</td>
                    
                    <!-- Add more table cells for other attributes if needed -->
                </tr>
                @endforeach
            </tbody>
        </table>
       
    </div>
    {{ $usuaris->links() }}
@endsection 