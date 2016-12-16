<head>
    <script src="{{ asset('js/vendor/jquery.js') }}"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<nav class="top-bar navbar navbar-default" data-topbar>
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav pull-right">
                <li><a href="/"> Home </a></li>
                <li><a href="/search"> Search </a>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Options <span class="caret"></span></a>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="#"> Account Information </a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#"> Settings </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
