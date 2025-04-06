<!DOCTYPE html>
<html lang="en">


<head>

    <title>{{siteSetting()->site_name}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Courseplus is - Professional A unique and beautiful collection of UI elements">

    <!-- Favicon -->
    <link href="{{ asset('assets/frontend/images/favicon.png') }}" rel="icon" type="image/png">

    <!-- icons
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/icons.css') }}">

    <!-- CSS
    ================================================== -->
    <link href="{{ asset('assets/backend/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/uikit.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link href="{{ asset('assets/frontend/tailwind.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>



    <div id="wrapper" class="is-verticle">

        <div class="main_content">

            @include('frontend.layouts.header')

            @yield('content')

            @include('frontend.layouts.footer')
        </div>

        @include('frontend.layouts.sidebar')


    </div>

    <!-- Javascript
        ================================================== -->
        <script src="{{ asset('assets/backend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/jquery-3.6.0.min.js') }}"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('assets/frontend/js/uikit.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/tippy.all.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/simplebar.js') }}"></script>
    <script src="{{ asset('assets/backend/libs/select2/js/select2.min.js') }}"></script>
    <!-- <script src="assets/js/custom.js"></script> -->
    <script src="{{ asset('assets/frontend/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/ionicons.js') }}"></script>
    <script src="{{ asset('assets/backend/js/app.js') }}"></script>
    <script src="{{ asset('assets/backend/js/validator.js') }}"></script>
    <script>
         init_validator();
        validator.defaults.alerts = false;

    </script>

    @yield('script')




</body>

</html>
