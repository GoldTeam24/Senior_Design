@include('header')
@extends('app')
@section('content')
<head>
    <script src="{{ asset('js/vendor/jquery.js') }}"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

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
    @foreach ($concepts as $concept)
    {{-- <ul>
        <li> {{ $concept->name }}: {{ $concept->body }}</li>
    </ul> --}}
    <div class="panel panel-primary">
        <div class="panel-heading"> {{ $concept->name }} </div>
        <div class="panel-body">
            {{ $concept->body }}
        </div>
    </div>
    @endforeach
@endif
@stop
@include('footer')