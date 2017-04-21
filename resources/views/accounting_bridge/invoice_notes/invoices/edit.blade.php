@extends('layouts._tab')

@section('content')

    {!! Form::model($invoice, ['id' => 'data', 'route' => ['accounting_bridge.invoice_notes.invoices.update', $invoice], 'method' => 'PUT']) !!}
        {!! Form::bsGroup([
            ['class' => 'fa fa-file-pdf-o', 'value' => 'Cost Worksheet'],
            ['class' => 'fa fa-file-pdf-o', 'value' => 'Invoice'],
         ], $invoice, 'invoices.report') !!}
        {!! Form::bsFooter(1, $invoice) !!}
        @include('accounting_bridge.invoice_notes.invoices.partials.fields')
        {!! Form::bsFooter(2, $invoice) !!}
    {!! Form::close() !!}
@endsection
