@extends('Layouts.app')
@section('content')
<a href="{{ route('process.show', array('id' => $process->id)) }}">
    <span class="glyphicon glyphicon-circle-arrow-left"></span>
    Back to process details
</a>
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">Edit Process: {{ $process->name }}</h1>
        <div class="col-xs-12 col-sm-8">

                    {{ Form::model($process, array('method' => 'PUT', 'route' => array('process.update', $process->id))) }}

                    <div class="form-group">
                        {{ Form::label('name', 'Name:')}}
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                    </div>
                    
                    <div class="form-group">
                        {{ Form::label('description', 'Description:')}}
                        {{ Form::textarea('description', null, ['class' => 'form-control']) }}
                    </div>

                    {{ Form::text('id', null, ['class' => 'form-control hidden']) }}
                    {{ Form::text('concept_id', null, ['class' => 'form-control hidden']) }}

                    <div class="form-group">
                        {{ Form::label('youtube', 'Youtube Link:')}}
                        {{ Form::text('youtube', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::submit('Update Process', ['class' => 'btn btn-default form-control']) }}
                    </div>

                    {{ Form::close() }}
        </div>
    </div>
</div>
@stop