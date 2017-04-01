@extends('Layouts.app')
@section('content')

<style type="text/css">
    #process-step-col.has-media {
        border-right: 1px solid #eee;
    }

    div.panel.panel-default {
        border-radius: 0px;
    }

    div#process-step-col div.row.process-step-row:nth-child(odd) {
        background-color: #f5f5f5;
    }

    div#process-step-col div.row.process-step-row {
        border-top: 1px solid #ddd;
        padding: 5px 0;
    }

    div#process-step-col #add-process-btn {
        margin: 15px 0;
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
                <div class="row process-step-row">
                    <div class="col-xs-12 col-sm-9">
                        <h4> {{ $processStep->step }}. {{ $processStep->name }} - <span style="color: green">ON</span>
                        </h4>
                        <p> {{ $processStep->description }} </p>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        @if (Auth::check())
                            {{ Form::open(['method' => 'DELETE', 'route' => ['processStep.destroy', $processStep->id], 'onsubmit' => 'return confirm("Are you sure you want to delete this process step?")']) }}
                                <div class="pull-right" role="group">
                                    <a class="btn btn-default" href="{{ route('editProcessStep', array('id' => $processStep->id, 'processName' => $process->name)) }}">Edit</a>
                                    
                                    {{ Form::submit('Delete', ['class' => 'btn btn-default']) }}
                            </div>
                            {{ Form::close() }}
                        @endif
                    </div>
                    <br>
                    <div class="col-xs-12 col-sm-9">
                        @if (count($processStep->files))
                        <table class="table table-hover">
                                <tbody>
                            @foreach($processStep->files as $file)
                            
                                <tr>
                                    <td>{{ $file->file_name }}</td>
                                    <td style="width: 88px"> {{ Form::open(['route' => 'downloadProcessStepFile']) }}
                                        <div class="pull-right" role="group">
                                            <input type="hidden" name="fileId" value="{{ $file->id }}">
                                            {{ Form::submit('Download', ['class' => 'btn btn-default']) }}
                                        </div>
                                    </td>
                                {{ Form::close() }}
                                @if (Auth::check())
                                    {{ Form::open(['route' => 'deleteProcessStepFile']) }}
                                    <td style="width: 68px">
                                        <div class="pull-right" role="group">
                                            <input type="hidden" name="fileId" value="{{ $file->id }}">
                                            <input type="hidden" name="processId" value="{{ $process->id }}">
                                            {{ Form::submit('Delete', ['class' => 'btn btn-default']) }}
                                        </div>
                                    </td>
                                    {{ Form::close() }}
                                @endif
                                </tr>
                               
                            @endforeach
                             </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif

        @if (Auth::check())
            <a id="add-process-btn" class="btn btn-default" href="{{  route('createProcessStep', ['processId' => $process->id, 'processName' => $process->name, 'step' => $nextStepNumber]) }}">Add a process step</a>
        @endif
    </div>

    <?php $bladeView = $process ?>
    @include('partials/youtube')
</div>
@stop