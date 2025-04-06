@extends('backend.layouts.master')

@section('content')
    @include('backend.layouts.toastr')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add Course</h4>



                </div>
            </div>
        </div>
        <!-- end page title -->

        <form id="add_course" autocomplete="off" action="{{ route('save.add.course_master') }}" method="POST"
            enctype="multipart/form-data" class="eq-section" novalidate>
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3 item" style="margin: 10px">
                                <label class="form-label required-label" for="product-title-input">Enter Course Name</label>


                                <input type="text" class="form-control" name="name" value=""
                                    placeholder="Enter Course name" required>
                                <div class="invalid-feedback">Please Enter a Course name.</div>
                            </div>


                            <div style="margin: 10px">
                                <label for="country">Select country</label>
                                <select name="country" class="form-select" id="select_2_country">
                                    <option selected disabled>Select Country</option>

                                    @foreach (country() as $countries)
                                        <option value="{{ $countries->id }}">{{ $countries->name }}</option>
                                    @endforeach
                                </select>



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

        $('#select_2_country').select2();



        $(function() {

            $("#add_course").submit(function(event) {
                event.preventDefault();

                if (validator.checkAll($(this))) {

                    const data = new FormData(this)
                    const url = $(this).attr('action')

                    window.ct.postDataMultiPartForm(url, data, $("#save")).then(function(responseData) {
                        toastr.success(responseData.msg);

                    }, function(error) {
                        toastr.error(error.msg);
                        window.ct.populateFormError("#add_course", error.result)
                    })
                }
                return false
            })

        })
    </script>
@endsection
