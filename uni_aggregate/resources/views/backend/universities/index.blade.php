@extends('backend.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Add University</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <a type="button" class="btn btn-success add-btn" href="{{route('add.uni')}}"><i class="ri-add-line align-bottom me-1"></i> Add</a>
                <div>
                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%" id="datatable">
                            <thead class="table-light">
                                <tr>

                                    <th >S.N</th>
                                    <th >Name</th>
                                    <th >Email</th>
                                    <th >Country</th>
                                    <th >State</th>
                                    <th>featured_image</th>
                                    <th >Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>

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
                    url: "{{ route('universities.get') }}",
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
                        data: 'email'
                    },
                    {
                        data: 'country_id'
                    },
                    {
                        data: 'state_id'
                    },
                    {
                        data: 'featured_image'
                    },

                    {
                        data: "action"
                    },
                ],
                columnDefs: [{
                    "orderable": false,
                    "targets": [6]
                }],
            })
        }

        function deleteItem(slug) {
            console.log(slug)
            if (confirm("Are you sure you want to delete this item?")) {

                $.ajax({
                    url: `{{ url('/university/remove') }}?slug=${slug}`,
                    method: "POST",

                    success: function(response) {


                        console.log(response);
                        toastr.success(response.msg);
                        Datatable()

                        // location.reload();
                    },
                    error: function(xhr, status, error) {

                        console.error('AJAX Error:', error);
                    }
                });
            }
        }
    </script>
@endsection
