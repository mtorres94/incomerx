@extends('layouts._tab')

@section('content')
{!! Form::open(['id' => 'data', 'route' => 'warehouse.receipts.receipts_entries.store', 'method' => 'POST']) !!}
    @include('warehouse.receipts.receipts_entries.partials.fields')
    {!! Form::bsSubmit() !!}
{!! Form::close() !!}
@endsection
