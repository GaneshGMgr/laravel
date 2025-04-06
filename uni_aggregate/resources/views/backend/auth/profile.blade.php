@extends('backend.layouts.master')

@section('content')
    <div class="card mt-xxl-n5">

        <div class="card-body p-4">

            <div class="row g-1">
                <form action="{{route('update.email')}}" class="eq-section"  method="post" id="change_email" novalidate>

                    @csrf


                    <!--end col-->
                    <div class="col-lg-4">
                        <div>
                            <label for="newEmail" class="form-label">New Email</label>
                            <input type="email" class="form-control" id="newEmail" name="email" placeholder="Enter new Email" value="{{$edit_auth->email}}">
                        </div>
                    </div>
                    <!--end col-->


                    <div class="col-lg-12">
                        <div class="text-end">
                            <button type="submit" id="save_email" class="btn btn-success">Change Email</button>
                        </div>
                    </div>
                </form>
                <!--end col-->
            </div>


            <div class="row g-2">

                <form action="{{ route('update.password') }}" id="change_password" method="post" class="eq-section"
                    novalidate>
                    @csrf
                    <div class="col-lg-4">
                        <div>
                            <label for="oldpasswordInput" class="form-label">Old Password*</label>
                            <input type="password" class="form-control" name="previous_password" id="oldpasswordInput"
                                placeholder="Enter current password">
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-4">
                        <div>
                            <label for="newpasswordInput" class="form-label">New Password*</label>
                            <input type="password" class="form-control" name="password" id="newpasswordInput"
                                placeholder="Enter new password">
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-4">
                        <div>
                            <label for="confirmpasswordInput" class="form-label">Confirm Password*</label>
                            <input type="password" class="form-control" id="confirmpasswordInput"
                                placeholder="Confirm password" name="password_confirmation">
                        </div>
                    </div>
                    <!--end col-->

                    <div class="col-lg-12">
                        <div class="text-end">
                            <button type="submit" id="save_password" class="btn btn-success">Change Password</button>
                        </div>
                    </div>
                    <!--end col-->

                </form>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        init_validator();
        validator.defaults.alerts = false;

        $(function() {

            $("#change_password").submit(function(event) {

                event.preventDefault();

                if (validator.checkAll($(this))) {

                    const data = new FormData(this)
                    const url = $(this).attr('action')

                    window.ct.postDataMultiPartForm(url, data, $("#save_email")).then(function(responseData) {
                        toastr.success(responseData.msg);
                        location.replace(responseData.result)


                    }, function(error) {
                        toastr.error(error.msg);
                        window.ct.populateFormError("#change_password", error.result)
                    })
                }
                return false
            });



            $("#change_email").submit(function(event) {

                event.preventDefault();

                if (validator.checkAll($(this))) {

                    const data = new FormData(this)
                    const url = $(this).attr('action')

                    window.ct.postDataMultiPartForm(url, data, $("#save_password")).then(function(
                        responseData) {
                        toastr.success(responseData.msg);
                        location.replace(responseData.result)


                    }, function(error) {
                        toastr.error(error.msg);
                        window.ct.populateFormError("#change_email", error.result)
                    })
                }
                return false
            })



        })
    </script>
@endsection
