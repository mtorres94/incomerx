@extends('layouts._tab')

@section('content')
    {!! Form::bsIndex('accounting_bridge.invoice_notes.invoices.create', 'accounting_bridge.invoice_notes.invoices.index') !!}
    {!! $dataTable->table() !!}
@endsection
@section('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        preventOpen($('#dataTableBuilder'), '{{ route('invoices.open') }}', '{{ \Auth::user()->id }}');
        ajaxDelete($('#dataTableBuilder'));
    </script>
@stop
