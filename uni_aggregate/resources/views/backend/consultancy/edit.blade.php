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

        <form id="add_consultancy" autocomplete="off" action="{{ route('save.edit.consultancy',$edit_consultancy->slug) }}" method="POST"
            enctype="multipart/form-data" class="eq-section" novalidate>
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3 item" style="margin: 10px">
                                <label class="form-label required-label" for="product-title-input">Enter Name</label>


                                <input type="text" class="form-control" name="name"
                                    value="{{ $edit_consultancy->name }}" placeholder="Enter name" required>
                                <div class="invalid-feedback">Please Enter a name.</div>
                            </div>

                            <div class="mb-3 item" style="margin: 10px">
                                <label class="form-label required-label" for="email-input">Enter Email</label>


                                <input type="email" class="form-control" name="email" placeholder="Enter Email"
                                    value="{{ $edit_consultancy->email }}" required>
                                <div class="invalid-feedback">Please Enter Email.</div>
                            </div>


                            <div style="margin: 10px">
                                <label for="university">Select university</label>
                                <select name="university[]" class="form-select select2-multiple" multiple="multiple" id="university-select">



                                    @foreach (university() as $university)
                                        <option value="{{ $university->id }}" {{ in_array($university->id, $university_id) ? 'selected' : '' }}>{{ $university->name }}</option>
                                    @endforeach
                                </select>


                            </div>
                            <div class="mb-4">
                                <h5 class="fs-14 mb-1">Consultancy Image</h5>
                                <p class="text-muted">Add Consultancy Image.</p>
                                <input class="form-control" type="file" name="featured_image">

                            </div>



                            <div style="margin: 10px">
                                <label>Course Description</label>
                                <textarea id="Description" name="description" class="form-control" required>
                                    {{ $edit_consultancy->description }}
                                </textarea>

                            </div>

                            <!-- end card -->
                            <div class="text-end mb-3">
                                <button type="submit" id="save" class="btn btn-success w-sm">Submit</button>
                            </div>
                        </div>

                    </div>
                    <!-- end row -->

        </form>

    </div>
@endsection

@section('script')
    <script>
        $('#university-select').select2()
        $('#select_2_country').select2()
        CKEDITOR.replace('Description');


        $(function() {
            var editor = CKEDITOR.instances.Description;

            $("#add_consultancy").submit(function(event) {
                event.preventDefault();
                editor.updateElement();

                if (validator.checkAll($(this))) {

                    const data = new FormData(this)
                    const url = $(this).attr('action')

                    window.ct.postDataMultiPartForm(url, data, $("#save")).then(function(responseData) {
                        toastr.success(responseData.msg);

                    }, function(error) {
                        toastr.error(error.msg);
                        window.ct.populateFormError("#add_consultancy", error.result)
                    })
                }
                return false
            })

        })

    </script>
@endsection
