@extends('layouts.main')
@section('content')
	<h1>All Concepts</h1>
	<ul>
		<li><?php var_dump($concepts)?></li>
		{{-- @foreach($concepts as $concept)
		<li></li>
		@endforeach --}}
	</ul>
@stop