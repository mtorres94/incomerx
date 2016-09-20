@extends('layouts._tab')

@section('title', 'States')
@section('table-title', 'List of states')

@section('content')
{!! Form::bsIndex('maintenance.countries_destinations.states.create', 'maintenance.countries_destinations.states.index') !!}
{!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop