@extends('layouts.app')
@section('content')
    <div id="content-list" style="margin-left: 50px">
        <h1>Lista de Evaluaciones</h1>
        <table> 
            <tr>
                <th>Alumno</th>
                <th>Idioma</th>
                <th>Actitud</th>
                <th>Aprendizajes</th>
                <th>Dinámica trabajo</th>
                <th>Meteo</th>
                <th>Id Curso</th>
                <th>Ámbito</th>
                <th>Estado</th>
                <th>Fecha actualización</th>
            </tr>
            @foreach ($evaluations as $evaluations)
                <tr>
                    {{ csrf_field() }}
                    <td>{{$evaluations->user_id}}</td>
                    <td>{{$evaluations->language}}</td>
                    <td>{{$evaluations->attitude}}</td>
                    <td>{{$evaluations->learning}}</td>
                    <td>{{$evaluations->workflow}}</td>
                    <td>{{$evaluations->meteo}}</td>
                    <td>{{$evaluations->course_catalog_id}}</td>
                    <td>{{$evaluations->scope}}</td>
                    <td>{{$evaluations->filled}}</td>
                    <td>{{$evaluations->updated_at}}</td>                   
                </tr>
            @endforeach
        </table>
        <div>
            <br>
            <a href="/home">Home</a>
        </div>
    </div>

@endsection