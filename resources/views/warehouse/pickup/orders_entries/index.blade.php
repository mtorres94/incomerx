@extends('layouts._tab')

@section('content')
    {!! Form::bsIndex('warehouse.pickup.orders_entries.create', 'warehouse.pickup.orders_entries.index') !!}
    {!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        preventOpen($('#dataTableBuilder'), '{{ route('orders_entries.open') }}', '{{ \Auth::user()->id }}');
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop

