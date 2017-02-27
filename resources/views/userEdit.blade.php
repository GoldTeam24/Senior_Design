@extends('Layouts.app')
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">Edit Account Information</h1>
            <div class="col-xs-12 col-sm-8">

                {{ Form::model($userInfo, array('method' => 'PUT', 'route' => array('user.update', $userInfo->id))) }}

                <div class="form-group">
                    {{ Form::label('name', 'Username:')}}
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('email', 'Email:')}}
                    {{ Form::text('email', null, ['class' => 'form-control']) }}
                </div>

                {{ Form::text('id', null, ['class' => 'form-control hidden']) }}

                <div class="form-group">
                    {{ Form::submit('Update Account Information', ['class' => 'btn btn-default form-control']) }}
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>

@stop