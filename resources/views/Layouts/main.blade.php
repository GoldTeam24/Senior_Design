<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Welcome</title>
        <link rel="stylesheet" href="{{ asset('css/foundation.css') }}" />
        <script src="{{ asset('js/vendor/modernizr.js') }}"></script>
    </head>

<body>

    <!-- Header and Nav -->
 
    <nav class="top-bar" data-topbar>
        <ul class="title-area">
            <li class="name">
                <h1><a href="/">CarlPedia</a></h1>
            </li>
        </ul>
    </nav>
 
    <!-- End Header and Nav -->

    <div class="row">
        <div class="large-12">
            @yield('content')
        </div>
    </div>
 
 
    <!-- Footer -->
 
    <footer class="row">
        <div class="large-12 columns">
            <hr />
            <div class="row">
                <div class="large-6 columns">
                    <p>© Gold Team</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('js/vendor/foundation.min.js') }}"></script>
    {{-- {{ html::script('js/foundation.min.js') }} --}}
    <script>
      $(document).foundation();
    </script>
    </body>
</html>