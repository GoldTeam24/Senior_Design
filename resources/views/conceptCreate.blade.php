@extends('Layouts.app')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header">Create Concept</h1>
        <div class="col-xs-12 col-sm-8">
                    {{ Form::open(['route' => ['concept.store']])  }}

                    <div class="form-group">
                        {{ Form::label('name', 'Name:')}}
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                    </div>
                    
                    <div class="form-group">
                        {{ Form::label('description', 'Description:')}}
                        {{ Form::text('description', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('body', 'Body:')}}
                        {{ Form::textarea('body', null, ['class' => 'form-control']) }}
                    </div>
                    <script type="text/javascript">
                        CKEDITOR.replace( 'body' );
                    </script> 

                    <div class="form-group">
                        {{ Form::label('youtube', 'Youtube Link:')}}
                        {{ Form::text('youtube', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::submit('Add Concept', ['class' => 'btn btn-default form-control']) }}
                    </div>

                    {{ Form::close() }}
        </div>
    </div>
</div>
@stop