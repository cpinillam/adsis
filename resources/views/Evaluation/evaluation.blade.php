@extends('layouts.app')
@section('content')
    <div id="content-list" style="margin-left: 50px">
        <h1>Lista de Evaluaciones</h1>
        <table> 
            <tr>
                <th>Alumno</th>
                <th>Idioma</th>
                <th>Actitud</th>
                <th>Aprendizajes conseguidos</th>
                <th>Dinámica de trabajo</th>
                <th>Ámbito</th>
                <th>Id Curso</th>
                <th>Meteo</th>
                <th>Estado</th>
                <th>Fecha actualización</th>
            </tr>
            @foreach ($evaluations as $evaluation)
                <tr>
                    {{ csrf_field() }}
                    <td>{{$evaluation->user_id}}</td>
                    <td>{{$evaluation->language}}</td>
                    <td>{{$evaluation->attitude}}</td>
                    <td>{{$evaluation->learning}}</td>
                    <td>{{$evaluation->workflow}}</td>
                    <td>{{$evaluation->scope}}</td>
                    <td>{{$evaluation->course_id}}</td>
                    <td>{{$evaluation->meteo}}</td>
                    <td>{{$evaluation->filled}}</td>
                    <td>{{$evaluation->updated_at}}</td>                   
                    {{-- <td>
                        <form method="GET" action="/evaluation/{{$evaluation->id}}/edit">
                            <input class="botonLista" type="submit" value="Editar">
                        </form> 
                    </td> --}}
                </tr>
            @endforeach
        </table>
        
      {{--   <div class="botonCrear">
                <br>
                <form method="get" action="/evaluation/create">
                            <input class="botonLista" type="submit" value="Crear Evaluacion">
                    <a href="/home">Home</a>
        </div> --}}
    </div>

@endsection