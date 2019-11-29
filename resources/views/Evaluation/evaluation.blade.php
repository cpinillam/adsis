@extends('layouts.app')
@section('content')
    <div>
        <h1>Lista de Evaluaciones</h1>
        <table> 
            <tr>
                <th>Alumno</th>
                <th>Meteo</th>
                <th>Idioma</th>
                <th>Actitud</th>
                <th>Participación</th>
                <th>Aprendizaje</th>
                <th>Colaboración</th>
                <th>Estado</th>
                <th>Fecha</th>
            </tr>
            @foreach ($evaluations as $evaluation)
                <tr>
                    {{ csrf_field() }}
                    <td>{{$evaluation->user_id}}</td>
                    <td>{{$evaluation->meteo}}</td>
                    <td>{{$evaluation->language}}</td>
                    <td>{{$evaluation->attitude}}</td>
                    <td>{{$evaluation->participation}}</td>
                    <td>{{$evaluation->learning}}</td>
                    <td>{{$evaluation->collaboration}}</td>
                    <td>{{$evaluation->review_status}}</td>
                    <td>{{$evaluation->created_at}}</td>                   
                    <td>
                        <form method="get" action="/evaluation/{{$evaluation->id}}/edit">
                            <input class="botonLista" type="submit" value="Editar">
                        </form> 
                    </td>
                    {{-- <td>
                        <form action="/kata/{{$kata->id}}" method="post">
                            @csrf
                            @method('DELETE')
                        <button class="botonLista" type="submit">Delete</button>
                        </form>
                    </td> --}}
                </tr>
            @endforeach
        </table>
        
        <div class="botonCrear">
                <br>
                <form method="get" action="/evaluation/create">
                            <input class="botonLista" type="submit" value="Crear Evaluacion">
                </form> 
        </div>
    </div>

@endsection