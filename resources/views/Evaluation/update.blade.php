@extends('layouts.app')
@section('content')
<div id="content-list" style="margin-left: 50px">
    <h1 class="titulo">Editar Autoevaluación</h1>
    <p class="titulo"> A valorar de 1 a 10 las siguientes competencias</p>
    @if ($errors->any())
    <p>Valorar todos los campos</p>
    @endif

    <div>
        <form id="update" class='formular' action='/evaluation/{{$evaluation->id}}' method='POST'>
            @csrf
            @method ('PATCH')
            {{ csrf_field() }}
            <label>Meteo personal:</label>
            <input class="campos" type="value" name="meteo" value="{{$evaluation->meteo}}">
            <br>
            <label>Idioma:</label>
            <input class="campos" type="number" name="language" value="{{$evaluation->language}}">
            <br>
            <label>Actitud:</label>
            <input class="campos" type="number" name="attitude" value="{{$evaluation->attitude}}">
            <br>
            <label>Dinámica de trabajo:</label>
            <input class="campos" type="number" name="workflow" value="{{$evaluation->workflow}}">
            <br>
            <label>Aprendizajes conseguidos:</label>
            <input class="campos" type="number" name="learning" value="{{$evaluation->learning}}">
            <br>
            <label>Ámbito:</label>
            <input class="campos" type="text" name="scope" value="{{$evaluation->scope}}">
            <br>
            <label>completado?:</label>
            <input class="campos" type="boolean" name="filled" value="{{$evaluation->filled}}">
            <br>
            <input class="campos" type="hidden" name="user_id" value="{{$evaluation->user_id}}">
            <input type="submit" class="boton" value="Enviar">
            <br>
        </form>
    </div>    
</div>
@endsection



