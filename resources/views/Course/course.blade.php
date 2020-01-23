@extends('layouts.app')
@section('content')
    <div id="content-list" style="margin-left: 50px">
        <h1>Relación de Alumn@s y Cursos </h1>
        <table> 
            <tr>
                <th>Identificador</th>
                <th>Curso del catálogo</th>
                <th>Alumno</th>
            </tr>
            @foreach ($course as $course)
                <tr>
                    {{ csrf_field() }}
                    <td>{{$course->id_course}}</td>
                    <td>{{$course->course_id_catalog}}</td>
                    <td>{{$course->user_id}}</td>       
                    <td>
                        <form method="GET" action="/course/{{$course->id}}/edit">
                            <input class="botonLista" type="submit" value="Editar">
                        </form> 
                    </td>
                </tr>
            @endforeach
        </table>
    <div>
    </div style="margin-left: 50px">
       
    </div>

@endsection