<!doctype html>
<html lang="en" class="pxp-root">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&amp;display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    @yield('head')
</head>

<body>
    <div class="pxp-preloader" style="display: none;"><span>Loading...</span></div>
    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')


    <div class="modal fade pxp-user-modal" id="pxp-signin-modal" aria-hidden="true" aria-labelledby="signinModal"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="pxp-user-modal-fig text-center">
                        <img src="{{ asset('assets/images/signin-fig.png') }}" alt="Sign in">
                    </div>
                    <h5 class="modal-title text-center mt-4">Welcome back!</h5>
                    <form class="mt-4" action="{{ route('user.signin') }}" method="post"
                        id="login_form">
                        @csrf
                        <div class="form-floating mb-2">
                            <input type="email" name="email" class="form-control" id="pxp-signin-email"
                                placeholder="Email address">
                            <label for="pxp-signin-email">Email address</label>
                            <span class="fa fa-envelope-o"></span>
                            <span class="errors text-danger"></span>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="password" name="password" class="form-control" id="pxp-signin-password"
                                placeholder="Password">
                            <label for="pxp-signin-password">Password</label>
                            <span class="fa fa-lock"></span>
                            <span class="errors text-danger"></span>
                        </div>

                        <button type="submit" class="btn rounded-pill pxp-modal-cta">Log In</button>
                        <div class="mt-4 text-center pxp-modal-small">
                            <a href="#" class="pxp-modal-link">Forgot password</a>
                        </div>
                        <div class="mt-4 text-center pxp-modal-small">
                            New to Jobster? <a role="button" class="" data-bs-target="#pxp-signup-modal"
                                data-bs-toggle="modal" data-bs-dismiss="modal">Create an account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade pxp-user-modal" id="pxp-signup-modal" aria-hidden="true" aria-labelledby="signupModal"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="pxp-user-modal-fig text-center">
                        <img src="{{ asset('assets/images/signup-fig.png') }}" alt="Sign up">
                    </div>
                    <h5 class="modal-title text-center mt-4" id="signupModal">Create an account</h5>
                    <form class="mt-4" action="{{ route('user.register') }}"
                     method="post" id="create_account">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="pxp-signup-email"
                                placeholder="Email address" required>
                            <label for="pxp-signup-email">Email address</label>
                            <span class="fa fa-envelope-o"></span>
                            <span class="errors text-danger"></span>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" id="pxp-signup-password"
                                placeholder="Create password" required>
                            <label for="pxp-signup-password">Create password</label>
                            <span class="fa fa-lock"></span>
                            <span class="errors text-danger"></span>
                        </div>
                        <div class="form-floating mb-2" style="margin-top:10px; ">
                            <select name="user_type" class="form-select" required>
                                <option selected disabled>select type</option>
                                <option value="1">Candidate</option>
                                <option value="2">Organization</option>
                            </select>
                            <span class="errors text-danger"></span>
                        </div>
                        <button type="submit" class="btn rounded-pill pxp-modal-cta">Create an account</button>
                        <div class="mt-4 text-center pxp-modal-small">
                            Already have an account? <a role="button" class=""
                                data-bs-target="#pxp-signin-modal" data-bs-toggle="modal">Sign in</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/nav.js') }}"></script>
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>


    @yield('script')

    <script>

       $(function(){
        $("#create_account").on('submit', function(event){
            event.preventDefault()

            $(".errors").empty()
            $.ajax({
                type : "POST" ,
                url: "{{ route('user.register')}}"  ,
                data: $(this).serialize(),
                success: function(response){
                    if(response.status){
                        // user created
                    }else{
                        alert(response.msg)
                        const errors = response.result

                        $.each(errors, function(key, value){
                            $('[name="' + key + '"]').addClass('is-invalid').next().html(value[0])
                        })
                    }
                },
                error: function(error){
                    console.log(error)
                }
            })

        })

        $("#login_form").on('submit', function(event){
            event.preventDefault()

            $(".errors").empty()
            $.ajax({
                type : "POST" ,
                url: "{{ route('user.signin')}}"  ,
                data: $(this).serialize(),
                success: function(response){
                    if(response.status){
                        // user created
                        location.replace(response.result)

                    }else{
                        alert(response.msg)
                        const errors = response.result

                        $.each(errors, function(key, value){
                            $('[name="' + key + '"]').addClass('is-invalid').next().html(value[0])
                        })
                    }
                },
                error: function(error){
                    console.log(error)
                }
            })

        })
       })
    </script>
</body>

</html>
