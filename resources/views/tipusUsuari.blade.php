@extends('layouts.main')

@section('content')
   
    <h1>Visualitzar Tipus d'usuaris</h1>
    <div class="container">
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipus</th>
                    
                    <!-- Add more table headers for other attributes if needed -->
                </tr>
            </thead>
            <tbody>
                @foreach($tipusUsuari as $tipus)
                <tr>
                    <td>{{ $tipus->id }}</td>
                    <td>{{ $tipus->tipus }}</td>
                    
                    <!-- Add more table cells for other attributes if needed -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection 