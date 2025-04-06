@extends('backend.layouts.master')

@section('content')
    @include('backend.layouts.toastr')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add Faculty</h4>



                </div>
            </div>
        </div>
        <!-- end page title -->

        <form id="add_faculty" autocomplete="off" action="{{ route('save.edit.faculty',$edit_faculty->id) }}" method="POST"
            enctype="multipart/form-data" class="eq-section" novalidate>
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div style="margin: 10px">
                                <label for="university">Select university</label>
                                <select name="university" class="form-select" id="university-select">
                                    <option selected disabled>Select University</option>

                                    @foreach (university() as $university )
                                    <option value="{{$university->id}}" {{$edit_faculty->university_id==$university->id ? 'selected':''}}>{{$university->name}} </option>

                                    @endforeach
                                </select>



                            </div>

                            <div class="mb-3 item" style="margin: 10px">
                                <label class="form-label required-label" for="product-title-input">Enter Faculty Name</label>


                                <input type="text" class="form-control" name="name" value="{{$edit_faculty->name}}"
                                    placeholder="Enter Faculty name" required>
                                <div class="invalid-feedback">Please Enter a Faculty name.</div>


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
        $('#university-select').select2()
    </script>

    <script>



        $(function() {


            $("#add_faculty").submit(function(event) {
                event.preventDefault();


                if (validator.checkAll($(this))) {

                    const data = new FormData(this)
                    const url = $(this).attr('action')

                    window.ct.postDataMultiPartForm(url, data, $("#save")).then(function(responseData) {
                        toastr.success(responseData.msg);

                    }, function(error) {
                        toastr.error(error.msg);
                        window.ct.populateFormError("#add_faculty", error.result)
                    })
                }
                return false
            })

        })
    </script>
@endsection
