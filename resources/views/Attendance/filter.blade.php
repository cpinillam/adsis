@extends('layouts.app')
@section('content')
    <div>
        <h1>Asistencias</h1>
        <h2>Campos de filtrado</h2>
        <form action="filter" method="get">
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
                  @foreach(['desc', 'asc'] as $order)
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