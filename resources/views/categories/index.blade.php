@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                    {{ __('Categories') }}
                    <a type="button" href="{{route('admin.category.create')}}" class="btn btn-sm btn-primary float-right add">Add Category</a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table id="categories" class="table table-bordered table-condensed table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Parent</th>
                                <th width="70">Action</th>
                            </tr>
                        </thead>

                    </table>

                    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
                    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script>
                        $(document).ready(function() {
                            $.noConflict();
                            var token = "{{ csrf_token() }}"
                            var table = $('#categories').DataTable({
                                    ajax: '',
                                    serverSide: true,
                                    processing: true,
                                    aaSorting:[[0,"desc"]],
                                    columns: [
                                        {data: 'id', name: 'id', searchable : false, visible: false},
                                        {data: 'title', name: 'title'},
                                        {data: 'parent', name: 'parent'},
                                        {data: 'action', name: 'action'}
                                    ]
                                });

                            $(document).on('click','.btn-delete',function(){
                                Swal.fire({
                                    title: 'Are you sure?',
                                    text: "This action will delete all the child categories belongs to this category!",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Yes, delete it!'
                                    }).then((result) => {
                                    if (result.isConfirmed) {
                                        var rowid = $(this).data('rowid')
                                        var el = $(this)
                                        if(!rowid) return;
                                        $.ajax({
                                            type: "POST",
                                            dataType: 'JSON',
                                            url: "/admin/category/" + rowid,
                                            data: {_method: 'delete',_token:token},
                                            success: function (data) {
                                                if (data.success) {
                                                    table.row(el.parents('tr'))
                                                        .remove()
                                                        .draw();
                                                }
                                            }
                                        });
                                        Swal.fire(
                                        'Deleted!',
                                        'Category Deleted Successfully.',
                                        'success'
                                        )
                                    }
                                });
                            })
                        })
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
