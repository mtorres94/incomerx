@extends('layouts._tab')

@section('title', 'Warehouse Facilities')
@section('table-title', 'List of warehouse facilities')

@section('content')
{!! Form::bsIndex('maintenance.warehouse.warehouse_facilities.create', 'maintenance.warehouse.warehouse_facilities.index') !!}
{!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        preventOpen($('#dataTableBuilder'), '{{ route('warehouse_facilities.open') }}', '{{ \Auth::user()->id }}');
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop