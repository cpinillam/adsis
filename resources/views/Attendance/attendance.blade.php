@extends('layouts.app')
@section('content')
    <div id="content-list" style="margin-left: 50px">
        <h1>Lista de Asistencias</h1>
        <table> 
            <tr>
                <th>Fecha</th>
                <th>Asist_Id</th>
                <th>Alumno_Id</th>
                <th>Nombre</th>
                <th>Tutor_id<th>
                <th>Tipo</th>
                <th>Comentario</th>
            </tr>
            @foreach ($attendance as $attendance)
                <tr>
                    {{ csrf_field() }}
                    <td>{{$attendance->created_at}}</td>
                    <td>{{$attendance->id}}</td>
                    <td>{{$attendance->user_id}}</td>
                    <td>{{$attendance->user->name}}</td>
                    <td>{{$attendance->tutor_id}}</td>
                    <td>{{$attendance->attendance_type}}    </td>
                    <td>{{$attendance->comment}}</td>              
                    <td>
                        <form method="GET" action="/attendance/{{$attendance->id}}/edit">
                            <input class="botonLista" type="submit" value="Editar">
                        </form> 
                    </td>
                </tr>
            @endforeach
        </table>
        
        <div class="botonCrear">
                <br>
                <form method="get" action="/attendance/create">
                            <input class="botonLista" type="submit" value="Crear Hoja Asistencia">
                    {{-- <a href="/home">Home</a> --}}
        </div>
    </div>

@endsection