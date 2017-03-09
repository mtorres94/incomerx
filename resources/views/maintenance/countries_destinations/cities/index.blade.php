@extends('layouts._tab')

@section('title', 'Cities')
@section('table-title', 'List of cities')

@section('content')
{!! Form::bsIndex('maintenance.countries_destinations.cities.create', 'maintenance.countries_destinations.cities.index') !!}
{!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        preventOpen($('#dataTableBuilder'), '{{ route('cities.open') }}', '{{ \Auth::user()->id }}');
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop