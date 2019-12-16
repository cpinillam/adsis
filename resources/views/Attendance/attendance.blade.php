
@extends('layouts.app')
@section('content1')
    <div>
        <h1>Asistencias</h1>
        <h2>Campos de filtrado</h2>
        <form action="/attendance/filter">
            <div class="row">
              <div class="col-md-4">
                <input class="form-control form-control-sm" type="search" name="name" value="{{ $name }}">
              </div>
              <div class="col-md-2 col-3">
                <select name="sortBy" class="form-control form-control-sm" value="{{ $sortBy }}">
                  @foreach(['id', 'name', 'group', 'timestamp'] as $col)
                    <option @if($col == $sortBy) selected @endif value="{{ $col }}">{{ ucfirst($col) }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-2 col-3">
                <select name="orderBy" class="form-control form-control-sm" value="{{ $orderBy }}">
                  @foreach(['asc', 'desc', 'timestamp'] as $order)
                    <option @if($order == $orderBy) selected @endif value="{{ $order }}">{{ ucfirst($order) }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-2 col-3">
                <select name="perPage" class="form-control form-control-sm" value="{{ $perPage }}">
                  @foreach(['20','30','50'] as $page)
                    <option @if($page == $perPage) selected @endif value="{{ $page }}">{{ $page }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-2 col-3">
                <button type="submit" class="w-100 btn btn-sm bg-blue">Filtrar</button>
              </div>
            </div>
          </form>
        </div>
    @endsection
@section('content2')
    <div>          
        <h2>Lista de Asistencias</h2>
        <table> 
            <tr>
                <th>Fecha</th>
                <th>Id_Asist</th>
                <th>Alumno_Id</th>
                <th>Nombre</th>
                <th>Tutor_id<th>
                <th>Tipo</th>
                <th>Comentario</th>
            </tr>
            @foreach ($attendance as $attendance)
                <tr>
                    {{ csrf_field() }}
                    <td>{{$attendance->created_at}}</td>
                    <td>{{$attendance->id}}</td>
                    <td>{{$attendance->user_id}}</td>
                    <td>{{$attendance->user->name}}</td>
                    <td>{{$attendance->tutor_id}}</td>
                    <td>{{$attendance->attendance_type}}</td>
                    <td>{{$attendance->comment}}</td>              
                    <td>
                        <form method="GET" action="/attendance/{{$attendance->id}}/edit">
                            <input class="botonLista" type="submit" value="Editar">
                        </form> 
                    </td>
                    {{-- <td>
                        <form action="/attendance/{{$attendance->id}}" method="post">
                            @csrf
                            @method('DELETE')
                        <button class="botonLista" type="submit">Borrar</button>
                        </form>
                    </td> --}}
                </tr>
            @endforeach
        </table>
        
        <div class="botonCrear">
                <br>
                <form method="get" action="/attendance/create">
                            <input class="botonLista" type="submit" value="Crear Hoja Asistencia">
                    <a href="/home">Home</a>
        </div>
    </div>

@endsection