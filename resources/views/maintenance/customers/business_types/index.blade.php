@extends('layouts._tab')

@section('title', 'Business types')
@section('table-title', 'List of business types')

@section('content')
{!! Form::bsIndex('maintenance.customers.business_types.create', 'maintenance.customers.business_types.index') !!}
{!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop