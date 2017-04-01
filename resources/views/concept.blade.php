@extends('Layouts.app')
@section('content')

<style type="text/css">
    #concept-col.has-media {
        border-right: 1px solid #eee;
    }

    #concept-col {
        margin-bottom: 15px;
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
                <div class="col-xs-12 col-sm-8">
                    {{ $concept->name }}
                </div>

                <div class="col-xs-12 col-sm-4">
                    @if (Auth::check() && Auth::user()->isAdmin())
                        {{ Form::open(['method' => 'DELETE', 'route' => ['concept.destroy', $concept->id], 'onsubmit' => 'return confirm("Are you sure you want to delete this concept?")']) }}
                        <div class="pull-right" role="group">
                            <a class="btn btn-default" href="{{ route('concept.edit', ['id' => $concept->id]) }}">
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

        {!! $concept->body !!}
    </div>
</div>
<div class="row">
    <?php $bladeView = $concept; ?>
    @include('partials/youtube')

    <div id="concept-col" class="col-xs-12 col-sm-6 {{ $concept->youtube ? 'col-sm-pull-6 has-media' : '' }}">
        <h2>Processes</h2>


        @php ($hasUnhiddenProcesses = false)
        @foreach ($processes as $process)
            @if ($process->on_off == true)
                <h4><a href="{{ route('process.show', array('id' => $process->id)) }}">{{ $process->name }}</a> - <span style="color: green">ON</span></h4>
                {!! $process->description !!}
                @php($hasUnhiddenProcesses = true)
            @endif
        @endforeach

        @if (count($processes) == 0 and !$hasUnhiddenProcesses)
            <p> No active processes ... </p>
        @elseif (count($processes) == 0)
            <p> No processes exist for this concept ... </p>
        @endif

        @if (Auth::check() && Auth::user()->isAdmin())
            <a class="btn btn-default" href="{{ route('createProcess', array('conceptId' => $concept->id, 'conceptName' => $concept->name)) }}">Add a process</a>
        @endif

        <h2>Parent Concepts</h2>

        @if (count($parentConcepts) == 0)
            <p> No parent concepts... </p>
        @endif

        @if (count($parentConcepts))
            @foreach ($parentConcepts as $parentConcept)
                <div class="panel panel-default panel-umich">
                    <div class="panel-heading text-left">
                        <a href="{{ route('concept.show', array('id' => $parentConcept->id)) }}">{{ $parentConcept->name }}</a>
                    </div>
                    <div class="panel-body text-left">
                        {{ $parentConcept->description }}
                        @if (Auth::check() && Auth::user()->isAdmin())
                            {{ Form::open(['route' => 'destroyParentLink', 'onsubmit' => 'return confirm("Are you sure you want to delete this parent concept link?")'])}}
                            <div class="pull-right" role="group">
                                {{ Form::text('parentConceptId', $parentConcept->id, ['class' => 'form-control hidden']) }}
                                {{ Form::text('conceptId', $concept->id, ['class' => 'form-control hidden']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-default']) }}
                            </div>
                            {{ Form::close() }}
                        @endif
                    </div>
                </div>
            @endforeach
        @endif

        @if (Auth::check() && Auth::user()->isAdmin())
            <a class="btn btn-default" href="{{ route('createParentLink', array('conceptId' => $concept->id, 'conceptName' => $concept->name)) }}">Link a Parent</a>
        @endif

        <h2>Child Concepts</h2>

        @if (count($childConcepts) == 0)
            <p> No child concepts... </p>
        @endif

        @if (count($childConcepts))
            @foreach ($childConcepts as $childConcept)
                <div class="panel panel-default panel-umich">
                    <div class="panel-heading text-left">
                        <a title="View concept" href="{{ route('concept.show', array('id' => $childConcept->id)) }}">{{ $childConcept->name }}</a>
                    </div>
                    <div class="panel-body text-left">
                        {{ $childConcept->description }}
                    </div>
                    <div class="panel-body text-left">
                        @if (Auth::check() && Auth::user()->isAdmin())
                            {{ Form::open(['route' => 'destroyChildLink', 'onsubmit' => 'return confirm("Are you sure you want to delete this child concept link?")']) }}
                            <div class="pull-right" role="group">
                                {{ Form::text('childConceptId', $childConcept->id, ['class' => 'form-control hidden']) }}
                                {{ Form::text('conceptId', $concept->id, ['class' => 'form-control hidden']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-default']) }}
                            </div>
                            {{ Form::close() }}
                        @endif
                    </div>
                </div>
            @endforeach
        @endif

        @if (Auth::check() && Auth::user()->isAdmin())
            <a class="btn btn-default" href="{{ route('createChildLink', array('conceptId' => $concept->id, 'conceptName' => $concept->name)) }}">Link a Child</a>
        @endif
    </div>
</div>
@stop