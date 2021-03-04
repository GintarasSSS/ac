<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

        <!-- JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="{{ URL::asset('js/app.js') }}"></script>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-light bg-light mb-4">
                <a class="navbar-brand" href="#">
                    <img src="https://getbootstrap.com/docs/4.3/assets/brand/bootstrap-solid.svg" width="30" height="30" alt="">
                </a>
            </nav>

            <div class="card  mb-4">
                <div class="card-header">
                    Location Search
                </div>

                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" id="city-input" autocomplete="off" placeholder="Enter city name">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Show</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    Weather
                </div>
                <div class="card-body">
                    here
                </div>
            </div>

        </div>
    </body>
</html>
