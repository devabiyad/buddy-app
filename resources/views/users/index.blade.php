@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Users') }}</div>

                <div class="card-body">
                    <table id="users" class="table table-bordered table-condensed table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>User type</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                    </table>

                    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
                    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

                    <script>
                        $(document).ready(function() {
                            $.noConflict();
                            var table = $('#users').DataTable({
                                ajax: '',
                                serverSide: true,
                                processing: true,
                                aaSorting:[[0,"desc"]],
                                columns: [
                                    {data: 'id', name: 'id', searchable : false, visible: false},
                                    {data: 'name', name: 'name'},
                                    {data: 'user_type', name: 'user_type'},
                                    {data: 'email', name: 'email'},
                                ]
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
