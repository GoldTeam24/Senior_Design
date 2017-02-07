@extends('Layouts.app')
@section('content')

<style type="text/css">
    #concept-col {
        border-right: 1px solid #eee;
    }

    div.panel.panel-default {
        border-radius: 0px;
    }
</style>
<a href="{{ route('concept', array('id' => $process->concept_id)) }}"><h5>Back to concept</h5></a>
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header"> {{ $process->name }} </h1>

        <h4>{{ $process->description }}</h4>
    </div>
</div>
<div class="row">
    <div id="process-step-col" class="col-xs-12 col-sm-8">
        <h2>Process Steps</h2>
        
        @if (count($processSteps) == 0)
            No process steps...
        @endif

        @if (count($processSteps))
            @foreach ($processSteps as $processStep)
                    <h3>{{ $processStep->step }}. {{ $processStep->name }}</h3>
                    <h4>{{ $processStep->description }}</h4>
            @endforeach
        @endif
    </div>

    <div id="media-col" class="col-xs-12 col-sm-4">
        <h4> Media goes here </h4>
    </div>
</div>
@stop