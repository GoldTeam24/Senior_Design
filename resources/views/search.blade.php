@extends('Layouts.app')
@section('content')

<style type="text/css">
    .concept .panel,
    .concept .panel .panel-heading {
        border-radius: 0px;
    }

</style>

<div class="row">
    <div class="title text-center"> Procedural Learning </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
            @include("partials/stemFilter")
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-sm-offset-3">
        {!! Form::open(['url' => 'search/name']) !!}
            @if (!count($concepts))
            {!! Form::text('searchString', null,
                                   ['class'=>'form-control']) !!}
            @endif

            @if (count($concepts))
            {!! Form::text('searchString', $searchString,
                                   ['required',
                                    'class'=>'form-control',
                                    'placeholder'=>'Enter search concept...']) !!}
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
                    <div class="panel-heading"> 
                        <div class="row"> 
                            <div class="text-left col-xs-12 col-sm-8">
                                <a title="View concept" href="{{ route('concept.show', array('id' => $concept->id)) }}"> {{ $concept->name }} </a>
                            </div>
                            <div title="Filter type" class="text-right col-xs-12 col-sm-4 text-capitalize filter-type">
                                Type: {{ $concept->stem }}
                            </div>
                        </div>
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
