@extends('layouts._tab')

@section('title', 'Currencies')
@section('table-title', 'List of currencies')

@section('content')
{!! Form::bsIndex('maintenance.countries_destinations.currencies.create', 'maintenance.countries_destinations.currencies.index') !!}
{!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        preventOpen($('#dataTableBuilder'), '{{ route('currencies.open') }}', '{{ \Auth::user()->id }}');
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop