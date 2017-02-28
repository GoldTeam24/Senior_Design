@extends('Layouts.app')
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">
                <div class="row">
                    <div class="col-xs-8">
                        Account Information
                    </div>
                    <div class="col-xs-4">
                        <div class="pull-right" role="group">
                            {{ Form::open(['method' => 'DELETE', 'route' => ['user.destroy', Auth::user()->id], 'onsubmit' => 'return confirm("Are you sure you want to deactivate this account? All account information will be permanently lost.")']) }}
                                <a class="btn btn-default" href="{{ route('user.edit', array('id' => Auth::user()->id))}}">
                                    Edit Account Information
                                </a>
                            {{ Form::submit('Deactivate Account', ['class' => 'btn btn-default']) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </h1>

            <h3> Username </h3>
            <p> {{ Auth::user()->name }} </p>

            <h3> Email </h3>
            <p> {{ Auth::user()->email }} </p>
        </div>
    </div>

@stop