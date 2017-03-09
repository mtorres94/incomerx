@extends('layouts._tab')

@section('title', 'Airports')
@section('table-title', 'List of airports')

@section('content')
{!! Form::bsIndex('maintenance.countries_destinations.airports.create', 'maintenance.countries_destinations.airports.index') !!}
{!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        preventOpen($('#dataTableBuilder'), '{{ route('airports.open') }}', '{{ \Auth::user()->id }}');
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop