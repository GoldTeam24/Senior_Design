
@extends('app')
@section('content')

<div class="title m-b-md">
    {{ $concept->name }} 

    <h3>{{ $concept->description }}</h3>

    <h4>{{ $concept->body }}</h4>
</div>
    <h2>Parent Concepts</h2>
    @if (count($parentConcepts) == 0)
    No parent concepts...
    @endif
    @if (count($parentConcepts))
    
    @foreach ($parentConcepts as $concept)
        <div class="panel panel-primary">
        <div class="panel-heading text-left"> 
            <a href="{{ route('concept', array('id' => $concept->id)) }}" style="color: white">{{ $concept->name }}</a>
        </div>
        <div class="panel-body text-left">
            {{ $concept->description }}
        </div>
    </div>
    @endforeach
    
    @endif


    <h2>Child Concepts</h2>
    @if (count($childConcepts) == 0)
    No child concepts...
    @endif
    @if (count($childConcepts))
    @foreach ($childConcepts as $concept)
        <div class="panel panel-primary">
        <div class="panel-heading text-left"> 
            <a href="{{ route('concept', array('id' => $concept->id)) }}" style="color: white">{{ $concept->name }}</a>
        </div>
        <div class="panel-body text-left">
            {{ $concept->description }}
        </div>
    </div>
    @endforeach
    
@endif
@stop