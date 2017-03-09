@extends('layouts._tab')

@section('title', 'Subdepartments')
@section('table-title', 'List of subdepartments')

@section('content')
{!! Form::bsIndex('maintenance.divisions_departments.subdepartments.create', 'maintenance.divisions_departments.subdepartments.index') !!}
{!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        preventOpen($('#dataTableBuilder'), '{{ route('subdepartments.open') }}', '{{ \Auth::user()->id }}');
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop