@extends('layouts.app')
@section('content')
    <div id="content-list" style="margin-left: 50px">
        <h1>Catálogo de Cursos</h1>
        <table> 
            <tr>
                <th>Curso</th>
                <th>Nombre</th>
                <th>Fecha inicio</th>
                <th>Duración (semanas)</th>
            </tr>
            @foreach ($coursecatalog as $coursecatalog)
                <tr>
                    {{ csrf_field() }}
                    <td>{{$coursecatalog->id}}</td>
                    <td>{{$coursecatalog->name}}</td>
                    <td>{{$coursecatalog->start_date}}</td>
                    <td>{{$coursecatalog->weeks}}</td>          
                    <td>
                        <form method="GET" action="/courseCatalog/{{$coursecatalog->id}}/edit">
                            <input class="botonLista" type="submit" value="Editar">
                        </form> 
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection