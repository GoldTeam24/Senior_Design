@extends('Layouts.app')
@section('content')
<a href="{{ route('process.show', array('id' => $processId)) }}">
    <span class="glyphicon glyphicon-circle-arrow-left"></span>
    Back to process details
</a>
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">Create {{ $processName }}: Step {{ $step }}</h1>
        <div class="col-xs-12 col-sm-8">
                    {{ Form::open(['route' => 'processStep.store']) }}

                    <div class="form-group">
                        {{ Form::label('name', 'Name:')}}
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                    </div>
                    
                    <div class="form-group">
                        {{ Form::label('description', 'Description:')}}
                        {{ Form::textarea('description', null, ['class' => 'form-control']) }}
                    </div>

                    {{ Form::text('step', $step, ['class' => 'form-control hidden']) }}
                    {{ Form::text('process_id', $processId, ['class' => 'form-control hidden']) }}

                    <div class="form-group">
                        {{ Form::submit('Add Process Step', ['class' => 'btn btn-default form-control']) }}
                    </div>

                    {{ Form::close() }}
        </div>
    </div>
</div>
@stop