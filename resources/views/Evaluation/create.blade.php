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
        <input type="range" name="learning" min="0" max="5" id="h" value="{{$evaluation->meteo}}">
        <br>
        <label>Idioma:</label>
        <input type="range" name="learning" min="0" max="5" id="myRange" class="slider"value="{{$evaluation->language}}">
        <br>
        <label>Actitud:</label>
        <input type="range" name="learning" min="0" max="5" value="{{$evaluation->attitude}}">
        <br>
        <label>Participación:</label>
        <input type="range" name="learning" min="0" max="5" value="{{$evaluation->participation}}">
        <br>
        <label>Aprendizaje:</label>
        <input type="range" name="learning" min="0" max="5" value="{{$evaluation->learning}}">
        <br>
        <label>Colaboración:</label>
        <input type="range" name="learning" min="0" max="5" value="{{$evaluation->collaboration}}">
        <br>
        <input class="campos" type="hidden" name="user_id" value="{{$evaluation->user_id}}">
        <input type="submit" class="boton" value="Enviar">

        <br>
    </form>

</div>
@endsection


@section('scripts')

<script>
    var slider = document.getElementById("myRange");
    var output = document.getElementsByTagName("class");
    slider.oninput = function() {
    output.innerHTML = this.class;
}
  //  var slider = document.getElementsById("h");
   // var slider = document.getElementsByTagName("value");

    //output.innerHTML = slider.value;
   // slider.oninput =function(){
   //     output.innerHTML = this.value;
   // }

//slider.oninput = function() {
//	$('.count').text(this.value)({
//		'left': this.value + '%',
//		'transform': 'translateX(-' + this.value + '%)'
//	});
  //  ('width', this.value + '%');
    //return value}

</script>
@endsection
