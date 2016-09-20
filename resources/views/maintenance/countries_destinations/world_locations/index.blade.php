@extends('layouts._tab')

@section('content')
{!! Form::bsIndex('maintenance.countries_destinations.world_locations.create', 'maintenance.countries_destinations.world_locations.index') !!}
{!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop
