@extends('Layouts.app')
@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<style type="text/css">
    #concept-col.has-media {
        border-right: 1px solid #eee;
    }

    div.panel.panel-default,
    div.panel.panel-umich .panel-heading {
        border-radius: 0px;
    }

    .page-header {
        margin-top: 0;
    }

    #media-col {
        padding-bottom: 15px;
    }
</style>

<div class="row">
    <div class="col-xs-12">
        <h1 id="concept-name" class="page-header">
            <div class="row">
                <div class="col-xs-8">
                    {{ $concept->name }}
                </div>

                <div class="col-xs-4">
                    @if (Auth::check())
                        {{ Form::open(['method' => 'DELETE', 'route' => ['concept.destroy', $concept->id], 'onsubmit' => 'return confirm("Are you sure you want to delete this concept?")']) }}
                        <div class="pull-right" role="group">
                            <a class="btn btn-default" href="{{ route('editConcept', array('id' => $concept->id)) }}">
                                Edit concept
                            </a>

                            {{ Form::submit('Delete Concept', ['class' => 'btn btn-default']) }}
                        </div>
                        {{ Form::close() }}
                    @endif
                </div>
            </div>
        </h1>

        <h4>{{ $concept->description }}</h4>

        <p>{{ $concept->body }}</p>
    </div>
</div>
<div class="row">
    <div id="concept-col" class="col-xs-12 col-sm-6 {{ $concept->youtube ? 'has-media' : '' }}">
        <h2>Processes</h2>

        @if (count($processes) == 0)
            <p> No process steps... </p>
        @endif

        @if (count($processes))
            @foreach ($processes as $process)
                <a href="{{ route('process', array('id' => $process->id)) }}"><h4>{{ $process->name }}</h4></a>
                <p>{{ $process->description }}</p>
            @endforeach
        @endif

        @if (Auth::check())
            <a class="btn btn-default" href="{{ route('createProcess', array('conceptId' => $concept->id, 'conceptName' => $concept->name)) }}">Add a process</a>
        @endif

        <h2>Parent Concepts</h2>

        @if (count($parentConcepts) == 0)
            No parent concepts...
        @endif

        @if (count($parentConcepts))
            @foreach ($parentConcepts as $parentConcept)
                <div class="panel panel-default panel-umich">
                    <div class="panel-heading text-left">
                        <a href="{{ route('concept', array('id' => $parentConcept->id)) }}">{{ $parentConcept->name }}</a>
                    </div>
                    <div class="panel-body text-left">
                        {{ $parentConcept->description }}
                    </div>
                </div>
            @endforeach
        @endif

        <h2>Child Concepts</h2>

        @if (count($childConcepts) == 0)
            <p> No child concepts... </p>
        @endif

        @if (count($childConcepts))
            @foreach ($childConcepts as $childConcept)
                <div class="panel panel-default panel-umich">
                    <div class="panel-heading text-left">
                        <a title="View concept" href="{{ route('concept', array('id' => $childConcept->id)) }}">{{ $childConcept->name }}</a>
                    </div>
                    <div class="panel-body text-left">
                        {{ $childConcept->description }}
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <?php $bladeView = $concept ?>
    @include('fragments/youtube')
</div>
@stop