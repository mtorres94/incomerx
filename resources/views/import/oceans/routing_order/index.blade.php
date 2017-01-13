@extends('layouts._tab')

@section('content')
    {!! Form::bsIndex('import.oceans.routing_order.create', 'import.oceans.routing_order.index') !!}
    {!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        preventOpen($('#dataTableBuilder'), '{{ route('io_routing_order.open') }}', '{{ \Auth::user()->id }}');
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop
