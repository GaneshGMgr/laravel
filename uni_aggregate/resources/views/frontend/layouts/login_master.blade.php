<html lang="en">



<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <!-- Favicon -->
 <link href="{{asset('assets/frontend/images/favicon.png')}}" rel="icon" type="image/png">

  <!-- Basic Page Needs
        ================================================== -->
  <title>Courseplus Template</title>
  <meta name="description" content="Courseplus is - Professional A unique and beautiful collection of UI elements">



<!-- icons
================================================== -->
<link rel="stylesheet" href="{{asset('assets/frontend/css/icons.css')}}">

<!-- CSS
================================================== -->
<link href="{{ asset('assets/backend/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{asset('assets/frontend/css/uikit.css')}}">
<link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
<link href="{{asset('assets/frontend/tailwind.min.css')}}" rel="stylesheet">
  <style>
    input , .bootstrap-select.btn-group button{
        background-color: #f3f4f6  !important;
        height: 44px  !important;
        box-shadow: none  !important;
    }
  </style>

</head>
<body>

  <div id="wrapper" class="flex flex-col justify-between h-screen">

      <!-- header-->
      <div class="bg-white py-4 shadow dark:bg-gray-100">
          <div class="max-w-6xl mx-auto">


              <div class="flex items-center lg:justify-between justify-around">

              <a href="{{route('frontend.index')}}">
                    <img src="{{asset('assets/frontend/images/logo.png')}}" alt="" class="w-32">
                  </a>

                  <div class="capitalize flex font-semibold hidden lg:block my-2 space-x-3 text-center text-sm">
                      <a href="{{route('frontend.signin')}}" class="py-3 px-4">Login</a>
                      <a href="{{route("frontend.register")}}" class="bg-purple-500 purple-500 px-6 py-3 rounded-md shadow text-white">Register</a>
                  </div>

              </div>


          </div>
      </div>

      <!-- Content-->
      @yield('content')

      <!-- Footer -->
      <div class="lg:mb-5 py-3 uk-link-reset">
          <div class="flex flex-col items-center justify-between lg:flex-row max-w-6xl mx-auto lg:space-y-0 space-y-3">
              <div class="flex space-x-2 text-gray-700 uppercase">
                  <a href="#"> About</a>
                  <a href="#"> Help</a>
                  <a href="#"> Terms</a>
                  <a href="#"> Privacy</a>
              </div>
              <p class="capitalize"> © copyright 2023 by Whive</p>
          </div>
      </div>

  </div>



<!-- Javascript
================================================== -->

<script src="{{ asset('assets/backend/js/jquery.min.js') }}"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="{{ asset('assets/backend/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/app.js') }}"></script>
<script src="{{ asset('assets/backend/js/validator.js') }}"></script>
<script src="{{ asset('assets/frontend/js/uikit.js') }}"></script>
<script src="{{ asset('assets/frontend/js/tippy.all.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/simplebar.js') }}"></script>
<script src="{{ asset('assets/backend/libs/select2/js/select2.min.js') }}"></script>
<!-- <script src="assets/js/custom.js"></script> -->
<script src="{{ asset('assets/frontend/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/frontend/ionicons.js') }}"></script>
<script>
      init_validator();
    validator.defaults.alerts=false;

</script>

@yield('script')

</body>



</html>
