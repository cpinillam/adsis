@extends('layouts.app')

@section('content')
<div class="container">

    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <div class="profile">
                        <div class="avatar">
                            <img src="./img/faces/card-profile2-square.jpg" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                        </div>
                        <div class="name">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <h3 class="title">{{ Auth::user()->name }}</h3>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 col-sm-6 col-6 ml-auto mr-auto">
                    <div class="profile-tabs">
                        <ul class="nav nav-pills nav-pills-success nav-pills-icons justify-content-center flex-column" role="tablist">

                            @foreach($sortedEvents as $event)
                                {{ csrf_field() }}
                            <li class="nav-item">
                                <a class="nav-link show" role="tab" data-toggle="tab" aria-selected="true">
                                     <i class="material-icons">assignment</i> Evaluación <br>{{$event->event_scope}} {{$event->event_date}} 
                                     <a class="nav-link show" href="/evaluation/create">Completar</a>
                                </a>
                            </li>

                            <li class="nav-item justify-content-center">
                             <div style="max-width: 5px; background-color: #f0efef; height: 30px; display: block; position: relative; left: 50%; transform: translateY(-10px);"></div>
                                <div style="max-width: 20px; height: 20px; display: block; background-color: #f0efef; position: relative; left: 50%; transform: translate(-7.5px, -50%); border-radius: 50%;"></div>
                                <div style="max-width: 5px; background-color: #f0efef; height: 10px; display: block; position: relative; left: 50%; transform: translateY(0px);"></div>
                            </li>
                            @endforeach

                                <li class="nav-item justify-content-center">
                                    <div style="max-width: 10px; height: 10px; display: block; background-color: #b5b0b0; position: relative; left: 50%; transform: translate(-2.5px, 50%); border-radius: 50%;"></div>
                                    <div style="max-width: 5px; background-color: #b5b0b0; height: 40px; display: block; position: relative; left: 50%;"></div>
                                    <div style="max-width: 20px; height: 20px; display: block; background-color: #b5b0b0; position: relative; left: 50%; transform: translate(-7.5px, -50%); border-radius: 50%;"></div>
                                </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <br>
                        <a href="/evaluation">Evaluaciones completadas</a>
                        <br>
                        <a href="attendanceIndicators">Indicadores de evaluación</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
