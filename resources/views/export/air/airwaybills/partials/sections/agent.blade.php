<div class="row">
    <div class="col-md-12">
        {!! Form::bsComplete('col-md-3', 'col-md-9','Agent', 'agent_id', 'agent_name', Request::get('term'),((isset($airway_bill) and $airway_bill->agent_id > 0) ? $airway_bill->agent->name : null), 'Agent') !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsText('col-md-3', 'col-md-3', 'Phone', 'agent_phone', null, '') !!}
        {!! Form::bsText('col-md-3', 'col-md-3', 'Comm.(%)', 'commission', null, '') !!}

    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsComplete('col-md-3', 'col-md-9','Co-Loader ', 'coloader_id', 'coloader_name', Request::get('term'),((isset($airway_bill) and $airway_bill->coloader_id > 0) ? $airway_bill->coloader->name : null), '') !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsText('col-md-3', 'col-md-3', 'Agent\'s IATA', 'agent_iata_code', null, '') !!}
        {!! Form::bsText('col-md-3', 'col-md-3', 'Account No.', 'account_number', null, '') !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::bsText('col-md-3', 'col-md-3', 'Reference#', 'reference_number', null, '') !!}
        {!! Form::bsText('col-md-3', 'col-md-3', 'Requested flight', 'requested_flight', null, '') !!}
    </div>
</div>
