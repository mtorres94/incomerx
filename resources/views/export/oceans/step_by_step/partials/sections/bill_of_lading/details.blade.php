<fieldset id="Shipment_details">

    <div class="row">
        {!! Form::bsText('col-md-3', 'col-md-9', 'Manifest Type', 'manifest_type', null, ' ') !!}
    </div>
    <div class="row">
        {!! Form::bsText('col-md-3', 'col-md-9', 'DBL/MBL', 'dbl_mbl_code', null, ' ') !!}
    </div>
    <div class="row">
        {!! Form::bsText('col-md-3', 'col-md-9', 'HBL', 'hbl_code', null, ' ') !!}
    </div>
    <div class="row">
        <div class="col-md-6">
            {!! Form::bsSelect('col-md-6', 'col-md-6', 'Currency', 'currency_type',Sass\Currency::all()->lists('code', 'id'), 'Currency...') !!}
            {!! Form::bsText('col-md-6', 'col-md-6', 'Declared Value $', 'declared_value', null, '0.00') !!}
            {!! Form::bsText('col-md-6', 'col-md-6', 'Insured Value $', 'insured_value', null, '0.00') !!}

        </div>
        <div class="col-md-6">
           {!! Form::bsText('col-md-6', 'col-md-6', 'Exchange Rate', 'exchange_rate', null, '0.00') !!}
            <div class="row">
                <div class="col-md-6">{!! Form::bsCheck('Collect free', 'collect_free') !!}</div>
                <div class="col-md-6"> {!! Form::bsCheck('Insurance Requested', 'insurance') !!}</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">{!! Form::bsCheck('Stand by', 'stand_by') !!}</div>
        <div class="col-md-4"> {!! Form::bsCheck('Partial', 'partial') !!}</div>
        <div class="col-md-4"> {!! Form::bsCheck('Spot Rate', 'spot_rate') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-4">{!! Form::bsCheck('Confirmed', 'confirmed') !!}</div>
        <div class="col-md-4"> {!! Form::bsCheck('POD Information', 'POD_info') !!}</div>
        <div class="col-md-4">{!! Form::bsText('col-md-6', 'col-md-6', 'Amt $', 'amount', null, ' ') !!}</div>
    </div>

</fieldset>

<fieldset id="More details">
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9','Country of origin ', 'origin_country_id', 'origin_country_name', Request::get('term'),((isset($bill_lading) and $bill_lading->origin_country_id > 0) ? $bill_lading->origin_country->name : null), 'Country') !!}
    </div>
    <div class="row">
        {!! Form::bsText('col-md-3', 'col-md-9', 'Customs Code', 'customs_code', null, null) !!}
    </div>
    <div class="row">
        <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'IT Number', 'it_number', null, null) !!}
        </div>
        <div class="col-md-6">{!! Form::bsSelect('col-md-6', 'col-md-6', ' Incoterm', 'incoterm_type', Sass\Incoterm::all()->lists('code', 'id'), null) !!}</div>
    </div>
    <div class="row"> {!! Form::bsComplete('col-md-3', 'col-md-9','Co-Loader ', 'coloader_id', 'coloader_name', Request::get('term'),((isset($bill_lading) and $bill_lading->coloader_id > 0) ? $bill_lading->coloader->name : null), null) !!}
    </div>

</fieldset>