@extends('Layouts.app')
@section('content')

<style type="text/css">
    .concept .panel,
    .concept .panel .panel-heading {
        border-radius: 0px;
    }

</style>

<div class="row">
    <div class="title text-center"> Prerequisite Knowledge </div>
    <div class="col-xs-12 col-sm-6 col-sm-offset-3">
        {!! Form::open(['url' => 'search/name']) !!}
            @if (!count($concepts))
            {!! Form::text('searchString', null,
                                   ['required',
                                    'class'=>'form-control']) !!}
            @endif

            @if (count($concepts))
            {!! Form::text('searchString', $searchString,
                                   ['required',
                                    'class'=>'form-control']) !!}
            @endif

            {!! Form::submit('Search', ['class' => 'btn btn-default btn-block',
                                                        'style' => 'margin-top: 15px; max-width: 150px; margin: 15px auto;']) !!}
        {!! Form::close() !!}
    </div>
</div>

@if (count($concepts))
    <div class="row">
        @foreach ($concepts as $concept)
            <div class="concept col-xs-12 col-sm-offset-2 col-sm-8">
                <div class="panel panel-default panel-umich">
                    <div class="panel-heading text-left"> 
                        <a title="View concept" href="{{ route('concept.show', array('id' => $concept->id)) }}"> {{ $concept->name }} </a>
                    </div>
                    <div class="panel-body text-left">
                        {{ $concept->description }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@elseif ($isSearched === true)
    <div class="row">
        <div class="col-xs-12">
            <h2 class="text-center"> No matching results found </h2>
        </div>
    </div>
@endif

@stop
