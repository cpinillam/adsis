@extends('layouts.app')
@section('content')

    <div id="content-list" style="margin-left: 50px">
        <h1>Editar Curso</h1>
        <form id="update" class='formular' action='/courseCatalog/{{$coursecatalog->id}}' method='POST'>
            @csrf
            @method ('PATCH')
            {{ csrf_field() }}
            <label>Nombre:</label>
            <input class="campos" type="text" name="name" value="{{$coursecatalog->name}}">
            <br>
            <label>Fecha inicio:</label>
            <input class="campos" type="date" name="start_date" value="{{$coursecatalog->start_date}}">
            <br>
            <label>Duración (en semanas):</label>
            <input class="campos" type="text" name="weeks" value="{{$coursecatalog->weeks}}">
            <br>
            <label>Fecha fin:</label>
            <input class="campos" type="date" name="end_date" value="{{$coursecatalog->end_date}}">
            <br>
            <input type="submit" class="boton" value="Listo">
            <br>
       </form>     
     </div>
@endsection