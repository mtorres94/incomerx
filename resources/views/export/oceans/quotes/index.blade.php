@extends('layouts._tab')

@section('content')
    {!! Form::bsIndex('export.oceans.quotes.create', 'export.oceans.quotes.index') !!}
    {!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop
