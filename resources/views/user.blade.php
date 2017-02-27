@extends('Layouts.app')
@section('content')

    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-header">
                Account Information
                <a class="btn btn-default pull-right" href="{{ route('user.edit', array('id' => Auth::user()->id))}}">
                    Edit Account Information
                </a>
            </h1>

            <h3><strong>Username</strong></h3>
            <h4>{{ Auth::user()->name }}</h4>

            <h3><strong>Email</strong></h3>
            <h4>{{ Auth::user()->email }}</h4>
        </div>
    </div>

@stop