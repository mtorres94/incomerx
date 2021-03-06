@extends('layouts._tab')

@section('content')
{!! Form::bsIndex('maintenance.countries_destinations.schedule_dks.create', 'maintenance.countries_destinations.schedule_dks.index') !!}
{!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        preventOpen($('#dataTableBuilder'), '{{ route('schedule_dk.open') }}', '{{ \Auth::user()->id }}');
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop