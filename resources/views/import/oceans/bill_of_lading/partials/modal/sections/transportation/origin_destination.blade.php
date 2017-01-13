<div class="row">
    <div class="col-md-6">
        <h4>From</h4>
        {!! Form::bsSelect(null, null, 'Type', 'origin_from_type', array('01' => '01 - CARRIERS','02' => '02 - CUSTOMERS'), ' ')!!}
        {!! Form::bsComplete(null, null, 'Shipper', 'origin_from_shipper_id', 'origin_from_shipper_name',Request::get('term'), null, null) !!}
        {!! Form::bsMemo(null, null, 'Address', 'origin_from_address', null, '') !!}
        {!! Form::bsText(null, null, 'City', 'origin_from_city', null, '') !!}
        {!! Form::bsComplete(null, null, 'State/Province', 'origin_from_state_id', 'origin_from_state_name',Request::get('term'), null, 'State/Province...') !!}
        {!! Form::bsComplete(null, null, 'Country', 'origin_from_country_id', 'origin_from_country_name', Request::get('term'), null, 'Countries...') !!}
        {!! Form::bsComplete(null, null, 'Zip Codes', 'origin_from_zip_code_id', 'origin_from_zip_code_code', Request::get('term'), null, 'Zip Codes...') !!}
        {!! Form::bsText(null, null, 'Contact', 'origin_from_contact', null, '') !!}
        <div class="col-md-6">{!! Form::bsText(null, null, 'Phone', 'origin_from_phone', null, '') !!}</div>
        <div class="col-md-6">{!! Form::bsText(null, null, 'Fax', 'origin_from_fax', null, '') !!}</div>

    </div>
    <div class="col-md-6">
        <h4>To</h4>
        {!! Form::bsSelect(null, null, 'Type', 'origin_to_type', array('01' => '01 - CARRIERS','02' => '02 - CUSTOMERS'), ' ')!!}
        {!! Form::bsComplete(null, null, 'Consignee', 'origin_to_consignee_id', 'origin_to_consignee_name', Request::get('term'), null, null) !!}
        {!! Form::bsMemo(null, null, 'Address', 'origin_to_address', null, '') !!}
        {!! Form::bsText(null, null, 'City', 'origin_to_city', null, '') !!}
        {!! Form::bsComplete(null, null, 'State/Province', 'origin_to_state_id', 'origin_to_state_name', Request::get('term'), null, 'State/Province...') !!}
        {!! Form::bsComplete(null, null, 'Country', 'origin_to_country_id', 'origin_to_country_name', Request::get('term'), null, 'Countries...') !!}
        {!! Form::bsComplete(null, null, 'Zip Codes', 'origin_to_zip_code_id', 'origin_to_zip_code_code', null,  'Zip Codes...') !!}
        {!! Form::bsText(null, null, 'Contact', 'origin_to_contact', null, '') !!}
        <div class="col-md-6">{!! Form::bsText(null, null, 'Phone', 'origin_to_phone', null, '') !!}</div>
        <div class="col-md-6">{!! Form::bsText(null, null, 'Fax', 'origin_to_fax', null, '') !!}</div>

    </div>
</div>
