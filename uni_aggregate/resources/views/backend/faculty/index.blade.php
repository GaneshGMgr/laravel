@extends('backend.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Faculty</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <a type="button" class="btn btn-success add-btn" href="{{ route('add.faculty') }}"><i
                        class="ri-add-line align-bottom me-1"></i> Add</a>
                <div>
                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table table-bordered dt-responsive nowrap table-striped align-middle"
                            style="width:100%" id="datatable">
                            <thead class="table-light">
                                <tr>
                                    {{-- <th scope="col" style="width: 50px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                        </div>
                                    </th> --}}
                                    <th>S.N</th>
                                    <th>Name</th>
                                    <th>University</th>
                                    <th>Action</th>
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
            Datatable()
        })


        function Datatable() {

            $('#datatable').DataTable({
                dom: 'lfrtip',
                destroy: true,
                processing: true,
                language: {
                    processing: '<span style="color:white;">Processing...</span>'
                },
                serverSide: true,
                ajax: {
                    url: "{{ route('faculty.get') }}",
                    type: "POST",
                    data: function(postData) {

                    }
                },
                scrollY: "50vh",
                scrollX: true,
                lengthMenu: [
                    [10, 20, -1],
                    [10, 20, "All"]
                ],
                order: [
                    [0, "DESC"]
                ],
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'university_id'
                    },


                    {
                        data: "action"
                    },
                ],
                columnDefs: [{
                    "orderable": false,
                    "targets": [3]
                }],
            })
        }

        function deleteItem(id) {
            console.log(id);

            // Use SweetAlert for the confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                // text: 'You will not be able to recover this item!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `{{ url('/eligibility/remove') }}?id=${id}`,
                        method: 'POST',
                        success: function(response) {
                            console.log(response);
                            toastr.success(response.msg);
                            Datatable();

                            // location.reload();
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
