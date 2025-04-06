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

        <form id="edit_course" autocomplete="off" action="{{ route('save.edit.course',$edit_courses->id) }}" method="post" class="eq-section"
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
                                        <option value="{{ $course->id }}"{{$edit_courses->course_master_id == $course->id ?'selected' : ''}}>{{ $course->name }}</option>
                                    @endforeach
                                </select>
                                <span class = "errors text-danger"></span>



                            </div>



                            <div style="margin: 10px">
                                <label for="university-country">Select University Name</label>
                                <select name="university" class="form-select" id="university-select">
                                    <option selected disabled>Select University Name</option>
                                    @foreach (university() as $university)
                                        <option value="{{ $university->id }}"
                                            {{ $edit_courses->university_id == $university->id ? 'selected' : '' }}>
                                            {{ $university->name }}</option>
                                    @endforeach
                                </select>
                                <span class = "errors text-danger"></span>

                                <label for="faculty-select">Select Faculty</label>
                                <select name="faculty" class="form-select" id="faculty-select">
                                    <option selected disabled>Select Faculty</option>
                                    {{-- <option value="{{$faculty->id}}"></option> --}}
                                </select>
                                <span class = "errors text-danger"></span>

                            </div>
                            <div style="margin: 10px">
                                <label>Select Level</label>
                                <select name="level" class="form-select" id="select_2_level">
                                    <option value="" selected disabled>Select a level</option>
                                    @foreach (levelName() as $level)
                                        <option
                                            value="{{ $level->id }}"{{ $edit_courses->level_id == $level->id ? 'selected' : '' }}>
                                            {{ $level->name }}</option>
                                    @endforeach
                                </select>
                                <span class = "errors text-danger"></span>
                            </div>

                            <div style="margin: 10px">
                                <label class="form-label">Duration of Course</label>
                                <input type="text" class="form-control" name="duration"
                                    value="{{ $edit_courses->duration }}" placeholder="Enter duration">
                                    <span class = "errors text-danger"></span>
                            </div>
                            <div style="margin: 10px">
                                <label class="form-label">Credit Hours</label>
                                <input type="text" class="form-control" name="credit_hours"
                                    placeholder="Enter Credit Hours" value="{{ $edit_courses->credit_hours }}">
                                    <span class = "errors text-danger"></span>
                            </div>
                            <div style="margin:10px">
                                <label class="form-label">Course Cost</label>
                                <input type="text" class="form-control" name="course_cost"
                                    value="{{ $edit_courses->course_cost }}" placeholder="Enter course cost">
                                    <span class = "errors text-danger"></span>
                            </div>
                            <div style="margin:10px">
                                <label class="form-label">Intake</label>
                                <input type="date" class="form-control" name="intake"
                                    value="{{ $edit_courses->course_cost }}" placeholder="Enter intake">
                                    <span class = "errors text-danger"></span>
                            </div>
                            <div style="margin:10px">
                                <label class="form-label">Feature Image</label>
                                <input type="file" class="form-control" name="feature_image"
                                    value="{{ $edit_courses->course_cost }}" placeholder="Import Image">
                                    <span class = "errors text-danger"></span>
                            </div>
                            <div style="margin: 10px">
                                <label>course Description</label>
                                <textarea id="Description" name="description" class="form-control" required>
                                    {{ $edit_courses->description }}
                                </textarea>
                                <span class = "errors text-danger"></span>
                            </div>


                        </div>
                    </div>
                    <!-- end card -->


                    <!-- end card -->


                    <!-- end card -->
                    <div class="text-end mb-3">
                        <button type="submit" id="save" class="btn btn-success w-sm">Submit</button>
                        {{-- <a class="btn btn-primary" href="{{redirect()->back()}}">Back</a> --}}
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
        $('#university-select').select2()
        $('#faculty-select').select2()
    </script>

    <script>
        CKEDITOR.replace('Description');


        $(function() {
            var editor = CKEDITOR.instances.Description;

            $("#edit_course").submit(function(event) {
                event.preventDefault();
                editor.updateElement();

                if (validator.checkAll($(this))) {

                    const data = new FormData(this)
                    const url = $(this).attr('action')

                    window.ct.postDataMultiPartForm(url, data, $("#save")).then(function(responseData) {
                        toastr.success(responseData.msg);

                    }, function(error) {
                        toastr.error(error.msg);
                        window.ct.populateFormError("#edit_course", error.result)
                    })
                }
                return false
            })

        })
    </script>

    <script>
        $(document).ready(function() {
            const faculty_id = '{{ $edit_courses->faculty_id }}'


            $('#university-select').change(function() {

                var universityId = $(this).val();


                $.ajax({
                    url: '{{ route('fetch.faculties') }}',
                    method: 'GET',
                    data: {
                        university_id: universityId
                    },
                    success: function(response) {

                        $('#faculty-select').empty();


                        $('#faculty-select').append(
                            '<option value="" selected disabled>  Select a faculty </option>'
                            );
                        if (response.response) {
                            var faculties = response.result;

                            $.each(faculties, function(key, faculty) {
                                const checked = faculty_id == faculty.id ? 'selected' : '';
                                // $('#faculty-select').append('<option value="' + faculty
                                //     .id + '" $>' + faculty.name + '</option>');

                                $('#faculty-select').append(`
                                    <option = "${faculty.id}" ${checked} >${faculty.name}</option>
                                `)
                            });
                        } else {
                                toastr.error(error.msg);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log('AJAX Error:', error);
                    }
                });
            });
            $('#university-select').trigger('change')
            const option = new option()
        });
    </script>



@endsection
