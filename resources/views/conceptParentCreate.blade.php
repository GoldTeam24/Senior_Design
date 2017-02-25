@extends('Layouts.app')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">Create Parent Concept Link</h1>
            <div class="col-xs-12 col-sm-8">
                {{ Form::open(['route' => 'storeParentLink']) }}

                {{ Form::text('childConceptId', $childConceptId, ['class' => 'form-control hidden']) }}

                <div class="form-group">
                    {{ Form::label('parentConceptId', 'Parent Concept ID:')}}
                    {{ Form::select('parentConceptId', $concepts, null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::submit('Add Parent Concept', ['class' => 'btn btn-default form-control']) }}
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop