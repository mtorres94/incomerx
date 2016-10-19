@extends('layouts._tab')

@section('content')
    {!! Form::bsIndex('export.oceans.bill_of_lading.create', 'export.oceans.bill_of_lading.index') !!}
    {!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop
