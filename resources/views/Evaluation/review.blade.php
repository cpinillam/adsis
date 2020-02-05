@extends('layouts.app')
@section('content')
    <div id="content-list" style="margin-left: 50px">
        <h1>Lista de revisiones</h1>
        <table> 
            <tr>
                <th>Alumno</th>
                <th>Id Evaluacion</th>
                <th>Id Curso</th>
                <th>Ámbito</th>
                <th>Fecha actualización</th>
            </tr>
            @foreach ($reviews as $review)
                <tr>
                    {{ csrf_field() }}
                    <td>{{$review->evaluation->user->name}}</td>
                    <td>{{$review->evaluation_id}}</td>
                    <td>{{$review->evaluation->course_id}}</td>
                    <td>{{$review->evaluation->scope}}</td>
                    <td>{{$review->updated_at}}</td>                   
                    <td>
                        <form method="GET" action="/review/{{$review->id}}/edit">
                            <input class="botonLista" type="submit" value="Editar">
                        </form> 
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection