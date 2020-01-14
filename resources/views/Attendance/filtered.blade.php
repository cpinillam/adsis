@extends('layouts.app')
@section('content')
    <div>
        <h2>Asistencias filtradas por Alumno</h2>

        <h4>Indicadores por tipo de Asistencia</h4>
        <div id='result'></div>
         {{-- <table> 
            <tr>
                <th>A</th>
                <th>RJ</th>
                <th>RNJ</th>
                <th>FJ</th>
                <th>FNJ</th>
            </tr>
                <td>{{$indicators[0][0]}}%</td>
                <td>{{$indicators[0][1]}}%</td>
                <td>{{$indicators[0][2]}}%</td>
                <td>{{$indicators[0][3]}}%</td>
                <td>{{$indicators[0][4]}}%</td>
        </table> --}}


        <br>
        <table> 
            <tr>
                <th>Grupo</th>
                <th>Nombre</th>
                <th>Asist_Id</th>
                <th>Fecha</th>
                <th>Tipo</th>
                <th>Comentario</th>
            </tr>
            @foreach ($attendance as $attendance)
                <tr>
                    {{ csrf_field() }}
                    <td>{{$attendance->group}}</td>
                    <td>{{$attendance->name}}</td>
                    <td>{{$attendance->id}}</td>
                    <td>{{$attendance->created_at}}</td>
                    <td>{{$attendance->attendance_type}}</td>
                    <td>{{$attendance->comment}}</td>
                    <td>
                        <form method="GET" action="/attendance/{{$attendance->id}}/edit">
                            <input class="botonLista" type="submit" value="Editar">
                        </form> 
                    </td>              
                </tr>
            @endforeach
        </table>
        <br>
        <a href="/home">Home</a>
    </div>
@endsection

@section('scripts')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.4.11/d3.min.js"></script> --}}
<script>
// ejecución grafico tipos asistencia por alumno
  let label=["A", "RJ", "RNJ", "FJ", "FNJ"];
  let colour=['#1acf17', '#dae012', '#e0880b', '#dae012','#e33b24'];
  let gauge = new Gauge('#result',300, @json($indicators), label, colour);
  gauge.render5Percentages();
  
</script>
@endsection