@extends('layouts.app')

@section('content')
    @include('includes.toaster')
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Page bg image-->
        <style>body {
                background-image: url('{{asset('assets/media/auth/bg4.jpg')}}');
            }
        </style>
        <!--end::Page bg image-->
        <!--begin::Authentication - Sign-up -->
        <div class="d-flex flex-column flex-column-fluid flex-lg-row">
            <!--begin::Aside-->
            <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
                <!--begin::Aside-->
                <div class="d-flex flex-center flex-lg-start flex-column">
                    <!--begin::Logo-->
                    <a href="#" class="mb-7">
                        <img alt="Logo" src="{{asset('assets/media/small.png')}}"/>
                    </a>
                    <!--end::Logo-->
                    <!--begin::Title-->
                    <h2 class="text-white fw-normal m-0">Library management Software</h2>
                    <!--end::Title-->
                </div>
                <!--begin::Aside-->
            </div>
            <!--begin::Aside-->
            <!--begin::Body-->
            <div class="d-flex flex-center w-lg-50 p-10">
                <!--begin::Card-->
                <div class="card rounded-3 w-md-550px">
                    <!--begin::Card body-->
                    <div class="card-body p-10 p-lg-20">
                        <!--begin::Form-->
                        <form class="form w-100" method="post" action="{{route('user.register')}}" id="register">
                            @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <!--begin::Title-->
                                <h1 class="text-dark fw-bolder mb-3">Sign Up</h1>
                                <!--end::Title-->
                            </div>
                            <!--begin::Heading-->
                            <!--begin::Login options-->
                            <div class="row g-3 mb-9">
                                <!--begin::Col-->
                                <div class="col-md-6">
                                    <!--begin::Google link=-->
                                    <a href="#"
                                       class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                        <img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg"
                                             class="h-15px me-3"/>Sign in with Google</a>
                                    <!--end::Google link=-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6">
                                    <!--begin::Google link=-->
                                    <a href="#"
                                       class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                        <img alt="Logo" src="assets/media/svg/brand-logos/apple-black.svg"
                                             class="theme-light-show h-15px me-3"/>
                                        <img alt="Logo" src="assets/media/svg/brand-logos/apple-black-dark.svg"
                                             class="theme-dark-show h-15px me-3"/>Sign in with Apple</a>
                                    <!--end::Google link=-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Login options-->
                            <!--begin::Separator-->
                            <div class="separator separator-content my-14">
                                <span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
                            </div>
                            <div class="fv-row mb-8">
                                <input type="text" placeholder="Name" name="name" autocomplete="off"
                                       class="form-control bg-transparent"/>
                                <span class="text-danger" role="alert" id="nameError"></span>
                            </div>
                            <div class="fv-row mb-8">
                                <input type="text" placeholder="Email" name="email" autocomplete="off"
                                       class="form-control bg-transparent"/>
                                <span class="text-danger" role="alert" id="emailError"></span>
                            </div>
                            <div class="fv-row mb-8" data-kt-password-meter="true">
                                <div class="mb-1">
                                    <div class="position-relative mb-3">
                                        <input class="form-control bg-transparent" type="password"
                                               placeholder="Password" name="password" autocomplete="off"/>
                                        <span class="text-danger" role="alert" id="passwordError"></span>
                                    </div>
                                    <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                    </div>
                                </div>
                                <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &
                                    symbols.
                                </div>
                            </div>
                            <div class="fv-row mb-8">
                                <!--begin::Repeat Password-->
                                <input placeholder="Confirm Password" name="password_confirmation" type="password"
                                       autocomplete="off" class="form-control bg-transparent"/>
                                <span class="text-danger" role="alert" id="confirm_passwordError"></span>
                            </div>
                            <div class="d-grid mb-10">
                                <button type="submit" class="btn btn-primary">
                                    <span class="indicator-label">Sign up</span>
                                </button>
                            </div>
                            <div class="text-gray-500 text-center fw-semibold fs-6">Already have an Account?
                                <a href="{{route('auth.login')}}" class="link-primary fw-semibold">Sign in</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#register").submit(function(e) {
                e.preventDefault();
                $(".text-danger").html('');

                $.ajax({
                    url: "{{ route('user.register') }}",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        toastr.success(response.success);
                        $("#register")[0].reset();
                    },
                    error: function(response) {
                        var errors = response.responseJSON.errors;
                        var message = '';

                        if (errors) {
                            $.each(errors, function(key, value) {
                                $("#" + key + "Error").html('<strong>' + value +
                                    '</strong>');

                                $("#" + key).keyup(function() {
                                    if ($(this).val() != '') {
                                        $("#" + key + "Error").html('');
                                    }
                                });
                            });
                        } else {
                            message = '<p>' + response.responseJSON.message + '</p>';
                        }
                    }
                });
            });
        });
    </script>
@endsection
