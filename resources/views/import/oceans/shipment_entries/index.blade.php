@extends('layouts._tab')

@section('content')
    {!! Form::bsIndex('import.oceans.shipment_entries.create', 'import.oceans.shipment_entries.index') !!}
    {!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        preventOpen($('#dataTableBuilder'), '{{ route('io_shipment_entries.open') }}', '{{ \Auth::user()->id }}');
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop
