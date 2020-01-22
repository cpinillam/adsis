@extends('layouts.app')
@section('content')

<div id="content-list" style="margin-left: 50px">
<h1 class="titulo">Asignar Curso y Grupo</h1>
    <label>Nombre Tutor:{{$tutor}}</label>
    <br>
    <form id="create" class='formular' action='/attendance' method='POST'>
        @csrf
        <table>
            <tr>
                <th>Nombre</th>
                <th>Grupo</th>
                <th>Curso</th>
            </tr>
            @foreach ($user as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>
                  <select name="{{$user->id}}_group" class="form-control">
                  @foreach(['1', '2'] as $order)
                    <option @if($order) selected @endif value="{{ $user->group }}">{{ ucfirst($order) }}</option>
                  @endforeach
                </select>
                </td>
                <td>
                  <select name="{{$user->id}}_course" class="form-control">
                   @foreach($coursecatalog as $course)
                      <option value="{{ $course->name }}">{{ $course->name }}</option>
                   @endforeach
                  </select>
                </td>
                <td> <input type="hidden" name="{{$user->id}}_timestamps" value="{{$attendance->timestamps}}"></td>
            <tr>
            @endforeach
        </table>
        <input type="submit" class="boton" value="Asignar">
        <br>
    </form>
</div>
@endsection
