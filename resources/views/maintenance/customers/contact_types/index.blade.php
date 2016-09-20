@extends('layouts._tab')

@section('content')
{!! Form::bsIndex('maintenance.customers.contact_types.create', 'maintenance.customers.contact_types.index') !!}
{!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop