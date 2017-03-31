@extends('layouts._tab')

@section('content')
    {!! Form::open(['id' => 'data', 'route' => 'accounting_bridge.invoice_notes.export_invoices.index', 'method' => 'GET']) !!}
    @include('accounting_bridge.invoice_notes.export_invoices.partials.fields')
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary btn-lg" id="btn-export">
                <span>Export Invoices</span>
            </button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection