@extends('layouts._tab')

@section('title', 'Show world location')
@section('table-title', 'Show world location')

@section('content')
{!! Form::model($receipt_entry, ['route' => 'warehouse.receipts.receipts_entries.index', 'method' => 'GET']) !!}
    @include('warehouse.receipts.receipts_entries.partials.fields', $receipt_entry)
{!! Form::close() !!}
@endsection
