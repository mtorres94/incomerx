<div class="row">
    <div class="col-md-12">
        <legend>Invoice Reports</legend>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="row">{!! Form::bsComplete('col-md-3', 'col-md-8', 'Bill To ', 'bill_to_id', 'bill_to_name', Request::get('term'), null, null) !!}</div>
        <div class="row">{!! Form::bsComplete('col-md-3', 'col-md-8', 'Shipper', 'shipper_id', 'shipper_name', Request::get('term'),  null, null) !!}</div>
        <div class="row">{!! Form::bsComplete('col-md-3', 'col-md-8', 'Consignee', 'consignee_id', 'consignee_name', Request::get('term'), null , null) !!}</div>
        <div class="row">{!! Form::bsComplete('col-md-3', 'col-md-8', 'Agent', 'agent_id', 'agent_name', Request::get('term'), null,  null) !!}</div>
        <div class="row">{!! Form::bsComplete('col-md-3', 'col-md-8', 'Carrier', 'carrier_id', 'carrier_name', Request::get('term'), null, null) !!}</div>

    </div>
    <div class="col-md-6">
        <div class="row">
            {!! Form::bsText('col-md-3','col-md-3', 'Date From', 'date_from', null, null) !!}
            {!! Form::bsText('col-md-2','col-md-4', 'To', 'date_to', null, null) !!}
        </div>
        <div class="row">
            {!! Form::bsText('col-md-3','col-md-3', 'Posted From', 'posted_from', null, null) !!}
            {!! Form::bsText('col-md-2','col-md-4', 'To', 'posted_to', null, null) !!}
        </div>
        <div class="row">
            {!! Form::bsComplete('col-md-3','col-md-3', 'File Number', 'shipment_id', 'shipment_code', Request::get('term'), null,  null) !!}
            {!! Form::bsComplete('col-md-2','col-md-4', 'User', 'user_id', 'user_name', Request::get('term'), null, null) !!}
        </div>
        <div class="row">
            {!! Form::bsSelect('col-md-3','col-md-3', "Type", 'type', array('I' => 'INVOICE','C' => 'CREDIT NOTE', 'D' => 'DEBIT NOTE'), null) !!}
            {!! Form::bsSelect('col-md-2','col-md-3', "Status", 'status', array('O' => 'OPEN','C' => 'CLOSED', 'P' => 'POSTED', 'V' => 'VOID', 'D'=> 'PAID'), null) !!}
        </div>
        <div class="row">
            {!! Form::bsText('col-md-3','col-md-3', 'GL - Period', 'period', null, '00/0000') !!}
        </div>
    </div>
</div>
<!-- Scripts sections -->
@section('scripts')
    @include('accounting_bridge.invoice_notes.invoice_reports.partials.scripts.autocomplete')
@stop
