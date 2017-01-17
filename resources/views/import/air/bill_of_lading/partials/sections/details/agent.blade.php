<div class="row">
    <div class="col-md-12">
        {!! Form::bsComplete('col-md-3', 'col-md-9','Broker ', 'broker_code', 'broker_name', Request::get('term'),
    ((isset($bill_of_lading) and $bill_of_lading->broker_id > 0) ? $bill_of_lading->broker->name : null), 'Vendor', null) !!}</div>
    </div>
<div class="row">
    <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Phone', 'broker_phone', null, ' ') !!}</div>
    <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Reference', 'broker_reference', null, ' ') !!}</div>
</div>

<div class="row">
    <div class="col-md-12">
        {!! Form::bsComplete('col-md-3', 'col-md-9','Destination Broker ', 'destination_broker_code', 'destination_broker_name', Request::get('term'),((isset($bill_of_lading) and $bill_of_lading->destination_broker_id > 0) ? $bill_of_lading->destination_broker->name : null),'Vendor', null) !!}
    </div>
</div>

<div class="row">
    <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Phone', 'destination_broker_phone', null, ' ') !!}</div>
    <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Reference', 'destination_broker_reference', null, ' ') !!}</div>
</div>
<div class="row">
    <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9','Agent ', 'agent_id', 'agent_name', Request::get('term'),((isset($bill_of_lading) and $bill_of_lading->agent_id > 0) ? $bill_of_lading->agent->name : null),'Vendor', null) !!}</div>
</div>
<div class="row">
    <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9','Third Party ', 'third_id', 'third_name', Request::get('term'),((isset($bill_of_lading) and $bill_of_lading->third_id > 0) ? $bill_of_lading->third->name : null),'Customer', null) !!}</div>
</div>