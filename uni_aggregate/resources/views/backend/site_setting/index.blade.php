@extends('backend.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Site Setting</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <a type="button" class="btn btn-success add-btn" href="{{ route('add.site_setting') }}"><i
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
                                    <th>Site Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Site Logo</th>
                                    <th>Below Slider</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>

                        </table>

                    </div>
                </div>
            </div><!-- end card -->
        </div>
    </div>

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
                    url: "{{ route('site_setting.get') }}",
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
                        data: 'site_name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'address'
                    },
                    {
                        data: 'site_logo'
                    },
                    {
                        data: 'below_slider'
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

        function softDeleteItem(id) {
            console.log(id)
            if (confirm('Are you sure you want to delete this item?')) {
                $.ajax({
                    url: `{{ url('/site_setting/remove') }}?id=${id}`,
                    method: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.status) {
                            alert(response.msg);
                            location.reload();
                        } else {
                            alert(response.msg);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log('AJAX Error:', error);
                    }
                });
            }
        }
    </script>
@endsection
