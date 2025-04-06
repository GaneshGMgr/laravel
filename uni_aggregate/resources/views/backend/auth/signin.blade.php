@include('backend.layouts.head')
@include('backend.layouts.toastr')

<body>

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
            <canvas class="particles-js-canvas-el" width="1898" height="475"
                style="width: 100%; height: 100%;"></canvas>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index.html" class="d-inline-block auth-logo">
                                    <img src="assets/images/logo-light.png" alt="" height="20">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium"></p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back !</h5>

                                </div>
                                <div class="p-2 mt-4">
                                    <form action="{{ route('post.sign.in') }}" method="post" id="login_form"
                                        class="eq-section" novalidate>
                                        @csrf
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email"
                                                placeholder="Enter email" name="email">
                                        </div>

                                        <div class="mb-3">

                                            <label class="form-label" for="password-input">Password</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" class="form-control pe-5 password-input" placeholder="Enter password"
                                                    name="password">
                                                <button
                                                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                    type="button" id="password-addon"><i
                                                        class="ri-eye-fill align-middle"></i></button>
                                            </div>

                                        </div>

                         

                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" id="submit" type="submit">Sign
                                                In</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->



                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        @include('backend.layouts.footer')
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/backend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/backend/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/backend/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/backend/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/backend/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/backend/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/toastr/toastr.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script type="text/javascript" src="{{ asset('assets/backend/libs/choices.js/public/assets/scripts/choices.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assets/backend/libs/flatpickr/flatpickr.min.js') }}"></script>
    <!-- particles js -->
    <script src="{{ asset('assets/backend/libs/particles.js/particles.js') }}"></script>
    <!-- particles app js -->
    <script src="{{ asset('assets/backend/js/pages/particles.app.js') }}"></script>
    <!-- password-addon init -->
    <script src="{{ asset('assets/backend/js/pages/password-addon.init.js') }}"></script>

    <script src="{{ asset('assets/backend/js/app.js') }}"></script>
        <script src="{{ asset('assets/backend/js/validator.js') }}"></script>


    <script>
        init_validator();
        validator.defaults.alerts = false;
    </script>

    <script>
        $(function() {

            $("#login_form").submit(function(event) {

                event.preventDefault();

                if (validator.checkAll($(this))) {

                    const data = new FormData(this)
                    const url = $(this).attr('action')

                    window.ct.postDataMultiPartForm(url, data, $("#save")).then(function(responseData) {
                        toastr.success(responseData.msg);
                        location.replace(responseData.result)


                    }, function(error) {
                        toastr.error(error.msg);
                        window.ct.populateFormError("#login_form", error.result)
                    })
                }
                return false
            })

        })
    </script>

</body>

</html>
