<fieldset id="Shipper">
    <legend>Shipper</legend>
    <div class="row">
        <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Name', 'shipper_id', 'shipper_name', Request::get('term'), ((isset($bill_of_lading) and $bill_of_lading->shipper_id > 0) ? $bill_of_lading->shipper->name : null), 'Customers...') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-12">{!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'shipper_address', null, 1, ' ') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'City', 'shipper_city', null, ' ') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'State/ Province', 'shipper_state_id', 'shipper_state_name', Request::get('term'), ((isset($bill_of_lading) and $bill_of_lading->shipper_state_id > 0) ? $bill_of_lading->shipper_state->name : null), 'State') !!}</div>
    </div>

    <div class="row">
        <div class="col-md-12">
         {!! Form::bsComplete('col-md-3', 'col-md-9', 'Zip Postal Code', 'shipper_zip_code_id', 'shipper_zip_code_code', Request::get('term'), ((isset($bill_of_lading) and $bill_of_lading->shipper_zip_code_id > 0) ? $bill_of_lading->shipper_zip_code->code : null), 'Zip Code') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Phone', 'shipper_phone', null, '') !!}</div>
        <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Fax', 'shipper_fax', null, '') !!}</div>

    </div>
</fieldset>