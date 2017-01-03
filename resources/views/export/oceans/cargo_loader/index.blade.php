@extends('layouts._tab')

@section('content')
    {!! Form::bsIndex('export.oceans.cargo_loader.create', 'export.oceans.cargo_loader.index') !!}
    {!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        preventOpen($('#dataTableBuilder'), '{{ route('cargo_loader.open') }}', '{{ \Auth::user()->id }}');
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop
