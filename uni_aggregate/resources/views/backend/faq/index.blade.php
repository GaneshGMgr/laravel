@extends('backend.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-0">Add University</h4>
        </div><!-- end card header -->

        <div class="card-body">
            <a type="button" class="btn btn-success add-btn" href="{{route('add.faq')}}"><i
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
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Action</th>
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
                    url: "{{ route('faq.get') }}",
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
                        data: 'question'
                    },
                    {
                        data: 'answer'
                    },
                     {
                        data: 'action'
                    },

                ],
                columnDefs: [{
                    "orderable": false,
                    "targets": [3]
                }],
            })
        }



        function softDeleteItem(id) {
            // console.log(id)

            if (confirm('Are you sure you want to delete this item?')) {
                $.ajax({
                    // url: `{{ url('/faq/remove') }}?id=${encodeURIComponent(btoa(Id))}`,
                    url: `{{ url('/faq/remove') }}?id=${id}`,
                    method: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.status) {
                            // alert(response.msg);
                            toastr.success(response.msg);
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
