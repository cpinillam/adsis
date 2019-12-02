@extends('layouts.app')

@section('content')

document: {{$user->document}}
<br>
name: {{$user->name}}
<br>
description: {{$user->description}}

@endsection
