@extends('layouts._tab')

@section('content')
    {!! Form::bsIndex('import.air.routing_order.create', 'import.air.routing_order.index') !!}
    {!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        preventOpen($('#dataTableBuilder'), '{{ route('ia_routing_order.open') }}', '{{ \Auth::user()->id }}');
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop
