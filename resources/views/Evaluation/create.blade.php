@extends('layouts.app')
@section('content')

<h1 class="titulo">Autoevaluación</h1>
<p class="titulo"> A valorar de 1 a 5 las siguientes competencias</p>
@if ($errors->any())
<p>Valorar todos los campos</p>
@endif

<div>
    <form id="create" class='formular' action='/evaluation' method='POST'>
        @csrf
        <label>Meteo personal:</label>
        <input class="campos" type="value" name="meteo" value="{{$evaluation->meteo}}">
        <br>
        <label>Idioma:</label>
        <input class="campos" type="value" name="language" value="{{$evaluation->language}}">
        <br>
        <label>Actitud:</label>
        <input class="campos" type="value" name="attitude" value="{{$evaluation->attitude}}">
        <br>
        <label>Participación:</label>
        <input class="campos" type="value" name="participation" value="{{$evaluation->participation}}">
        <br>
        <label>Aprendizaje:</label>
        <input class="campos" type="value" name="learning" value="{{$evaluation->learning}}">
        <br>
        <label>Colaboración:</label>
        <input class="campos" type="value" name="collaboration" value="{{$evaluation->collaboration}}">
        <br>
        {{-- <span>{{$evaluation->user_id}}={{$userid}}</span> --}}
        <input type="submit" class="boton" value="Enviar">
        <br>
    </form>
</div>
@endsection



