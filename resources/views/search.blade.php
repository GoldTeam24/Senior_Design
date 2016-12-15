@extends('app')
@section('content')
<div class="title m-b-md">
    Search 
    <br>
    {!! Form::open(['url' => 'searchInput']) !!}
    {!! Form::text('searchInput', null,
                           ['required',
                            'class'=>'form-control',
                           'placeholder'=>'Search for a concept...']) !!}
    {!! Form::submit('search for a concept') !!}
    {!! Form::close() !!}
</div>


<div class="links">
    <a href="{{ url('/') }}">Home</a>
</div>

@if (count($concepts))
    <ul>
    @foreach ($concepts as $concept)
        <li> {{ $concept->name }}: {{ $concept->body }}</li>
    @endforeach
    
    </ul>
@endif
@stop
