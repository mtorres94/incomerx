@extends('layouts._tab')

@section('title', 'Incoterms')
@section('table-title', 'List of incoterms')

@section('content')
{!! Form::bsIndex('maintenance.customers.incoterms.create', 'maintenance.customers.incoterms.index') !!}
{!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop