@extends('layouts._tab')

@section('content')
    {!! Form::bsIndex('maintenance.vendors.carriers.create', 'maintenance.vendors.carriers.index') !!}
    {!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        preventOpen($('#dataTableBuilder'), '{{ route('carriers.open') }}', '{{ \Auth::user()->id }}');
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop
