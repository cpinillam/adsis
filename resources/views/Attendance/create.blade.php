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
        <input class="campos" type="hidden" name="tutor_id" value="{{$attendance->tutor_id}}">
        <input class="campos" type="hidden" name="timestamps" value="{{$attendance->timestamps}}">
        <table>
            <tr>
                <th>Nombre Alumn@</th>
                <th>Grupo</th>
                <th>Tipo Asistencia</th>
                <th>Comentario</th>
            </tr>
            @foreach ($users as $users)
            <tr>
                <td>{{$users->name}}</td>
                <td>{{$users->group}}</td>
                <td> <input class="campos" type="value" name="attendance_type" value="{{$attendance->attendance_type}}"></td>
                <td> <input class="campos" type="text" name="comment" value="{{$attendance->comment}}"></td>
                <td> <input class="campos" type="hidden" name="user_id" value="{{$users->id}}"></td>
            <tr>
            @endforeach
        </table>
        <input type="submit" class="boton" value="Enviar">
        <br>
    </form>
</div>
@endsection



