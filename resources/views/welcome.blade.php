@extends('Layouts.app')
@section('content')

<style type="text/css">
    .concept .panel,
    .concept .panel .panel-heading {
        border-radius: 0px;
    }
    div.jumbotron {
			background-color: transparent;
	}
</style>

<div class="row">
    <div class="jumbotron"> 
    <h1 class="text-center"> Tree of Knowledge </h1>
    </div>
    <div class="col-xs-12 col-sm-6 col-sm-offset-3">
        {!! Form::open(['url' => 'search/name']) !!}

        	{!! Form::text('searchString', null,
                                   ['required',
                                    'class'=>'form-control',
                                    'placeholder'=>'Try searching for \'data\'...']) !!}

            {!! Form::submit('Search', ['class' => 'btn btn-default btn-block',
                                                        'style' => 'margin-top: 15px; max-width: 150px; margin: 15px auto;']) !!}
        {!! Form::close() !!}
    </div>
</div>

@stop
