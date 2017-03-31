@extends('layouts._tab')

@section('content')
    {!! Form::open(['id' => 'data', 'route' => 'invoices.invoice_reports_view', 'method' => 'POST', 'target' => '_blank']) !!}
    @include('accounting_bridge.invoice_notes.invoice_reports.partials.fields')
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary btn-lg" id="btn-print">
                <span><i class="fa fa-print fa-2x" aria-hidden="true"></i></span>
            </button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection