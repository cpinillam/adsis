@extends('layouts.app')
@section('content')
    <div id="content-list" style="margin-left: 50px">
        <h1>Lista de revisiones pendientes</h1>
        <table> 
            <tr>
                <th>Alumno</th>
                <th>Evaluacion_id</th>
                <th>Curso_id</th>
                <th>Ámbito</th>
                <th>Idioma</th>
                <th>Actitud</th>
                <th>Aprendizaje</th>
                <th>Dinámica trabajo</th>
                <th>Fecha actualización</th>
            </tr>
            @foreach ($reviews as $review)
                <tr>
                    {{ csrf_field() }}
                    <td>{{$review->evaluation->user->name}}</td>
                    <td>{{$review->evaluation_id}}</td>
                    <td>{{$review->evaluation->course_id}}</td> {{-- To Do CourseCatalog->name --}}
                    <td>{{$review->evaluation->scope}}</td>
                    <td>{{$review->language}}</td>
                    <td>{{$review->attitude}}</td>
                    <td>{{$review->learning}}</td>
                    <td>{{$review->workflow}}</td>
                    <td>{{$review->updated_at}}</td>                   
                    <td>
                        <form method="GET" action="/review/{{$review->id}}/edit">
                            <input class="botonLista" type="submit" value="Revisar">
                        </form> 
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection