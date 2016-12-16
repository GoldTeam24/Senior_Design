@extends('app')
@section('content')
                <div class="title m-b-md">
                    {{ $concept->name }}
                </div>
                <br>
                <p>{{ $concept->description }}
                <br>
                <p>{{ $concept->body }}

    
    <p>Parent Concepts</p>
    @if (!count($parentConcepts))
    No parent concepts...
    @endif
    @if (count($parentConcepts))
    <ul>
    @foreach ($parentConcepts as $concept)
        <li> <a href="{{ route('concept', array('id' => $concept->id)) }}">{{ $concept->name }}</a>: {{ $concept->description }}</li>
    @endforeach
    
    </ul>
    @endif


    <p>Child Concepts</p>
    @if (!count($parentConcepts))
    No parent concepts...
    @endif
    @if (count($childConcepts))
    <ul>
    @foreach ($childConcepts as $concept)
        <li> <a href="{{ route('concept', array('id' => $concept->id)) }}">{{ $concept->name }}</a>: {{ $concept->description }}</li>
    @endforeach
    
    </ul>
@endif

@stop