@extends('layouts._tab')

@section('content')
<table id="users" class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead>
</table>
@endsection
@section('scripts')
    <script>
        $(function () {
            $('#users').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('users.datatable') }}",
                "columns": [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'email'},
                ]
            });
        });
    </script>
@stop
