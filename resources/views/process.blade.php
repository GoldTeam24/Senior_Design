@extends('Layouts.app')
@section('content')

<style type="text/css">
    #process-step-col.has-media {
        border-right: 1px solid #eee;
    }

    div.panel.panel-default {
        border-radius: 0px;
    }
</style>
<a href="{{ route('concept.show', array('id' => $process->concept_id)) }}">
    <span class="glyphicon glyphicon-circle-arrow-left"></span>
    Back to concept
</a>
<div class="row">
    <div class="col-xs-12">
        <h1 class="page-header"> 
            <div class="row">
                <div class="col-xs-8">
                    {{ $process->name }} 
                </div>

                <div class="col-xs-4">
                     @if (Auth::check())
                        {{ Form::open(['method' => 'DELETE', 'route' => ['process.destroy', $process->id], 'onsubmit' => 'return confirm("Are you sure you want to delete this process?")']) }}
                            <div class="pull-right" role="group">
                                <a class="btn btn-default" href="{{ route('process.edit', array('id' => $process->id)) }}">
                                    Edit process
                                </a> 
                                
                                {{ Form::submit('Delete Process', ['class' => 'btn btn-default']) }}
                            </div>
                        {{ Form::close() }}
                    @endif
                </div>
            </div>
        </h1>

        <h4> {{ $process->description }} </h4>
    </div>
</div>
<div class="row">
    <div id="process-step-col" class="col-xs-12 col-sm-6 {{ $process->youtube ? 'has-media' : '' }}">
        <h2>Process Steps</h2>
        
        @if (count($processSteps) == 0)
            No process steps...
        @endif

        @if (count($processSteps))
            @foreach ($processSteps as $processStep)
                    <h4> {{ $processStep->step }}. {{ $processStep->name }} 
                        @if (Auth::check())
                            {{ Form::open(['method' => 'DELETE', 'route' => ['processStep.destroy', $processStep->id], 'onsubmit' => 'return confirm("Are you sure you want to delete this process step?")']) }}
                                <div class="pull-right" role="group">
                                    <a class="btn btn-default" href="{{ route('editProcessStep', array('id' => $processStep->id, 'processName' => $process->name)) }}">Edit</a> 
                                    
                                    {{ Form::submit('Delete', ['class' => 'btn btn-default']) }}
                            </div>
                            {{ Form::close() }}
                        @endif
                    </h4>
                    <p> {{ $processStep->description }} </p>
            @endforeach
        @endif

        @if (Auth::check())
        <a class="btn btn-default" href="{{  route('createProcessStep', ['processId' => $process->id, 'processName' => $process->name, 'step' => $nextStepNumber]) }}">Add a process step</a>
        @endif
    </div>

    <?php $bladeView = $process ?>
    @include('partials/youtube')
</div>
@stop