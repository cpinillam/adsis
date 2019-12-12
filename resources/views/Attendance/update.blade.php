@extends('layouts.app')
@section('content')

<h1 class="titulo">Editar Asistencia</h1>
@if ($errors->any())
@endif

<div>
    <label>Nombre Alumn@: {{$attendance->user->name}}</label>
    <br>
    <label>Id Alumn@: {{$attendance->user_id}}</label>
    <br>
    <label>Grupo: {{$attendance->user->group}}</label>
    <br>
    <label>Id Asistencia: {{$attendance->id}}</label>
    <br>
    <form id="update" class='formular' action='/attendance/{{$attendance->id}}' method='POST'>
        @csrf
        @method ('PATCH')
        {{ csrf_field() }}
        <label>Tipo de asistencia:</label><br>
        <input type="radio" name="attendance_type" value="A"  
                {{ $attendance->attendance_type == 'A' ? 'checked' : '' }} > Asistencia
        <input type="radio" name="attendance_type" value="RNJ"
                {{ $attendance->attendance_type == 'RNJ' ? 'checked' : '' }}> Retraso N.J.
        <input type="radio" name="attendance_type" value="RJ"
                {{ $attendance->attendance_type == 'RJ' ? 'checked' : '' }}> Retraso J.
        <input type="radio" name="attendance_type" value="FNJ"
                {{ $attendance->attendance_type == 'FNJ' ? 'checked' : '' }}> Falta N.J.
        <input type="radio" name="attendance_type" value="FJ"
                {{ $attendance->attendance_type == 'FJ' ? 'checked' : '' }}> Falta J. <br>
        <label>Comentario:</label>
        <input class="campos" type="text" name="comment" value="{{$attendance->comment}}">
        <br>
        <label>Id Tutpr:</label>
        <input class="campos" type="value" name="tutor_id" value="{{$attendance->tutor_id}}">
        <br>
        <input type="submit" class="boton" value="Actualizar">
        <br>
    </form>
</div>
@endsection



