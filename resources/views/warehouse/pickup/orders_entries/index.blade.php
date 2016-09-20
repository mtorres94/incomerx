@extends('layouts._tab')

@section('content')
    {!! Form::bsIndex('warehouse.pickup.orders_entries.create', 'warehouse.pickup.orders_entries.index') !!}
    {!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop

