@extends('Layouts.app')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">{{$processName}} : Step {{$processStep->step}}</h1>
        <div class="col-xs-12 col-sm-8">

                    {{ Form::model($processStep, array('route' => 'updateProcessStep', 'method' => 'PUT')) }}

                    <div class="form-group">
                        {{ Form::label('name', 'Name:')}}
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                    </div>
                    
                    <div class="form-group">
                        {{ Form::label('description', 'Description:')}}
                        {{ Form::textarea('description', null, ['class' => 'form-control']) }}
                    </div>

                    {{ Form::text('id', null, ['class' => 'form-control hidden']) }}
                    {{ Form::text('process_id', null, ['class' => 'form-control hidden']) }}

                    <div class="form-group">
                        {{ Form::submit('Update Process Step', ['class' => 'btn btn-default form-control']) }}
                    </div>

                    {{ Form::close() }}
        </div>
    </div>
</div>
@stop