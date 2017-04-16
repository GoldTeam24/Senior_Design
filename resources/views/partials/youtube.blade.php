@if($bladeView->youtube)
        <div id="media-col" class="col-xs-12 col-sm-push-6 col-sm-6">
            <h2> Media </h2>

            <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
            <div class="embed-responsive embed-responsive-16by9">
                <div id="player" class="embed-responsive-item"></div>
            </div>

            <script> var youtube = {!! json_encode($bladeView->youtube) !!}; </script>
            <script type="text/javascript" src="{{ URL::asset('js/youtube.js') }}"></script>
        </div>
@endif