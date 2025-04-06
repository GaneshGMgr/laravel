@extends('backend.layouts.master')

@section('content')
    @include('backend.layouts.toastr')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add </h4>



                </div>
            </div>
        </div>
        <!-- end page title -->

        <form id="site_setting" autocomplete="off" action="{{ route('store.site_setting') }}" method="POST"
            enctype="multipart/form-data" class="eq-section" novalidate>
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3 item" style="margin: 10px">
                                <label class="form-label required-label" for="product-title-input">Enter Site Name</label>


                                <input type="text" class="form-control" name="site_name" placeholder="Enter Site name"
                                    required>
                                <div class="invalid-feedback">Please Enter Name.</div>
                            </div>

                            <div style="margin: 10px">
                                <label for="" class="form-label required-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email"
                                    required>

                            </div>
                            <div style="margin: 10px">
                                <label for="" class="form-label required-label">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Enter address"
                                    required>

                            </div>
                            <div style="margin: 10px">
                                <label for="" class="form-label required-label">Site logo</label>
                                <input type="file" class="form-control" name="site_logo" required>

                            </div>
                            <div style="margin: 10px">
                                <label for="" class="form-label required-label">Below slider</label>
                                <input type="file" class="form-control" name="below_slider" required>

                            </div>

                            <div class="text-end mb-3">
                                <button type="submit" id="save" class="btn btn-success w-sm">Submit</button>
                            </div>


                        </div>
                        <!-- end col -->


                        <!-- end col -->
                    </div>
                    <!-- end row -->

        </form>

    </div>
@endsection

@section('script')
    <script>
        $(function() {


            $("#site_setting").submit(function(event) {
                event.preventDefault();


                if (validator.checkAll($(this))) {

                    const data = new FormData(this)
                    const url = $(this).attr('action')

                    window.ct.postDataMultiPartForm(url, data, $("#save")).then(function(responseData) {
                        toastr.success(responseData.msg);

                    }, function(error) {
                        toastr.error(error.msg);
                        window.ct.populateFormError("#site_setting", error.result)
                    })
                }
                return false
            })

        })
    </script>
@endsection
