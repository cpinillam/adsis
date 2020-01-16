@extends('layouts.app')
@section('content')
<div id="content-list" style="margin-left: 50px">
    <h1 class="titulo">Autoevaluación</h1>
    <p class="titulo"> A valorar de 1 a 5 las siguientes competencias</p>
    @if ($errors->any())
    <p>Valorar todos los campos</p>
    @endif
    <div>
        <form id="create" class='formular' action='/evaluation' method='POST'>
            @csrf
            <div class="value">0</div>
            <input type="range" min="1" max="5" step="1" value="{{$evaluation->meteo}}">

            <label>Meteo personal:</label>
            <input class="campos" type="value" name="meteo" value="{{$evaluation->meteo}}">
            <br>
            <label>Idioma:</label>
            <input class="campos" type="number" name="language" value="{{$evaluation->language}}">
            <br>
            <label>Actitud:</label>
            <input class="campos" type="number" name="attitude" value="{{$evaluation->attitude}}">
            <br>
            <label>Participación:</label>
            <input class="campos" type="number" name="participation" value="{{$evaluation->participation}}">
            <br>
            <label>Aprendizaje:</label>
            <input class="campos" type="number" name="learning" value="{{$evaluation->learning}}">
            <br>
            <label>Colaboración:</label>
            <input class="campos" type="number" name="collaboration" value="{{$evaluation->collaboration}}">
            <br>
            <input class="campos" type="hidden" name="user_id" value="{{$evaluation->user_id}}">
            <input type="submit" class="boton" value="Enviar">
            <br>
        </form>
    </div>
</div>
@endsection



