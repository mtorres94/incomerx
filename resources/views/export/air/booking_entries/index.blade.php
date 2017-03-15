@extends('layouts._tab')

@section('content')
    {!! Form::bsIndex('export.air.booking_entries.create', 'export.air.booking_entries.index') !!}
    {!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        preventOpen($('#dataTableBuilder'), '{{ route('ea_booking_entries.open') }}', '{{ \Auth::user()->id }}');
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop
