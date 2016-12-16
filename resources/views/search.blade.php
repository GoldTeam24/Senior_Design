
@extends('app')
@section('content')

<div class="title m-b-md">
    Search 
    {!! Form::open(['url' => 'search/name']) !!}
    @if (!count($concepts))
    {!! Form::text('searchString', null,
                           ['required',
                            'class'=>'form-control',
                            'style' => 'min-width: 548.475px']) !!}
    @endif
    @if (count($concepts))
    {!! Form::text('searchString', $searchString,
                           ['required',
                            'class'=>'form-control',
                            'style' => 'min-width: 548.475px;']) !!}
    @endif
    {!! Form::submit('Search', ['class' => 'btn btn-default',
                                                'style' => 'margin-top: 15px']) !!}
    {!! Form::close() !!}
</div>

@if (count($concepts))
    @foreach ($concepts as $concept)
    <div class="panel panel-primary">
        <div class="panel-heading text-left"> 
            <a href="{{ route('concept', array('id' => $concept->id)) }}" style="color: white">{{ $concept->name }}</a>
        </div>
        <div class="panel-body text-left">
            {{ $concept->description }}
        </div>
    </div>
    @endforeach
@endif
@stop
