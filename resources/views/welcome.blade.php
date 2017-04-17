@extends('Layouts.app')
@section('content')

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(function(){
        $("#carousel").carousel();
    });
</script>

<style type="text/css">
    #carousel {
        height: 350px;
    }

    .carousel-inner {
        height: 100%;
    }

    .carousel, .item, .active {
        height: 100%;
    }

    #carousel img {
        width: auto;
        background-position: center; 
        max-height: 440px;
    }

    .navbar {
        margin-bottom: 0px;
    }

    .concept .panel,
    .concept .panel .panel-heading {
        border-radius: 0px;
    }
    div.jumbotron {
			background-color: transparent;
	}
</style>

<div class="row">
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
            <li data-target="#carousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img style="margin: 0 auto;" src="{{ asset('jpg/Law_School.jpg')}}">
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <img style="margin: 0 auto;" src="{{ asset('jpg/Fairlane-Manor-1.jpg')}}">
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <img style="margin: 0 auto;" src="{{ asset('jpg/Fairlane-Manor-2.jpg')}}">
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <img style="margin: 0 auto;" src="{{ asset('jpg/Fairlane-Manor-3.jpg')}}">
                <div class="carousel-caption">
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    
    <div class="col-xs-12 col-sm-6 col-sm-offset-3">
        {!! Form::open(['url' => 'search/name']) !!}
            @include('partials/stemFilter')
            
        <div class="title text-center"> Procedural Learning </div>
            
        {!! Form::text('searchString', null,
                       ['class'=>'form-control',
                        'placeholder'=>'Enter search concept...']) !!}

        {!! Form::submit('Search', ['class' => 'btn btn-default btn-block', 'style' => 'margin-top: 15px; max-width: 150px; margin: 15px auto;']) !!}
        {!! Form::close() !!}

    </div>
</div>

@stop
