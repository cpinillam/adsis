@extends('layouts.app')
@section('content')
    <div id="content-list" style="margin-left: 50px">
        <h1>Catálogo de Cursos</h1>
        <table> 
            <tr>
                <th>Identificador</th>
                <th>Nombre del curso</th>
                <th>Fecha de inicio</th>
                <th>Fecha de fin</th>
                <th>Duración en semanas</th>
            </tr>
            @foreach ($coursecatalog as $coursecatalog)
                <tr>
                    {{ csrf_field() }}
                    <td>{{$coursecatalog->id}}</td>
                    <td>{{$coursecatalog->name}}</td>
                    <td>{{$coursecatalog->start_date}}</td>
                    <td>{{$coursecatalog->end_date}}</td>
                    <td>{{$coursecatalog->weeks}}</td>          
                    <td>
                        <form method="GET" action="/courseCatalog/{{$coursecatalog->id}}/edit">
                            <input class="botonLista" type="submit" value="Editar">
                        </form> 
                    </td>
                </tr>
            @endforeach
        </table>
    <div>
    </div style="margin-left: 50px">
        <form method="GET" action="/courseCatalog/create">
            <input class="botonLista" type="submit" value="Añadir Curso">
        </form> 
    </div>

@endsection