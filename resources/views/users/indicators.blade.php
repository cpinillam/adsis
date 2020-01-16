@extends('layouts.app')
@section('content')
<div id="content-list" style="margin-left: 50px">
<h2>Indicadores - Dashboard</h2>
  <div id='container'>
      <h4>Aprendizajes conseguidos</h4>
      <div id='result2'></div>
      <h4>Dinámica de trabajo</h4>
      <div id='result3'></div>
      <h4>Actitud</h4>
      <div id='result4'></div>
      <h4>Idioma</h4>
      <div id='result5'></div>
  </div>
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
  let evaluation2=[44,76,80,30];
  let indicator2 = new Gauge;
  indicator2.render4Integers('#result3',350, evaluation2, label2, colour1);

  let label3=['Teoría', 'Rev1', 'Práctica', 'Rev2'];
  let evaluation3=[87,60,70,40];
  let indicator3 = new Gauge;
  indicator3.render4Integers('#result4',350, evaluation3, label3, colour1);

  let label4=['Teoría', 'Rev1', 'Práctica', 'Rev2'];
  let evaluation4=[56,34,70,60];
  let indicator4 = new Gauge;
  indicator4.render4Integers('#result5',350, evaluation4, label4, colour1);
 
</script>

@endsection