@include('header')
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
    {!! Form::submit('Search', ['class' => 'btn btn-default',
                                                'style' => 'margin-top: 15px']) !!}
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
@include('footer')