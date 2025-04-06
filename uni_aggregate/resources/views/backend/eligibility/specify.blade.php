@extends('backend.layouts.master')

@section('content')
    @include('backend.layouts.toastr')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Specify Eligibility</h4>



                </div>
            </div>
        </div>
        <!-- end page title -->

        <form id="specify_eligibility" autocomplete="off" action="{{route('save.specify.eligibility')}}" method="POST" class="eq-section" novalidate>
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- <div class="mb-3 item" style="margin: 10px">
                                <label class="form-label required-label" for="product-title-input">university name</label>


                                <input type="text" class="form-control" name="name" value=""
                                    placeholder="Enter university name" required>
                                <div class="invalid-feedback">Please Enter a university name.</div>
                            </div> --}}


                            <div style="margin: 10px">
                                <label for="courses">Select course</label>
                                <select name="courses" class="form-select" id="select_2_course">
                                    <option selected disabled>Select course</option>

                                    @foreach (course_master() as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>



                            </div>






                            <div style="margin: 10px">
                                <label class="form-label">Board</label>


                                <select name="board" class="form-select" id="select_2_board">
                                    <option selected disabled>Select board</option>

                                    @foreach (board() as $board)
                                        <option value="{{ $board->id }}">{{ $board->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="margin: 10px">
                                <label class="form-label">Stream</label>


                                <select name="stream" class="form-select" id="select_2_stream">
                                    <option selected disabled>Select Stream</option>

                                    @foreach (streamName() as $stream)
                                        <option value="{{ $stream->id }}">{{ $stream->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div style="margin: 10px">
                                <label class="form-label">Board</label>


                                <select name="board" class="form-select" id="select_2_board">
                                    <option selected disabled>Select board</option>

                                    @foreach (board() as $board)
                                        <option value="{{ $board->id }}">{{ $board->name }}</option>
                                    @endforeach
                                </select>
                            </div>



                            <div class="mb-3 item" style="margin: 10px">
                                <label for="specify-age">Minimum Age</label>
                                <input type="text" class="form-control" name="age" placeholder="Enter minimum age"
                                    required>

                            </div>

                            {{-- <div style="margin:10px">

                                <label for="Level">Level</label>
                                <select name="level" id="select_level">
                                    <option value="" selected disabled></option>

                                    @foreach (levelName() as $level)

                                    <option value="{{$level->id}}">{{$level->name}}</option>

                                    @endforeach


                                </select>

                            </div> --}}





                            <div style="margin: 10px">
                                <label class="form-label">Minimum GPA</label>
                                <input type="text" class="form-control" name="gpa" placeholder="Enter GPA">
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

        $('#select_2_board').select2()
        $('#select_2_course').select2()
        $('#select_2_stream').select2()
    </script>

    {{-- <script>
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
                        $('#select_2_university').empty();
                        $('#select_2_university').append(
                            '<option value="" selected disabled>Select University</option>');
                        if (response.response === true) {
                            var universities = response.result;

                            $.each(universities, function(key, university) {
                                var option = $('<option>', {
                                    value: university.id,
                                    text: university.name
                                });

                                $('#select_2_university').append(option);
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
            $('#select_2_university').change(function() {
                var universityId = $(this).val();

                $.ajax({
                    url: "{{ route('fetch.courses') }}",
                    method: 'GET',
                    data: {
                        university_id: universityId
                    },
                    success: function(response) {
                        $('#select_2_course').empty();
                        $('#select_2_course').append(
                            '<option value="" selected disabled>Select Course</option>');
                        if (response.response === true) {
                            var courses = response.result;

                            if (courses.length > 0) {
                                $.each(courses, function(key, course) {
                                    var option = $('<option>', {
                                        value: course.id,
                                        text: course.name
                                    });
                                    $('#select_2_course').append(option);
                                });
                            } else {
                                $('#select_2_course').append(
                                    '<option value="" disabled>No courses found</option>');
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
    </script> --}}

<script>

    $(function() {


            $("#specify_eligibility").submit(function(event) {
                event.preventDefault();

                if (validator.checkAll($(this))) {

                    const data = new FormData(this)
                    const url = $(this).attr('action')

                    window.ct.postDataMultiPartForm(url, data, $("#save")).then(function(responseData) {
                        toastr.success(responseData.msg);

                    }, function(error) {
                        toastr.error(error.msg);
                        window.ct.populateFormError("#specify_eligibility", error.result)
                    })
                }
                return false
            })

        })
</script>

@endsection
