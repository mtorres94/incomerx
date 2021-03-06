@extends('layouts._tab')

@section('content')
{!! Form::open(['id' => 'data', 'route' => 'receipts_entries.cargo_report_view', 'method' => 'POST', 'target' => '_blank']) !!}
    @include('warehouse.receipts.reports.cargo.partials.fields')
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary btn-lg" id="btn-print">
                <span><i class="fa fa-print fa-2x" aria-hidden="true"></i></span>
            </button>
        </div>
    </div>
{!! Form::close() !!}
@endsection