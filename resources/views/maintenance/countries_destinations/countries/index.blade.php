@extends('layouts._tab')

@section('title', 'Countries')
@section('table-title', 'List of countries')

@section('content')
{!! Form::bsIndex('maintenance.countries_destinations.countries.create', 'maintenance.countries_destinations.countries.index') !!}
{!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop