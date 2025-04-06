@extends('backend.layouts.master')

@section('content')
    @include('backend.layouts.toastr')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add Info</h4>



                </div>
            </div>
        </div>
        <!-- end page title -->

        <form id="add_info" autocomplete="off" action="{{ route('store.info') }}" method="POST"
            enctype="multipart/form-data" class="eq-section" novalidate>
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3 item" style="margin: 10px">
                                <label class="form-label required-label" for="product-title-input">Enter Title</label>


                                <input type="text" class="form-control" name="name" placeholder="Enter level name" required>
                                <div class="invalid-feedback">Please Enter a Title.</div>
                            </div>

                            <div style="margin: 10px">
                                <label for="" class="form-label required-label">Creator Name</label>
                                <input type="text" class="form-control" name="creator_name" placeholder="Enter creator's name" required>

                            </div>
                            <div style="margin: 10px">
                                <label for="" class="form-label required-label">Url</label>
                                <input type="url" class="form-control" name="url" placeholder="Enter Url" required>

                            </div>
                            <div style="margin: 10px">
                                <label for="" class="form-label required-label">featured image</label>
                                <input type="file" class="form-control" name="featured_image" placeholder="Enter Url" required>

                            </div>


                    <!-- end card -->
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


            $("#add_info").submit(function(event) {
                event.preventDefault();


                if (validator.checkAll($(this))) {

                    const data = new FormData(this)
                    const url = $(this).attr('action')

                    window.ct.postDataMultiPartForm(url, data, $("#save")).then(function(responseData) {
                        toastr.success(responseData.msg);

                    }, function(error) {
                        toastr.error(error.msg);
                        window.ct.populateFormError("#add_info", error.result)
                    })
                }
                return false
            })

        })
    </script>
@endsection
