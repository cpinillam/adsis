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
  let indicator2 = new Gauge('#result2',350);
  indicator2.render();
  let indicator3 = new Gauge('#result3',350);
  indicator3.render();
  let indicator4 = new Gauge('#result4',350);
  indicator4.render();
</script>

@endsection