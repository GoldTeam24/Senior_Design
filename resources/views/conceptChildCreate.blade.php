@extends('Layouts.app')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">Create Child Concept Link</h1>
            <div class="col-xs-12 col-sm-8">
                {{ Form::open(['route' => 'storeChildLink']) }}

                {{ Form::text('parentConceptId', $parentConceptId, ['class' => 'form-control hidden']) }}

                <div class="form-group">
                    {{ Form::label('childConceptId', 'Child Concept ID:')}}
                    {{ Form::select('childConceptId', $concepts, null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::submit('Add Child Concept', ['class' => 'btn btn-default form-control']) }}
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop