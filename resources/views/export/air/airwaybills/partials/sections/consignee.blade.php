<legend>Consignee</legend>
<div class="row">
    {!! Form::bsComplete('col-md-3', 'col-md-9', 'Name', 'consignee_id', 'consignee_name', Request::get('term'),((isset($airway_bill) and $airway_bill->consignee_id > 0) ? $airway_bill->consignee->name : null), 'Customers...') !!}
</div>
<div class="row">
    {!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'consignee_address', null, 1, ' ') !!}
</div>
<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-9', 'City', 'consignee_city', null, ' ') !!}
</div>
<div class="row">
    {!! Form::bsComplete('col-md-3', 'col-md-9', 'State/ Province', 'consignee_state_id', 'consignee_state_name', Request::get('term'), ((isset($airway_bill) and $airway_bill->consignee_state_id > 0) ? $airway_bill->consignee_state->name : null), 'State') !!}
</div>
<div class="row">
    {!! Form::bsComplete('col-md-3', 'col-md-9', 'Zip Postal Code', 'consignee_zip_code_id', 'consignee_zip_code_code', Request::get('term'), ((isset($airway_bill) and $airway_bill->consignee_zip_code_id > 0) ? $airway_bill->consignee_zip_code->code : null), 'Zip Code') !!}
</div>
<div class="row">
    {!! Form::bsText('col-md-3', 'col-md-6', 'Phone', 'consignee_phone', null, '') !!}
</div>
