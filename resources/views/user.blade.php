@extends('Layouts.app')
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">
                Account Information
                <div class="pull-right" role="group">
                    <a class="btn btn-default" href="{{ route('user.edit', array('id' => Auth::user()->id))}}">
                        Edit Account Information
                    </a>
                    {{ Form::open(['method' => 'DELETE', 'route' => ['user.destroy', Auth::user()->id], 'onsubmit' => 'return confirm("Are you sure you want to deactivate this account? All account information will be permanently lost.")']) }}
                    {{ Form::submit('Deactivate Account', ['class' => 'btn btn-default']) }}
                    {{ Form::close() }}
                </div>
            </h1>

            <h3><strong>Username</strong></h3>
            <h4>{{ Auth::user()->name }}</h4>

            <h3><strong>Email</strong></h3>
            <h4>{{ Auth::user()->email }}</h4>
        </div>
    </div>

@stop