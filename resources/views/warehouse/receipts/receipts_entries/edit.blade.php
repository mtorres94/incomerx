@extends('layouts._tab')

@section('content')
{!! Form::model($receipt_entry, ['id' => 'data', 'route' => ['warehouse.receipts.receipts_entries.update', $receipt_entry], 'method' => 'PUT']) !!}
    @include('warehouse.receipts.receipts_entries.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
