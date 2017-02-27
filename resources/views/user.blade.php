@extends('Layouts.app')
@section('content')

    <div class="row">
        <h2>Username</h2>
        <p>{{ Auth::user()->name }}</p>

        <h2>Email</h2>
        <p>{{ Auth::user()->email }}</p>
    </div>

@stop