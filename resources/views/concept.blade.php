
@extends('app')
@section('content')

<style type="text/css">
    #concept-col {
        border-right: 1px solid #eee;
    }

    div.panel.panel-default {
        border-radius: 0px;
    }
</style>

<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header"> {{ $concept->name }} </h1>

        <h3>{{ $concept->description }}</h3>

        <h4>{{ $concept->body }}</h4>
    </div>
</div>
<div class="row">
    <div id="concept-col" class="col-xs-12 col-sm-8">
      
            <h2>Processes</h2>
        
            @if (count($processes) == 0)
                No process steps...
            @endif

            @if (count($processes))
            @foreach ($processes as $process)
                    <a href="{{ route('process', array('id' => $process->id)) }}"><h3>{{ $process->name }}</h3></a>
                    <h4>{{ $process->description }}</h4>
            @endforeach
        @endif
        
        <h2>Parent Concepts</h2>
        
        @if (count($parentConcepts) == 0)
            No parent concepts...
        @endif

        @if (count($parentConcepts))
            @foreach ($parentConcepts as $concept)
                <div class="panel panel-default">
                <div class="panel-heading text-left"> 
                    <a href="{{ route('concept', array('id' => $concept->id)) }}">{{ $concept->name }}</a>
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
                <div class="panel panel-default">
                <div class="panel-heading text-left"> 
                    <a title="View concept" href="{{ route('concept', array('id' => $concept->id)) }}">{{ $concept->name }}</a>
                </div>
                <div class="panel-body text-left">
                    {{ $concept->description }}
                </div>
            </div>
            @endforeach
        @endif
    </div>

    <div id="media-col" class="col-xs-12 col-sm-4">
        <h4> Media goes here </h4>
    </div>
</div>
@stop