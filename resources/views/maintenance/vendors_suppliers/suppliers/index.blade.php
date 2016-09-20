@extends('layouts._tab')

@section('content')
{!! Form::bsIndex('maintenance.vendors_suppliers.suppliers.create', 'maintenance.vendors_suppliers.suppliers.index') !!}
{!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop