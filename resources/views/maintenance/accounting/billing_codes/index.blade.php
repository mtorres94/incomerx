@extends('layouts._tab')

@section('content')
    {!! Form::bsIndex('maintenance.accounting.billing_codes.create', 'maintenance.accounting.billing_codes.index') !!}
    {!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        preventOpen($('#dataTableBuilder'), '{{ route('billing_codes.open') }}', '{{ \Auth::user()->id }}');
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop
