    <legend>Shipper</legend>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Name', 'shipper_id', 'shipper_name', Request::get('term'),((isset($airway_bill) and $airway_bill->shipper_id > 0) ? $airway_bill->shipper->name : null), 'Customers...') !!}
    </div>
    <div class="row">
        {!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'shipper_address', null, 1, ' ') !!}
    </div>
    <div class="row">
        {!! Form::bsText('col-md-3', 'col-md-9', 'City', 'shipper_city', null, ' ') !!}
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'State/ Province', 'shipper_state_id', 'shipper_state_name', Request::get('term'), ((isset($airway_bill) and $airway_bill->shipper_state_id > 0) ? $airway_bill->shipper_state->name : null), 'State') !!}
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Zip Postal Code', 'shipper_zip_code_id', 'shipper_zip_code_code', Request::get('term'), ((isset($airway_bill) and $airway_bill->shipper_zip_code_id > 0) ? $airway_bill->shipper_zip_code->code : null), 'Zip Code') !!}
    </div>
    <div class="row">
        {!! Form::bsText('col-md-3', 'col-md-6', 'Phone', 'shipper_phone', null, '') !!}
    </div>
