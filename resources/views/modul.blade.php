@extends('layouts.main')

@section('content')
   
    <h1>Visualitzar Moduls</h1>


    
    <div class="container">
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Codi</th>
                    <th>Sigles</th>
                    <th>Nom</th>
                    <th>Cicle</th>
                    
                    <!-- Add more table headers for other attributes if needed -->
                </tr>
            </thead>
            <tbody>
                @foreach($moduls as $modul)
                <tr>
                    <td>{{ $modul->id }}</td>
                    <td>{{ $modul->codi }}</td>
                    <td>{{ $modul->sigles }}</td>
                    <td>{{ $modul->nom }}</td>
                    <td>{{ $modul->cicle->descripcio }}</td>
                    
                    <!-- Add more table cells for other attributes if needed -->
                </tr>
                @endforeach
            </tbody>
        </table>
       
    </div>
    {{ $moduls->links() }}
@endsection 