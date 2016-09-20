@extends('layouts._tab')

@section('title', 'Departments')
@section('table-title', 'List of departments')

@section('content')
{!! Form::bsIndex('maintenance.divisions_departments.departments.create', 'maintenance.divisions_departments.departments.index') !!}
{!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop