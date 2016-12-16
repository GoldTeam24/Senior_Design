@include('header')
@extends('app')
@section('content')
<div class="links">
        <a href="{{ url('/') }}">Home</a>
</div>
<br>
<div class="title m-b-md">
    Search 
    {!! Form::open(['url' => 'search/name']) !!}
    @if (!count($concepts))
    {!! Form::text('searchString', null,
                           ['required',
                            'class'=>'form-control',
                           'placeholder'=>'Search for a concept...']) !!}
    @endif
    @if (count($concepts))
    {!! Form::text('searchString', $searchString,
                           ['required',
                            'class'=>'form-control']) !!}
    @endif
    {!! Form::submit('Search', ['class' => 'btn btn-default',
                                                'style' => 'margin-top: 15px']) !!}
    {!! Form::close() !!}
</div>




@if (count($concepts))
    <ul>
    @foreach ($concepts as $concept)
        <li> <a href="{{ route('concept', array('id' => $concept->id)) }}">{{ $concept->name }}</a>: {{ $concept->description }}</li>
    @endforeach
    
    </ul>
@endif
@stop
@include('footer')