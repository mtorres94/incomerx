@extends('layouts._tab')

@section('content')
{!! Form::model($receipt_entry, ['id' => 'data', 'route' => ['warehouse.receipts.receipts_entries.update', $receipt_entry], 'method' => 'PUT']) !!}
    {!! Form::bsGroup([
        ['class' => 'fa fa-file-pdf-o', 'value' => 'PDF', 'route' => 'receipts_entries.pdf'],
        ['class' => 'fa fa-barcode', 'value' => 'Label', 'route' => 'receipts_entries.label']
    ], $receipt_entry) !!}
    @include('warehouse.receipts.receipts_entries.partials.fields')
    {!! Form::bsSubmit() !!}
    <a id="btn-close" type="button" class="ladda-button btn-close" data-id="{{ $receipt_entry->id }}" data-size="xs" data-color="white"><span class="ladda-label">Close</span></a>
{!! Form::close() !!}
@endsection
