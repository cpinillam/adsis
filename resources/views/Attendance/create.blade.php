@extends('layouts.app')
@section('content')

<h1 class="titulo">Hoja Asistencia</h1>
<div>
    <label>Nombre Tutor:{{$tutor}}</label>
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
                <th>Comentarios</th>
            </tr>
            @foreach ($user as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->group}}</td>
                <td> <input type="hidden" name="{{$user->id}}_user_id" value="{{$user->id}}"></td> 
                <td>
                <input type="radio" name="{{$user->id}}_attendance_type" value="A"> Asistencia 
                <input type="radio" name="{{$user->id}}_attendance_type" value="RNJ"> Retraso N.J. 
                <input type="radio" name="{{$user->id}}_attendance_type" value="RJ"> Retraso J. 
                <input type="radio" name="{{$user->id}}_attendance_type" value="FNJ"> Falta N.J 
                <input type="radio" name="{{$user->id}}_attendance_type" value="FJ"> Falta J. 
                </td>
                <td> <textarea rows="1" cols="70" name="{{$user->id}}_comment" value="{{$attendance->comment}}"></textarea></td>
                <td> <input type="hidden" name="{{$user->id}}_tutor_id" value="{{$attendance->tutor_id}}"></td>
                <td> <input type="hidden" name="{{$user->id}}_timestamps" value="{{$attendance->timestamps}}"></td>
            <tr>
            @endforeach
        </table>
        <input type="submit" class="boton" value="Enviar">
        <br>
    </form>
</div>
@endsection
