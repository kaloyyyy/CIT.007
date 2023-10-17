<!DOCTYPE html>
<html lang="en" data-bs-theme="">
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Add your CSS and JS includes here -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Prince Tasty Lechon</title>
    <link rel="icon" href="{{ asset('images/logo_PTLechon.png') }}" type="image/x-icon"/>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Include Bootstrap Datetimepicker CSS and JavaScript -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
</head>
<body class="min-vh-100 text-white  m-0 p-0">
<div class="min-vh-100 d-flex flex-column p-0 m-0">
    @component('components.header')
    @endcomponent

    <div id="app" class="flex-grow-1 d-flex justify-content-center">
        <div class="row justify-content-center align-items-center align-content-center justify-items-center mb-5"> <!-- Center-align content -->
            <div class="col">
                @yield('content')
            </div>
        </div>
    </div>
    @component('components.footer')
    @endcomponent
</div>


<!-- Add your footer here, if needed -->

<!-- Add your scripts here, e.g., Bootstrap, jQuery, etc. -->
</body>
<script src="{{ asset('js/app.js') }}" defer></script>
</html>
