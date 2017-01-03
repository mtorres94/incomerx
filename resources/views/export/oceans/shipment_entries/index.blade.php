@extends('layouts._tab')

@section('content')
    {!! Form::bsIndex('export.oceans.shipment_entries.create', 'export.oceans.shipment_entries.index') !!}
    {!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        preventOpen($('#dataTableBuilder'), '{{ route('eo_shipment_entries.open') }}', '{{ \Auth::user()->id }}');
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop

