@extends('backend.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-0">Test</h4>
        </div><!-- end card header -->

        <div class="card-body">
            <a type="button" class="btn btn-success add-btn" href="{{ route('add.test') }}"><i
                    class="ri-add-line align-bottom me-1"></i> Add</a>
            <div>
                <div class="table-responsive table-card mt-3 mb-1">
                    <table class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%" id="datatable">
                        <thead class="table-light">
                            <tr>
                                <th>S.N</th>
                                <th>Name</th>
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
                    url: "{{ route('test.get') }}",
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
                        data: "action"
                    },
                ],
                columnDefs: [{
                    "orderable": false,
                    "targets": [2]
                }],
            })
        }

        function softDeleteItem(slug) {
            console.log(slug)
            if (confirm('Are you sure you want to delete this item?')) {
                $.ajax({
                    url: `{{ url('/test/remove') }}?slug=${slug}`,
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
