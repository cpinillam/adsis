@extends('layouts.app')
@section('content')

<div id="content-list" style="margin-left: 50px">
<h1 class="titulo">Asignar curso y grupo</h1>
    <h5>Tutor:{{$tutor}}</h5>
    <br>
    <form id="create" class='formular' action='/course' method='POST'>
        @csrf
        <table>
            <tr>
                <th>Nombre alumn@</th>
                <th>Curso</th>
                <th>Grupo</th>
            </tr>
            @foreach ($user as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>
                  <select name="{{$user->id}}_course_id" class="form-control">
                   @foreach($coursecatalog as $course)
                      <option value="{{ $course->id }}">{{ $course->name }}</option>
                   @endforeach
                  </select>
                </td>
                <td>
                  <select name="{{$user->id}}_group" class="form-control">
                    @foreach([1,2] as $order)
                      <option @if($order) selected @endif value="{{ $order }}">{{ $order }}</option>
                    @endforeach
                  </select>
                </td>
                <td> <input type="hidden" name="{{$user->id}}_user" value="{{$user->id}}"></td>
            <tr>
            @endforeach
        </table>
        <input type="submit" class="boton" value="Asignar">
        <br>
    </form>
</div>
@endsection
