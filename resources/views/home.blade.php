@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    hola tio soy  {{ Auth::user()->name }}
                    document: {{$user->document}}
                    <br>
                    name: {{$user->name}}
                    <br>
                    description: {{$user->description}}
                    <a href="/evaluation">Lista de Evaluaciones</a>
                    <br>
                    <a href="/evaluation/create">Crear Evaluación</a>
                    <br>
                    <a href="/evaluationsByUser">Evaluaciones por alumno</a>
                    <br>
                    <br>
                    <a href="/attendance">Lista de Asistencias</a>
                    <br>
                    <a href="/attendance/create">Crear Hoja Asistencia</a>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
