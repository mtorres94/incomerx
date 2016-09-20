@extends('layouts._tab')

@section('title', 'Items')
@section('table-title', 'List of items')

@section('content')
{!! Form::bsIndex('maintenance.items.items.create', 'maintenance.items.items.index') !!}
{!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop