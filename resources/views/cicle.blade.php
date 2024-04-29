@extends('layouts.main')

@section('content')
   
    <h1>Visualitzar cicles</h1>
    <div class="container">
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Sigles</th>
                    <th>Descripció</th>
                    <!-- Add more table headers for other attributes if needed -->
                </tr>
            </thead>
            <tbody>
                @foreach($cicles as $cicle)
                <tr>
                    <td>{{ $cicle->id }}</td>
                    <td>{{ $cicle->sigles }}</td>
                    <td>{{ $cicle->descripcio }}</td>
                    
                    <!-- Add more table cells for other attributes if needed -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection 