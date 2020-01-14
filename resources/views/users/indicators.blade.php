@extends('layouts.app')
@section('content')
<h3>Prueba 3 indicadores con etiquetas</h3>
<div id='container'>
    <h5>Aprendizajes conseguidos</h5>
    <div id='result2'></div>
    <h5>Dinámica de trabajo</h5>
    <div id='result3'></div>
    <h5>Actitud</h5>
    <div id='result4'></div>
</div>
@endsection

@section('scripts')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.4.11/d3.min.js"></script> --}}
<script>
  let label1=['Teoría', 'Rev1', 'Práctica', 'Rev2'];
  let colour1=['#2562e6', '#658ee6', '#b730e3', '#d08ce6'];
  let evaluation1=[35,46,50,70];
  let indicator1 = new Gauge;
  indicator1.render4Integers('#result2',350, evaluation1, label1, colour1);

  let label2=['Teoría', 'Rev1', 'Práctica', 'Rev2'];
  let evaluation2=[44,86,90,30];
  let indicator2 = new Gauge;
  indicator2.render4Integers('#result3',350, evaluation2, label2, colour1);

  let label3=['Teoría', 'Rev1', 'Práctica', 'Rev2'];
  let evaluation3=[97,86,70,40];
  let indicator3 = new Gauge;
  indicator3.render4Integers('#result4',350, evaluation3, label3, colour1);
 
</script>

@endsection