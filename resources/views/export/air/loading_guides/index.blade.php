@extends('layouts._tab')

@section('content')
    {!! Form::bsIndex('export.air.loading_guides.create', 'export.air.loading_guides.index') !!}
    {!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        preventOpen($('#dataTableBuilder'), '{{ route('ea_loading_guides.open') }}', '{{ \Auth::user()->id }}');
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop
