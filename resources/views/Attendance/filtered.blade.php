@extends('layouts.app')
@section('content')
    <div>
        <h1>Asistencias filtradas por usuario</h1>

        <h3>Indicadores Asistencia (%)</h3>
         <table> 
            <tr>
                <th>A</th>
                <th>RJ</th>
                <th>RNJ</th>
                <th>FJ</th>
                <th>FNJ</th>
            </tr>
            @foreach ($indicators as $value)
                <td>{{$value}}</td>
            @endforeach
        </table>
        <table> 
            <tr>
                <th>Grupo</th>
                <th>Nombre</th>
                <th>Asist_Id</th>
                <th>Fecha</th>
                <th>Tipo</th>
                <th>Comentario</th>
            </tr>
            @foreach ($attendance as $attendance)
                <tr>
                    {{ csrf_field() }}
                    <td>{{$attendance->group}}</td>
                    <td>{{$attendance->name}}</td>
                    <td>{{$attendance->id}}</td>
                    <td>{{$attendance->created_at}}</td>
                    <td>{{$attendance->attendance_type}}</td>
                    <td>{{$attendance->comment}}</td>
                    <td>
                        <form method="GET" action="/attendance/{{$attendance->id}}/edit">
                            <input class="botonLista" type="submit" value="Editar">
                        </form> 
                    </td>              
                </tr>
            @endforeach
        </table>
        <br>
        <a href="/home">Home</a>
    </div>
@endsection