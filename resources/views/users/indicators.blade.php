@extends('layouts.app')
@section('content')

{{-- <script src="{{ asset('js/raphael-2.1.4.min.js')}}" defer></script> --}}

<div id="ind" class="200x160px"></div>

@section('page-script')
<script type="text/javascript">
	  var g = new JustGage({
    id: "ind",
    value: 67,
    min: 0,
    max: 100,
    title: "Indicator"
  });
</script>
@endsection
@stop
