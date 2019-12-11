@extends('layouts.app')
@section('content')

<h1 class="titulo">Hoja Asistencia</h1>
<div>
    <label>Nombre Tutor: {{$tutor}}</label>
    <br>
    <label>Id Tutor: {{$attendance->tutor_id}}</label>
    <br>
    <label>Fecha: {{$attendance->timestamps}}</label>
    <br>
    <form id="create" class='formular' action='/attendance' method='POST'>
        @csrf
        <table>
            <tr>
                <th>Nombre Alumn@</th>
                <th>Grupo</th>
                <th>Tipo Asistencia</th>
                <th>Comentario</th>
            </tr>
            @foreach ($user as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->group}}</td>
                <td> 
                <input type="radio" name="attendance_type_{{$user->id}}" value="A"> Asistencia 
                <input type="radio" name="attendance_type_{{$user->id}}" value="RNJ"> Retraso N.J.
                <input type="radio" name="attendance_type_{{$user->id}}" value="RJ"> Retraso J. 
                <input type="radio" name="attendance_type_{{$user->id}}" value="FNJ"> Falta N.J
                <input type="radio" name="attendance_type_{{$user->id}}" value="FJ"> Falta J.
                </td>
                <td> <input type="text" name="comment_{{$user->id}}" value="{{$attendance->comment}}"></td>
                <td> <input type="hidden" name="user_id" value="{{$user->id}}"></td>
                <td> <input type="hidden" name="tutor_id_{{$user->id}}" value="{{$attendance->tutor_id}}"></td>
                <td> <input type="hidden" name="timestamps_{{$user->id}}" value="{{$attendance->timestamps}}"></td>
            <tr>
            @endforeach
        </table>
        <input type="submit" class="boton" value="Enviar">
        <br>
    </form>
</div>
@endsection



