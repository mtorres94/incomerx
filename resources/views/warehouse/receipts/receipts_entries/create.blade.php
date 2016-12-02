@extends('layouts._tab')

@section('content')
{!! Form::open(['id' => 'data', 'route' => 'warehouse.receipts.receipts_entries.store', 'method' => 'POST']) !!}
    @include('warehouse.receipts.receipts_entries.partials.fields')
    {!! Form::bsSubmit() !!}
    <a id="btn-close" type="button" class="ladda-button" data-size="xs" data-color="white" onclick="closeTab('#st_receipts_entry', 'Edit {{ $receipt_entry->code }}')"><span class="ladda-label">Close</span></a>
{!! Form::close() !!}
@endsection
