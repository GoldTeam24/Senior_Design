
@extends('app')
@section('content')

	<style type="text/css">
		div.jumbotron {
			background-color: transparent;
		}
	</style>

	<div class="jumbotron">
		<h1 class="text-center"> Prerequisite Knowledge </h1>

	    <div class="links text-center">
	        <a href="{{ route('search') }}">Search Concepts</a>
	    </div>
	</div>

    {{-- <div class="title m-b-md">
        Prerequisite<br>Knowledge
    </div> --}}

@stop

@include('footer')