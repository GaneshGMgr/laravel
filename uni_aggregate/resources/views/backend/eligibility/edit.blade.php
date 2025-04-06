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

        <form id="specify_eligibility" autocomplete="off" action="{{route('save.specify.eligibility',$edit_eligibility->id)}}" method="POST" class="eq-section" novalidate>
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
                                <label for="country">Select country</label>
                                <select name="country" class="form-select" id="select_2_country">
                                    <option selected disabled>Select Country</option>

                                    @foreach (country() as $countries)
                                        <option value="{{ $countries->id }}"{{$edit_eligibility->country_id== $countries->id ?'selected':''}}>{{ $countries->name }}</option>
                                    @endforeach
                                </select>



                            </div>

                            <div style="margin: 10px">
                                <label for="university">Select university</label>
                                <select name="university" class="form-select" id="select_2_university">
                                    <option selected disabled>Select Country First</option>

                                </select>



                            </div>

                            <div style="margin: 10px">
                                <label for="course">Select course</label>
                                <select name="course" class="form-select" id="select_2_course">
                                    <option selected disabled>Select University First</option>
                                </select>
                            </div>



                            <div class="mb-3 item" style="margin: 10px">
                                <label for="specify-age">Minimum Age</label>
                                <input type="text" class="form-control" name="age" value="{{$edit_eligibility->min_age}}" placeholder="Enter minimum age"
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
                                <label class="form-label">Board</label>


                                <select name="board" class="form-select" id="select_2_board">
                                    <option selected disabled>Select board</option>

                                    @foreach (board() as $board)
                                        <option value="{{ $board->id }}" {{$edit_eligibility->board_id==$board->id ? 'selected':''}}>{{ $board->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div style="margin: 10px">
                                <label class="form-label">Minimum GPA</label>
                                <input type="text" class="form-control" name="gpa" value="{{$edit_eligibility->min_gpa}}" placeholder="Enter GPA">
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
        $('#select_2_country').select2()
        $('#select_2_university').select2()
        $('#select_2_board').select2()
        $('#select_2_course').select2()
    </script>

<script>
    $(document).ready(function() {
        const university_id = '{{$edit_eligibility->university_id}}';
        const course_id = '{{$edit_eligibility->course_id}}';

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
                    $('#select_2_university').append('<option value="" selected disabled>Select University</option>');
                    if (response.response) {
                        var universities = response.result;
                        $.each(universities, function(key, university) {
                            const checked = university_id == university.id ? 'selected' : '';
                            $('#select_2_university').append(`<option value="${university.id}" ${checked}>${university.name}</option>`);
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


        $('#select_2_university').change(function() {

            var universityId = '{{$edit_eligibility->university_id}}';

            $.ajax({
                url: "{{ route('fetch.courses') }}",
                method: 'GET',
                data: {
                    university_id: universityId
                },
                success: function(response) {
                    $('#select_2_course').empty();
                    $('#select_2_course').append('<option value="" selected disabled>Select Course</option>');
                    if (response.response) {
                        var courses = response.result;
                        $.each(courses, function(key, course) {
                            const checked = course_id == course.id ? 'selected' : '';
                            $('#select_2_course').append(`<option value="${course.id}" ${checked}>${course.name}</option>`);
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

        $('#select_2_university').trigger('change')
    });
</script>


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
