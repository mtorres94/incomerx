@extends('layouts._tab')

@section('title', 'Commodities')
@section('table-title', 'List of commodities')

@section('content')
{!! Form::bsIndex('maintenance.items.commodities.create', 'maintenance.items.commodities.index') !!}
{!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop