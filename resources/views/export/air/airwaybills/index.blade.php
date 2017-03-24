@extends('layouts._tab')

@section('content')
    {!! Form::bsIndex('export.air.airwaybills.create', 'export.air.airwaybills.index') !!}
    {!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        preventOpen($('#dataTableBuilder'), '{{ route('ea_airwaybills.open') }}', '{{ \Auth::user()->id }}');
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop
