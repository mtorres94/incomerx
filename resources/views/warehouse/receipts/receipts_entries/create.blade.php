@extends('layouts._tab')

@section('content')
{!! Form::open(['id' => 'data', 'route' => 'warehouse.receipts.receipts_entries.store', 'method' => 'POST']) !!}
    @include('warehouse.receipts.receipts_entries.partials.fields')
    {!! Form::bsSubmit() !!}
    {!! Form::bsClose(isset($receipt_entry) ? $receipt_entry->id : 0) !!}
{!! Form::close() !!}
@endsection
