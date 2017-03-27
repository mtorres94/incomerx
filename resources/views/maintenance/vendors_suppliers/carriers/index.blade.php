@extends('layouts._tab')

@section('content')
    {!! Form::bsIndex('maintenance.vendors_suppliers.carriers.create', 'maintenance.vendors_suppliers.carriers.index') !!}
    {!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        preventOpen($('#dataTableBuilder'), '{{ route('carriers.open') }}', '{{ \Auth::user()->id }}');
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop
