@extends('backend.layouts.master')

@section('content')
    @include('backend.layouts.toastr')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add Courses By University</h4>



                </div>
            </div>
        </div>
        <!-- end page title -->

        <form id="add_courses" autocomplete="off" action="{{ route('save.add.course') }}" method="post" class="eq-section"
            novalidate>
            @csrf
            <div class="row">
                <div class="col-lg-11">
                    <div class="card">
                        <div class="card-body">
                            <div style="margin: 10px">
                                <label for="courses">Select course</label>
                                <select name="courses" class="form-select" id="select_2_course">
                                    <option selected disabled>Select course</option>

                                    @foreach (course_master() as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                                <span class="errors text-danger"></span>



                            </div>


                            <div style="margin: 10px">
                                <label for="country">Select country</label>
                                <select name="country" class="form-select" id="select_2_country">
                                    <option selected disabled>Select Country</option>

                                    @foreach (country() as $countries)
                                        <option value="{{ $countries->id }}">{{ $countries->name }}</option>
                                    @endforeach
                                </select>
                                <span class="errors text-danger"></span>


                            </div>

                            <div style="margin: 10px">
                                <label for="university">Select university</label>
                                <select name="university" class="form-select" id="university-select">
                                    <option selected disabled>Select Country First</option>

                                </select>
                                <span class="errors text-danger"></span>



                            </div>
                            <div style="margin: 10px">

                                <label for="faculty-select">Select Faculty</label>
                                <select name="faculty" class="form-select" id="faculty-select">
                                    <option selected disabled>Select University first</option>
                                    {{-- <option value="{{$faculty->id}}"></option> --}}
                                </select>
                                <span class="errors text-danger"></span>
                            </div>

                            <div style="margin: 10px">
                                <label>Select Level</label>
                                <select name="level" class="form-select" id="select_2_level">
                                    <option value="" selected disabled>Select a level</option>
                                    @foreach (levelName() as $level)
                                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                                    @endforeach
                                </select>
                                <span class="errors text-danger"></span>
                            </div>
                            <div style="margin: 10px">
                                <label>Select Stream</label>
                                <select name="stream" class="form-select" id="select_2_stream">
                                    <option value="" selected disabled>Select a Stream</option>
                                    @foreach (streamName() as $stream)
                                        <option value="{{ $stream->id }}">{{ $stream->name }}</option>
                                    @endforeach
                                </select>
                                <span class="errors text-danger"></span>
                            </div>

                            <div style="margin: 10px">
                                <label class="form-label">Duration of Course</label>
                                <input type="text" class="form-control" name="duration" placeholder="Enter duration">
                                <span class = "errors text-danger"></span>
                            </div>
                            <div style="margin: 10px">
                                <label class="form-label">Credit Hours</label>
                                <input type="text" class="form-control" name="credit_hours"
                                    placeholder="Enter Credit Hours">
                                    <span class="errors text-danger"></span>
                            </div>
                            <div style="margin: 10px">
                                <label class="form-label">Course Cost</label>
                                <input type="text" class="form-control" name="course_cost"
                                    placeholder="Enter Course Cost">
                                    <span class="errors text-danger"></span>
                            </div>
                            <div style="margin:10px">
                                <label class="form-label">Intake</label>
                                <input type="date" class="form-control" name="intake"
                                    placeholder="Enter intake">
                                    <span class = "errors text-danger"></span>
                            </div>
                            <div style="margin:10px">
                                <label class="form-label">Feature Image</label>
                                <input type="file" class="form-control" name="feature_image"
                                    placeholder="Import Image">
                                    <span class = "errors text-danger"></span>
                            </div>
                            {{-- <div style="margin: 10px">
                                <label class="form-label">Course Cost</label>
                                <input type="text" class="form-control" name="course_cost"
                                    placeholder="Enter Credit Hours">
                            </div> --}}
                            {{-- <div style="margin: 10px">
                                <label class="form-label">Course Cost</label>

                                <select name="cost_cycle" id="">
                                    <option value="" selected disabled>Select</option>

                                    @foreach (coursesByUni() as $cost_cycle )

                                    <option value="">{{$cost_cycle->course_cost_cycle}}</option>
                                    @endforeach


                                </select>
                            </div> --}}




                            <div style="margin: 10px">
                                <label>Course Description</label>
                                <textarea id="Description" name="description" class="form-control" required></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- end card -->


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
        $('#select_2_level').select2()
        $('#faculty-select').select2()
        $('#university-select').select2()
        $('#select_2_stream').select2()
        $('#select_2_course').select2()
        $('#select_2_country').select2()
    </script>

    <script>
        CKEDITOR.replace('Description');


        $(function() {
            var editor = CKEDITOR.instances.Description;

            $("#add_courses").submit(function(event) {
                event.preventDefault();
                editor.updateElement();

                if (validator.checkAll($(this))) {

                    const data = new FormData(this)
                    const url = $(this).attr('action')

                    window.ct.postDataMultiPartForm(url, data, $("#save")).then(function(responseData) {
                        toastr.success(responseData.msg);

                    }, function(error) {
                        toastr.error(error.msg);
                        window.ct.populateFormError("#add_courses", error.result)
                    })
                }
                return false
            })

        })

        $(document).ready(function() {
            $('#select_2_country').change(function() {
                var countryId = $(this).val();

                $.ajax({
                    url: "{{ route('fetch.universities') }}",
                    method: 'GET',
                    data: {
                        country_id: countryId
                    },
                    success: function(response) {
                        $('#university-select').empty();
                        $('#university-select').append(
                            '<option value="" selected disabled>Select University</option>');
                        if (response.response === true) {
                            var universities = response.result;

                            $.each(universities, function(key, university) {
                                var option = $('<option>', {
                                    value: university.id,
                                    text: university.name
                                });

                                $('#university-select').append(option);
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
            $('#university-select').change(function() {
                var universityId = $(this).val();

                $.ajax({
                    url: "{{ route('fetch.faculties') }}",
                    method: 'GET',
                    data: {
                        university_id: universityId
                    },
                    success: function(response) {
                        $('#faculty-select').empty();
                        $('#faculty-select').append(
                            '<option value="" selected disabled>Select Faculties</option>');
                        if (response.response === true) {
                            var faculties = response.result;

                            if (faculties.length > 0) {
                                $.each(faculties, function(key, faculty) {
                                    var option = $('<option>', {
                                        value: faculty.id,
                                        text: faculty.name
                                    });
                                    $('#faculty-select').append(option);
                                });
                            } else {
                                $('#faculty-select').append(
                                    '<option value="" disabled>No Faculties found</option>');
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
