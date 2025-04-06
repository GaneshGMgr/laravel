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

        <form id="about_us" autocomplete="off" action="{{ route('update.aboutUs') }}" method="POST"
            enctype="multipart/form-data" class="eq-section" novalidate>
            @csrf
            <input type="hidden" name="slug" value="{{ $edit_about_us->slug }}">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3 item" style="margin: 10px">
                                <label class="form-label required-label" for="product-title-input">Enter Title</label>


                                <input type="text" class="form-control" name="title" value="{{$edit_about_us->title}}"
                                    placeholder="Enter Board name" required>
                                <div class="invalid-feedback">Please Enter a Title.</div>
                            </div>

                            <div style="margin: 10px">
                                <label>Description</label>
                                <textarea id="Description" name="description" class="form-control" required>
                                    {!!$edit_about_us->description!!}
                                </textarea>
                            </div>


                            <div style="margin: 10px">
                                <label>Featured_image</label>
                                <input type="file" class="form-control" name="featured_image">
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
       CKEDITOR.replace('Description');

        $(function() {

            // var editor = CKEDITOR.instances.Description;

            $("#about_us").submit(function(event) {
                event.preventDefault();
                // editor.updateElement();

                if (validator.checkAll($(this))) {

                    const data = new FormData(this)
                    const url = $(this).attr('action')
                    // debugger
                    window.ct.postDataMultiPartForm(url, data, $("#save")).then(function(responseData) {
                        toastr.success(responseData.msg);

                    }, function(error) {
                        toastr.error(error.msg);
                        window.ct.populateFormError("#about_us", error.result)
                    })
                }
                return false
            })

        })
    </script>
@endsection
