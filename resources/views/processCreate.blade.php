@extends('Layouts.app')
@section('content')
<a href="{{ route('concept.show', array('id' => $conceptId)) }}">
    <span class="glyphicon glyphicon-circle-arrow-left"></span>
    Back to concept details
</a>
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">{{ $conceptName }} : Create Process</h1>
        <div class="col-xs-12 col-sm-8">
                    {{ Form::open(['route' => 'storeProcess']) }}

                    <div class="form-group">
                        {{ Form::label('name', 'Name:')}}
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                    </div>
                    
                    <div class="form-group">
                        {{ Form::label('description', 'Description:')}}
                        {{ Form::textarea('description', null, ['class' => 'form-control']) }}
                    </div>

                    {{ Form::text('concept_id', $conceptId, ['class' => 'form-control hidden']) }}

                    <div class="form-group">
                        {{ Form::label('youtube', 'Youtube Link:')}}
                        {{ Form::text('youtube', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::submit('Add Process', ['class' => 'btn btn-default form-control']) }}
                    </div>

                    {{ Form::close() }}
        </div>
    </div>
</div>
@stop