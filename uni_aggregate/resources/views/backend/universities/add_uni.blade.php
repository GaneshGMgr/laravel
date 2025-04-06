@extends('backend.layouts.master')

@section('content')
    @include('backend.layouts.toastr')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add university</h4>



                </div>
            </div>
        </div>
        <!-- end page title -->

        <form id="add_uni" autocomplete="off" action="{{ route('post.add.uni') }}" method="POST"
            enctype="multipart/form-data" class="eq-section" novalidate>
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3 item" style="margin: 10px">
                                <label class="form-label required-label" for="product-title-input">university name</label>


                                <input type="text" class="form-control" name="name" value=""
                                    placeholder="Enter university name" required>
                                <div class="invalid-feedback">Please Enter a university name.</div>
                            </div>



                            <div style="margin: 10px">
                                <label for="university-country">Select country</label>
                                <select name="country" class="form-select" id="select_2_country">
                                    <option selected disabled>Select Country</option>

                                    @foreach (country() as $countries)
                                        <option value="{{ $countries->id }}">{{ $countries->name }}</option>
                                    @endforeach
                                </select>



                            </div>
                            <div style="margin: 10px">
                                <label for="state">Select State</label>
                                <select name="state" class="form-select" id="state-select">
                                    <option selected disabled>Select Country First</option>

                                </select>



                            </div>




                            <div style="margin: 10px">
                                <label class="form-label">University Email</label>
                                <input type="email" class="form-control" name="email"
                                    placeholder="Enter university email">

                            </div>
                            <div style="margin: 10px">
                                <label>University Description</label>
                                <textarea id="Description" name="description" class="form-control" required></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">university Gallery</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <h5 class="fs-14 mb-1">university Image</h5>
                                <p class="text-muted">Add university main Image.</p>
                                <input class="form-control" type="file" name="featured_image">

                            </div>

                        </div>
                    </div>
                    <!-- end card -->


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
        $('#select_2_country').select2()
        $('#state-select').select2()
    </script>

    <script>
        CKEDITOR.replace('Description');


        $(function() {
            var editor = CKEDITOR.instances.Description;

            $("#add_uni").submit(function(event) {
                event.preventDefault();
                editor.updateElement();

                if (validator.checkAll($(this))) {

                    const data = new FormData(this)
                    const url = $(this).attr('action')

                    window.ct.postDataMultiPartForm(url, data, $("#save")).then(function(responseData) {
                        toastr.success(responseData.msg);

                    }, function(error) {
                        toastr.error(error.msg);
                        window.ct.populateFormError("#add_uni", error.result)
                    })
                }
                return false
            })

        })
    </script>

    <script>

$(document).ready(function() {
        $('#select_2_country').change(function() {
            var countryId = $(this).val();

            $.ajax({
                url: "{{ route('fetch.states') }}",
                method: 'GET',
                data: {
                    country_id: countryId
                },
                success: function(response) {
                    $('#state-select').empty();
                    $('#state-select').append('<option value="" selected disabled>Select State</option>');
                    if (response.response === true) {
                        var states = response.result;

                        if (states.length > 0) {
                            $.each(states, function(key, state) {
                                var option = $('<option>', {
                                    value: state.id,
                                    text: state.name
                                });
                                $('#state-select').append(option);
                            });
                        } else {
                            $('#state-select').append('<option value="" disabled>No states found</option>');
                        }
                    } else {
                        toastr.error(response.msg);
                    }
                },
                error: function(xhr, status, error) {
                    console.log('AJAX Error:', error);
                }
            });
        });
    });
    </script>
@endsection
