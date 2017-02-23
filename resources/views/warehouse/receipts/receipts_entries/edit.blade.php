@extends('layouts._tab')

@section('content')
{!! Form::model($receipt_entry, ['id' => 'data', 'route' => ['warehouse.receipts.receipts_entries.update', $receipt_entry], 'method' => 'PUT']) !!}
    {!! Form::bsGroup([
        ['class' => 'fa fa-file-pdf-o', 'value' => 'Warehouse Receipt w/charges', 'index' => 1],
        ['class' => 'fa fa-barcode', 'value' => 'Label', 'index' => 2]
    ], $receipt_entry, 'receipts_entries.get_pdf') !!}
    {!! Form::bsFooter(1, $receipt_entry) !!}
    @include('warehouse.receipts.receipts_entries.partials.fields')
    {!! Form::bsFooter(2, $receipt_entry) !!}
{!! Form::close() !!}
@endsection
