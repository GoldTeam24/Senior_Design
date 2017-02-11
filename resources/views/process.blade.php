@extends('Layouts.app')
@section('content')

<style type="text/css">
    #process-step-col {
        border-right: 1px solid #eee;
    }

    div.panel.panel-default {
        border-radius: 0px;
    }
</style>
<a href="{{ route('concept', array('id' => $process->concept_id)) }}">
    <span class="glyphicon glyphicon-circle-arrow-left"></span>
    Back to concept
</a>
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header"> {{ $process->name }} 
         @if (Auth::check())
                <a class="btn btn-default pull-right" href="{{ route('editProcess', array('id' => $process->id)) }}">Edit process</a> 
            @endif
        </h1>

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
                    <h4> {{ $processStep->step }}. {{ $processStep->name }} 
                        @if (Auth::check())
                             <a class="btn btn-default pull-right" href="{{ route('editProcessStep', array('id' => $processStep->id, 'processName' => $process->name)) }}">Edit</a> 
                        @endif
                    </h4>
                    <p> {{ $processStep->description }} </p>
            @endforeach
        @endif

        @if (Auth::check())
        <a class="btn btn-default" href="{{ route('createProcessStep', array('processId' => $process->id, 'processName' => $process->name, 'step' => $nextStepNumber)) }}">Add a process step</a> 
        @endif
    </div>

    <div id="media-col" class="col-xs-12 col-sm-4">
        <h4> Media goes here </h4>
    </div>
</div>
@stop