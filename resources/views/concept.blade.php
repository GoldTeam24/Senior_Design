@extends('Layouts.app')
@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<style type="text/css">
    #concept-col {
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
        <h1 id="concept-name" class="page-header"> {{ $concept->name }} 
        
         @if (Auth::check())
            <ul class="nav navbar-nav pull-right">
                <li>
                    <a class="btn btn-default pull-right" href="{{ route('editConcept', array('id' => $concept->id)) }}">Edit concept</a> 
                </li>
                <li>
                    {{ Form::open(['method' => 'DELETE', 'route' => ['concept.destroy', $concept->id], 'onsubmit' => 'return confirm("Are you sure you want to delete this concept?")']) }}
                        {{ Form::submit('Delete Concept', ['class' => 'btn btn-default pull-right']) }}
                    {{ Form::close() }}
                </li>
            </ul>
        @endif

        </h1>

        <h4>{{ $concept->description }}</h4>

        <p>{{ $concept->body }}</p>
    </div>
</div>
<div class="row">
    <div id="concept-col" class="col-xs-12 col-sm-6">
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
            @foreach ($parentConcepts as $concept)
                <div class="panel panel-default panel-umich">
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
            <p> No child concepts... </p>
        @endif
        
        @if (count($childConcepts))
            @foreach ($childConcepts as $concept)
                <div class="panel panel-default panel-umich">
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

    <div id="media-col" class="col-xs-12 col-sm-6">
        <h2> Media </h2>

        <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
        <div class="embed-responsive embed-responsive-16by9">
            <div id="player" class="embed-responsive-item"></div>
        </div>

        <script>
            // 2. This code loads the IFrame Player API code asynchronously.
            var tag = document.createElement('script');
            tag.src = "https://www.youtube.com/iframe_api";

            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

            // 3. This function creates an <iframe> (and YouTube player)
            //    after the API code downloads.
            var player;
            function onYouTubeIframeAPIReady() {
                player = new YT.Player('player', {
                    height: '390',
                    width: '640',
                    videoId: 'M7lc1UVf-VE',
                    events: {
                        'onReady': onPlayerReady,
                        'onStateChange': onPlayerStateChange
                    }
                });
            }

            // 4. The API will call this function when the video player is ready.
            function onPlayerReady(event) {
                event.target.playVideo();
            }

            // 5. The API calls this function when the player's state changes.
            //    The function indicates that when playing a video (state=1),
            //    the player should play for six seconds and then stop.
            var done = false;
            function onPlayerStateChange(event) {
                if (event.data == YT.PlayerState.PLAYING && !done) {
                    setTimeout(stopVideo, 6000);
                    done = true;
                }
            }
            function stopVideo() {
                player.stopVideo();
            }
        </script>
    </div>
</div>
@stop