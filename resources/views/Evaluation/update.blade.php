@extends('layouts.twolevels')
@section('content')

<div style="margin-left: 20px">
    <h3 class="title pt-4 pr-4 mb-0">Autoevaluación</h3>
    <h3>{{$evaluation->course}}</h3> <!--TO DO-->
    <h3>{{$evaluation->scope}}</h3>
    <p  class="pr-4"> A valorar de 1 a 10 las siguientes competencias</p>
    @if ($errors->any())
    <p>Valorar todos los campos</p>
    @endif
    

    <form id="update" class='formular' action='/evaluation/{{$evaluation->id}}' method='POST'>
        @csrf
        @method ('PATCH')
            {{ csrf_field() }}

            <div class="col-md-12">
                <!-- item start -->
                    <div class="slider-item d-flex flex-wrap  w-100">
                        <div class="col-md-8 col-sm-12 d-flex flex-column justify-content-center p-0">

                            <div class="row d-flex">
                                <h5 class="col-sm-7 col-md-8 col-lg-12 d-flex align-items-center text-center"> Meteo Personal</h5>

                                <div class="col-sm-5 col-md-4 d-flex d-lg-none pl-0">
                                    <h3 class="title number w-25 d-flex align-items-center justify-content-center">1</h3>
                                    <div class="face w-75 d-flex align-items-center justify-content-center"><img src="../img/svg/face-1.svg"></div>
                                </div>
                            </div>

                            <input class="rango" type="range" name="meteo" min="1" value="{{$evaluation->meteo}}" max="10" step="1">
                        </div>
                        <div class="col-md-4  col-sm-12 d-flex  d-sm-none d-md-none">
                            <h3 class="title number w-25 d-flex align-items-center justify-content-center">0</h3>
                            <div class="face w-75 d-flex align-items-center justify-content-center"><img src="../img/svg/face-1.svg"></div>
                        </div>
                    </div>
                <!-- item end -->

                <!-- item start -->
                <div class="slider-item d-flex flex-wrap  w-100">
                    <div class="col-md-8 col-sm-12 d-flex flex-column justify-content-center p-0">

                        <div class="row d-flex">
                            <h5 class="col-sm-7 col-md-8 col-lg-12 d-flex align-items-center text-center"> Conocimiento del Idioma</h5>

                            <div class="col-sm-5 col-md-4 d-flex d-lg-none pl-0">
                                <h3 class="title number w-25 d-flex align-items-center justify-content-center">1</h3>
                                <div class="face w-75 d-flex align-items-center justify-content-center"><img src="../img/svg/face-1.svg"></div>
                            </div>
                        </div>

                        <input class="rango" type="range" name="language" min="1" value="{{$evaluation->language}}" max="10" step="1">
                    </div>
                    <div class="col-md-4  col-sm-12 d-flex  d-sm-none d-md-none">
                        <h3 class="title number w-25 d-flex align-items-center justify-content-center">0</h3>
                        <div class="face w-75 d-flex align-items-center justify-content-center"><img src="../img/svg/face-1.svg"></div>
                    </div>
                </div>
                <!-- item end -->

                <!-- item start -->
                <div class="slider-item d-flex flex-wrap  w-100">
                    <div class="col-md-8 col-sm-12 d-flex flex-column justify-content-center p-0">

                        <div class="row d-flex">
                            <h5 class="col-sm-7 col-md-8 col-lg-12 d-flex align-items-center text-center"> Actitud</h5>

                            <div class="col-sm-5 col-md-4 d-flex d-lg-none pl-0">
                                <h3 class="title number w-25 d-flex align-items-center justify-content-center">1</h3>
                                <div class="face w-75 d-flex align-items-center justify-content-center"><img src="../img/svg/face-1.svg"></div>
                            </div>
                        </div>

                        <input class="rango" type="range" name="attitude" value="{{$evaluation->attitude}}" min="1" max="10" step="1">
                    </div>
                    <div class="col-md-4  col-sm-12 d-flex  d-sm-none d-md-none">
                        <h3 class="title number w-25 d-flex align-items-center justify-content-center">0</h3>
                        <div class="face w-75 d-flex align-items-center justify-content-center"><img src="../img/svg/face-1.svg"></div>
                    </div>
                </div>
                <!-- item end -->

                <!-- item start -->
                <div class="slider-item d-flex flex-wrap  w-100">
                    <div class="col-md-8 col-sm-12 d-flex flex-column justify-content-center p-0">

                        <div class="row d-flex">
                            <h5 class="col-sm-7 col-md-8 col-lg-12 d-flex align-items-center text-center"> Aprendizajes conseguidos</h5>

                            <div class="col-sm-5 col-md-4 d-flex d-lg-none pl-0">
                                <h3 class="title number w-25 d-flex align-items-center justify-content-center">1</h3>
                                <div class="face w-75 d-flex align-items-center justify-content-center"><img src="../img/svg/face-1.svg"></div>
                            </div>
                        </div>

                        <input class="rango" type="range" name="learning" value="{{$evaluation->learning}}" min="1" max="10" step="1">
                    </div>
                    <div class="col-md-4  col-sm-12 d-flex  d-sm-none d-md-none">
                        <h3 class="title number w-25 d-flex align-items-center justify-content-center">0</h3>
                        <div class="face w-75 d-flex align-items-center justify-content-center"><img src="../img/svg/face-1.svg"></div>
                    </div>
                </div>
                <!-- item end -->

                <!-- item start -->
                <div class="slider-item d-flex flex-wrap  w-100">
                    <div class="col-md-8 col-sm-12 d-flex flex-column justify-content-center p-0">

                        <div class="row d-flex">
                            <h5 class="col-sm-7 col-md-8 col-lg-12 d-flex align-items-center text-center"> Dinámica de trabajo</h5>

                            <div class="col-sm-5 col-md-4 d-flex d-lg-none pl-0">
                                <h3 class="title number w-25 d-flex align-items-center justify-content-center">1</h3>
                                <div class="face w-75 d-flex align-items-center justify-content-center"><img src="../img/svg/face-1.svg"></div>
                            </div>
                        </div>

                        <input class="rango" type="range" name="workflow" value="{{$evaluation->workflow}}" min="1" max="10" step="1">
                    </div>
                    <div class="col-md-4  col-sm-12 d-flex  d-sm-none d-md-none">
                        <h3 class="title number w-25 d-flex align-items-center justify-content-center">0</h3>
                        <div class="face w-75 d-flex align-items-center justify-content-center"><img src="../img/svg/face-1.svg"></div>
                    </div>
                </div>
                <!-- item end -->

                <!-- item start -->

                <!-- item end -->
                <input class="campos" type="hidden" name="user_id" value="{{$evaluation->user_id}}">
                <input class="campos" type="hidden" name="course_id" value="{{$evaluation->course_id}}">
                <input class="campos" type="hidden" name="scope" value="{{$evaluation->scope}}">
                <input class="campos" type="hidden" name="filled" value="1">
                <input type="submit" class="btn btn-round btn-danger  mt-5 mb-5 w-100" value="Enviar">
            </div>


    </form>
</div>
    <script type="application/javascript">

        const range = document.getElementsByClassName('rango');
        const emoji1 = '<img src="../img/svg/face-1.svg">';
        const emoji2 = '<img src="../img/svg/face-2.svg">';
        const emoji3 = '<img src="../img/svg/face-3.svg">';
        const emoji4 = '<img src="../img/svg/face-4.svg">';
        const emoji5 = '<img src="../img/svg/face-5.svg">';
        const mojis = [emoji1,emoji1,emoji1,emoji2,emoji2,emoji3,emoji3,emoji4,emoji4,emoji5,emoji5];

        for (i = 0; i < range.length; i++){
        let faceDiv = range[i].parentElement.parentElement.getElementsByClassName('face');
        let numberDiv = range[i].parentElement.parentElement.getElementsByClassName('number');
        console.log(numberDiv)



        range[i].addEventListener('input', (e) => {

            let rangeValue = e.target.value;
            faceDiv[0].innerHTML = mojis[rangeValue];
            faceDiv[1].innerHTML = mojis[rangeValue];
            numberDiv[0].innerHTML = rangeValue;
            numberDiv[1].innerHTML = rangeValue;
            console.log(e);
        })};

    </script>


@endsection



