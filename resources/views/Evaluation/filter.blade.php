@extends('layouts.app')
@section('content')
    <div id="content-list" style="margin-left: 50px">
        <h1>Evaluaciones</h1>
        <h2>Campos de filtrado</h2>
        <form action="filterEvaluation" method="POST">
          @csrf
            <div class="row">
              <div class="col-md-4">
                <h5>Nombre Alumno</h5>
                <select name="name" class="form-control">
                  @foreach($user as $user)
                    <option value="{{ $user->name }}">{{ $user->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-2 col-3">
                <h5>Agrupado por</h5>
                <select name="sortBy" class="form-control">
                  @foreach(['grupo', 'fecha'] as $col)
                    <option @if($col) selected @endif value="{{ $col }}">{{ ucfirst($col) }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-2 col-3">
                <h5>Orden</h5>
                <select name="orderBy" class="form-control">
                  @foreach(['desc', 'asc'] as $order)
                    <option @if($order) selected @endif value="{{ $order }}">{{ ucfirst($order) }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-2 col-3">
                <button type="submit" class="w-100 btn btn blue">FILTRAR</button>
              </div>
            </div>
          </form>
        </div>
        <div style="height: 200px"></div>
@endsection