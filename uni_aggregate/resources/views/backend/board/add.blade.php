@extends('backend.layouts.master')

@section('content')
    @include('backend.layouts.toastr')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add Board</h4>



                </div>
            </div>
        </div>
        <!-- end page title -->

        <form id="add_board" autocomplete="off" action="{{ route('save.add.board') }}" method="POST"
            enctype="multipart/form-data" class="eq-section" novalidate>
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3 item" style="margin: 10px">
                                <label class="form-label required-label" for="product-title-input">Enter Board Name</label>


                                <input type="text" class="form-control" name="name" value=""
                                    placeholder="Enter Board name" required>
                                <div class="invalid-feedback">Please Enter a Board name.</div>
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

            $("#add_board").submit(function(event) {
                event.preventDefault();

                if (validator.checkAll($(this))) {

                    const data = new FormData(this)
                    const url = $(this).attr('action')

                    window.ct.postDataMultiPartForm(url, data, $("#save")).then(function(responseData) {
                        toastr.success(responseData.msg);

                    }, function(error) {
                        toastr.error(error.msg);
                        window.ct.populateFormError("#add_board", error.result)
                    })
                }
                return false
            })

        })
    </script>
@endsection
