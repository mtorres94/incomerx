@extends('layouts._tab')

@section('content')
    {!! Form::bsIndex('import.air.bill_of_lading.create', 'import.air.bill_of_lading.index') !!}
    {!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        ajaxDelete($('#dataTableBuilder'));
        preventOpen($('#dataTableBuilder'), '{{ route('ia_bill_of_lading.open') }}', '{{ \Auth::user()->id }}');
    </script>
@stop
