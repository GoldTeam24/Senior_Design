<style type="text/css">
    #stem-filter-row {
        margin: 15px 0;
    }

    #stem-filter-row input {
        margin: 10px 0;
    }
</style>

<div id="stem-filter-row" class="row">
    @foreach ( $filterOptions as $filter => $name )
        <?php 
            if ($filter == "primary") {
                continue;
            } 
        ?>
        <div class="col-xs-6 col-sm-6 col-lg-3 text-center">
            {!! Form::open(['url' => 'search/name']) !!}
                {{ Form::submit($name, ['name' => 'filters', 'class' => 'btn btn-lg btn-default ' . $filter]) }}
        </div>
    @endforeach
</div>