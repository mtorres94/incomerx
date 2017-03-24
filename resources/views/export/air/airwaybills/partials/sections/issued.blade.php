<div class="col-md-6">
    <legend>Issued</legend>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Name', 'issued_id', 'issued_name', Request::get('term'),((isset($airway_bill) and $airway_bill->issued_id > 0) ? $airway_bill->issued->name : null), 'Customers...') !!}
    </div>
    <div class="row">
        {!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'issued_address', null, 1, ' ') !!}
    </div>
    <div class="row">
        {!! Form::bsText('col-md-3', 'col-md-9', 'City', 'issued_city', null, ' ') !!}
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'State/ Province', 'issued_state_id', 'issued_state_name', Request::get('term'), ((isset($airway_bill) and $airway_bill->issued_state_id > 0) ? $airway_bill->issued_state->name : null), 'State') !!}
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Zip Postal Code', 'issued_zip_code_id', 'issued_zip_code_code', Request::get('term'), ((isset($airway_bill) and $airway_bill->issued_zip_code_id > 0) ? $airway_bill->issued_zip_code->code : null), 'Zip Code') !!}
    </div>
    <div class="row">
        {!! Form::bsText('col-md-3', 'col-md-6', 'Phone', 'issued_phone', null, '') !!}
    </div>
</div>
<div class="col-md-6">
    <div class="row">
        {!! Form::bsMemo('col-md-3', 'col-md-9', 'Issued by', 'issued_notes', null, ' ') !!}
    </div>
    <div class="row">
        {!! Form::bsMemo('col-md-3', 'col-md-9', 'Signature of Shipper or his Agent', 'signature_shipper', null, ' ') !!}
    </div>
    <div class="row">
        {!! Form::bsMemo('col-md-3', 'col-md-9', 'Accounting Information', 'accounting_information', null, ' ') !!}
    </div>
    <div class="row">
        {!! Form::bsMemo('col-md-3', 'col-md-9', 'Handling Information', 'handling_information', null, ' ') !!}
    </div>
    <div class="row">
        {!! Form::bsMemo('col-md-3', 'col-md-9', 'Executed on', 'executed_on', null, ' ') !!}
    </div>
</div>
