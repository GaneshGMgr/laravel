@extends('backend.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Add University</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <a type="button" class="btn btn-success add-btn" href="{{ route('add.courses') }}"><i
                        class="ri-add-line align-bottom me-1"></i> Add</a>
                <div>
                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table table-bordered dt-responsive nowrap table-striped align-middle"
                            style="width:100%" id="datatable_courses">
                            <thead class="table-light">
                                <tr>

                                    {{-- <th scope="col" style="width: 50px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                        </div>
                                    </th> --}}
                                    <th>S.N</th>
                                    <th>Course Name</th>
                                    <th>Faculty</th>
                                    <th>Level</th>

                                    <th>Duration</th>
                                    <th>Credit Hours</th>
                                    <th>University</th>
                                    <th>Stream</th>
                                    <th>Cost Course</th>
                                    <th >Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            {{-- @if ($uni->count())
                                <tbody class="list form-check-all">
                                    @foreach ($uni as $university)
                                        <tr>
                                            <th scope="row">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="chk_child"
                                                        value="option1">
                                                </div>
                                            </th>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $university->name }}</td>
                                            <td>{{ $university->email }}</td>
                                            <td>{{ $university->country }}</td>
                                            <td>{{ $university->state }}</td>
                                            <td><img src="{{ $university->featured_image }}" alt=""
                                                    class="avatar-xs rounded-circle"></td>

                                            <td>
                                                <a class="btn btn-sm btn-success edit-item-btn"
                                                    href="{{ route('uni.edit', $university->slug) }}">Edit</a>

                                                <form action="{{ route('remove.uni', $university->slug)}}" method="post">
                                                    @csrf


                                                    <button type="submit"
                                                        class="btn btn-sm btn-danger remove-item-btn">Remove</button>
                                                </form>

                                            </td>
                                    @endforeach


                                    </tr>
                                </tbody>
                            @else
                                <tbody>
                                    <tr>
                                        <td colspan="5">no universities found</td>
                                    </tr>
                                </tbody>
                            @endif --}}
                        </table>
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                    colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any orders
                                    for
                                    you search.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end card -->
        </div>
    </div>
    {{-- <div id="searchResults">

    </div> --}}
@endsection
@section('script')
    <script>
        //    datatable
        const UniversityModule = {}

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            })
            Datatable()//parameters are automatically sent by DataTables as part of the AJAX request
        })


        function Datatable() {

            $('#datatable_courses').DataTable({
                dom: 'lfrtip',//(fullform of 'lfrtip')  l=length,f=filtering,r=processing,t=table,i=information,p=pagination,
                info: true,
                paging: true,
                destroy: true,//The destroy option, when set to true, will destroy any existing DataTable on the table before reinitializing it. This is useful when you want to reset the DataTable's state before initializing it again.
                processing: true,
                language: {
                    processing: '<span style="color:white;">Processing...</span>'
                },
                serverSide: true,//, indicates that the DataTable will use server-side processing mode. In server-side processing mode, the DataTable offloads the data retrieval and processing tasks to the server, and AJAX requests are sent to the server to fetch the data.
                ajax: {
                    url: "{{ route('courses.get') }}",
                    type: "POST",
                    data: function(postData) {// in actual this data(draw, start, length, order, search, etc) are sent to controller
                    // console.log("postData:", postData); // Log the postData to the console
                    // return postData; //This postData contain parameters like draw, start, length, order, search, etc., which DataTables uses to communicate the current state of the table to the server for server-side processing.
                    }
                },
                scrollY: "50vh",
                scrollX: true,
                lengthMenu: [ //display a dropdown menu showing options like 10, 25, 50, etc.
                    [10, 20, -1],
                    [10, 20, "All"]
                ],
                order: [ // show the data in datatable in descending order
                    [0, "DESC"]
                ],
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'course_master_id'
                    },
                    {
                        data: 'faculty_id'
                    },
                    {
                        data: 'level_id'
                    },
                    {
                        data: 'duration'
                    },
                    {
                        data: 'credit_hours'
                    },

                    {
                        data: 'university'
                    },
                    {
                        data: 'stream_id'
                    },
                    {
                        data: 'course_cost'
                    },

                    {
                        data: "action"
                    },
                ],
                columnDefs: [{
                    "orderable": false,
                    "targets": [7]
                }],
            })
        }


        // function removeItem(id) {
        //     console.log(id)
        //     if (confirm("Are you sure you want to delete this item?")) {

        //         $.ajax({
        //             url: `{{ url('/remove/courses') }}?id=${id}`,
        //             method: "POST",

        //             success: function(response) {


        //                 console.log(response);
        //                 toastr.success(response.msg);
        //                 Datatable()

        //                 // location.reload();
        //             },
        //             error: function(xhr, status, error) {

        //                 console.error('AJAX Error:', error);
        //             }
        //         });
        //     }
        // }

        function removeItem(id) {
            console.log(id);
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to delete this item.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `{{ url('/remove/courses') }}?id=${id}`,
                        method: 'POST',
                        success: function(response) {
                            console.log(response);
                            toastr.success(response.msg);
                            Datatable();
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', error);
                        }
                    });
                }
            });
        }
    </script>
@endsection
