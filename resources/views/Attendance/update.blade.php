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
        <label>Tipo de asistencia:</label>
        <input class="campos" type="value" name="attendance_type" value="{{$attendance->attendance_type}}">
        <br>
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



