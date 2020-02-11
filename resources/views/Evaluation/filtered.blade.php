@extends('layouts.app')
@section('content')
    <div id="content-list" style="margin-left: 50px">
        <h2>Evaluaciones por Alumn@</h2>
        <table> 
            <tr>
                <th>Nombre</th>
                <th>Evaluación_Id</th>
                <th>Curso</th>
                <th>Idioma</th>
                <th>Actitud</th>
                <th>Aprendizajes conseguidos</th>
                <th>Dinámica de trabajo</th>
                <th>Meteo</th>
                <th>Fecha</th>
            </tr>
            @foreach ($evaluations as $evaluation)
                <tr>
                    {{ csrf_field() }}
                    <td>{{$evaluation->name}}</td>
                    <td>{{$evaluation->id}}</td>
                    <td>{{$evaluation->course_catalog_id}}</td>
                    <td>{{$evaluation->scope}}</td>
                    <td>{{$evaluation->language}}</td>
                    <td>{{$evaluation->attitude}}</td>
                    <td>{{$evaluation->workflow}}</td>
                    <td>{{$evaluation->learning}}</td>
                    <td>{{$evaluation->meteo}}</td>
                    <td>{{$evaluation->updated_at}}</td>
                    <td>
                    </td>              
                </tr>
            @endforeach
        </table>
        <br>
        
    </div>
@endsection