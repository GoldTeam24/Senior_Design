@extends('Layouts.app')
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">Edit Account Information</h1>
            <div class="col-xs-12 col-sm-8">

                {{ Form::model($userInfo, array('method' => 'PUT', 'route' => array('user.update', $userInfo->id))) }}

                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                    {{ Form::label('name', 'Username:')}}
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    {{ Form::label('email', 'Email:')}}
                    {{ Form::text('email', null, ['class' => 'form-control']) }}
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
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