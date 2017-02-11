@extends('Layouts.app')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">{{ $processName }}: Step {{ $step }}</h1>
        <div class="col-xs-12 col-sm-8">
                    {{ Form::open(['route' => 'storeProcessStep']) }}

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