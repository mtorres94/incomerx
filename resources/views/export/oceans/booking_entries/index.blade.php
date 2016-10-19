@extends('layouts._tab')

@section('content')
    {!! Form::bsIndex('export.oceans.booking_entries.create', 'export.oceans.booking_entries.index') !!}
    {!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop
