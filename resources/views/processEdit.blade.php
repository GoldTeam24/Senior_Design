@extends('Layouts.app')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">Edit Process</h1>
        <div class="col-xs-12 col-sm-8">

                    {{ Form::model($process, array('route' => 'updateProcess', 'method' => 'PUT')) }}

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
                        {{ Form::submit('Update Process', ['class' => 'btn btn-default form-control']) }}
                    </div>

                    {{ Form::close() }}
        </div>
    </div>
</div>
@stop