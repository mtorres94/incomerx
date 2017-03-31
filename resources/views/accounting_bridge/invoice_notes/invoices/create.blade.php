@extends('layouts._tab')

@section('content')
    {!! Form::open(['id' => 'data', 'route' => 'accounting_bridge.invoice_notes.invoices.store', 'method' => 'POST', 'files'=>true]) !!}
    @include('accounting_bridge.invoice_notes.invoices.partials.fields')
    {!! Form::bsFooter(2, null) !!}
    {!! Form::close() !!}
@endsection
