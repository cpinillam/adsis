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






                </div>
            </div>
        </div>
    </div>
</div>
@endsection
