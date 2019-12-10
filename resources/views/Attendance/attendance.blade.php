
@extends('layouts.app')
@section('content')
    <div>
        <h1>Lista de Asistencias</h1>
        <table> 
            <tr>
                <th>Fecha</th>
                <th>Id</th>
                <th>Nombre alumno</th>
                <th>Alumno</th>
                <th>Grupo</th>
                <th>Tutor<th>
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
                    <td>{{$attendance->group_id}}</td>
                    <td>{{$attendance->tutor_id}}</td>
                    <td>{{$attendance->attendance_type}}    </td>
                    <td>{{$attendance->comment}}</td>              
                    <td>
                        <form method="GET" action="/attendance/{{$attendance->id}}/edit">
                            <input class="botonLista" type="submit" value="Editar">
                        </form> 
                    </td>
                    {{-- <td>
                        <form action="/attendance/{{$attendance->id}}" method="post">
                            @csrf
                            @method('DELETE')
                        <button class="botonLista" type="submit">Borrar</button>
                        </form>
                    </td> --}}
                </tr>
            @endforeach
        </table>
        
        <div class="botonCrear">
                <br>
                <form method="get" action="/attendance/create">
                            <input class="botonLista" type="submit" value="Crear Hoja Asistencia">
                    <a href="/home">Home</a>
        </div>
    </div>

@endsection