@extends('Layouts.app')
@section('content')

    <div class="row">
        <h2>Username</h2>
        <p>{{ $userInfo->name }}</p>

        <h2>Email</h2>
        <p>{{ $userInfo->email }}</p>
    </div>

@stop