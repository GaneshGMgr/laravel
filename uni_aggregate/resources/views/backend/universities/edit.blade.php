@extends('backend.layouts.master')

@section('content')
    @include('backend.layouts.toastr')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit University</h4>



                </div>
            </div>
        </div>
        <!-- end page title -->

        <form id="edit_uni" autocomplete="off" action="{{ route('post.edit.uni',$edit_uni->slug) }}" method="POST"
            enctype="multipart/form-data" class="eq-section" novalidate>
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3 item" style="margin: 10px">
                                <label class="form-label required-label" for="product-title-input">university name</label>


                                <input type="text" class="form-control" name="name" value="{{ $edit_uni->name }}"
                                    placeholder="Enter university name" required>
                                <div class="invalid-feedback">Please Enter a university name.</div>
                            </div>

                            <div style="margin: 10px">
                                <label>University Description</label>
                                <textarea id="Description" name="description" class="form-control" required>
                                    {{ $edit_uni->description }}
                                </textarea>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div style="margin: 10px">
                                <label for="university-country">Select country</label>
                                <select name="country" class="form-select" id="select_2_country">
                                    <option selected disabled>Select Country</option>

                                    @foreach (country() as $countries)
                                        <option value="{{ $countries->id }}"
                                            {{ $edit_uni->country_id == $countries->id ? 'selected' : '' }}>
                                            {{ $countries->name }}
                                        </option>
                                    @endforeach

                                </select>

                            </div>
                            <div style="margin: 10px">
                                <label for="state">Select State</label>
                                <select name="state"  id="select_2_state">
                                    <option selected disabled>Select Country First</option>

                                </select>

                            </div>

                            <div style="margin: 10px">
                                <label class="form-label">University Email</label>
                                <input type="email" class="form-control" name="email"
                                    placeholder="Enter university email" value="{{ $edit_uni->email }}">

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
                                <input class="form-control" type="file" name="featured_image"
                                    value="{{ $edit_uni->featured_image }}">
                                <br>

                                <span>Selected Image</span> <img src="{{ asset($edit_uni->featured_image) }}"
                                    alt="">

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
        $('#select_2_state').select2()
    </script>
    <script>
        CKEDITOR.replace('Description');



        $(function() {
            var editor = CKEDITOR.instances.Description;
            $("#edit_uni").submit(function(event)


                {
                    event.preventDefault();
                    editor.updateElement();
                    if (validator.checkAll($(this))) {
                        const data = new FormData(this)
                        const url = $(this).attr('action')

                        event.preventDefault();

                        window.ct.postDataMultiPartForm(url, data, $("#save")).then(function(responseData) {
                            toastr.success(responseData.msg);
                            // location.href({{ route('dashboard') }})

                        }, function(error) {
                            toastr.error(error.msg);
                            window.ct.populateFormError("#edit_uni", error.result)
                        })
                    }
                    return false
                })

        })


        $(document).ready(function() {

            const state_id = '{{ $edit_uni->state_id }}';

            $('#select_2_country').change(function() {

                var countryId = $(this).val();

                $.ajax({
                    url: "{{ route('fetch.states') }}",
                    method: 'GET',
                    data: {
                        country_id: countryId
                    },
                    success: function(response) {
                        $('#select_2_state').empty();

                        $('#select_2_state').append(
                            '<option value="" selected disabled>Select State</option>');

                        if (response.response) {
                            var states = response.result;
                            $.each(states, function(key, state) {
                                const checked = state_id == state.id ? 'selected' : '';
                                $('#select_2_state').append(
                                    `<option value="${state.id}" ${checked}>${state.name}</option>`
                                );
                            });
                        } else {
                            toastr.error(response.msg);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log('AJAX Error:', error);
                    }
                });
            });

            $('#select_2_country').trigger('change')
            const option = new option()
        });
    </script>
@endsection
