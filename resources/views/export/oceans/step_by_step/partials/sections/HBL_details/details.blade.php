<fieldset id="Shipment_details">
<div class="col-md-6">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4">
                {!! Form::bsSelect(null, null, 'Currency', 'currency_type',Sass\Currency::all()->lists('code', 'id'), 'Currency...') !!}
                {!! Form::bsText(null, null, 'Declared Value $', 'declared_value', null, '0.00') !!}
            </div>
            <div class="col-md-4">
                {!! Form::bsText(null, null, 'Insured Value $', 'insured_value', null, '0.00') !!}
             {!! Form::bsText(null, null, 'Exchange Rate', 'exchange_rate', null, '0.00') !!}
            </div>
                <div class="col-md-4">
                    <div class="row">{!! Form::bsCheck('Collect free', 'collect_free') !!}</div>
                    <div class="row"> {!! Form::bsCheck('Insurance Requested', 'insurance') !!}</div>
                </div>
            </div>
        </div>

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4">{!! Form::bsCheck('Stand by', 'stand_by') !!}</div>
            <div class="col-md-4"> {!! Form::bsCheck('Partial', 'partial') !!}</div>
            <div class="col-md-4"> {!! Form::bsCheck('Spot Rate', 'spot_rate') !!}</div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4">{!! Form::bsCheck('Confirmed', 'confirmed') !!}</div>
            <div class="col-md-4"> {!! Form::bsCheck('POD Information', 'POD_info') !!}</div>
            <div class="col-md-4">{!! Form::bsText('col-md-3', 'col-md-9', 'Amt$', 'amount', null, ' ') !!}</div>
        </div>
    </div>
</div>
<div class="col-md-6">

        <div class="row">
            <div class="col-md-12">
                {!! Form::bsComplete('col-md-3', 'col-md-9','Country of origin ', 'origin_country_id', 'origin_country_name', Request::get('term'),((isset($bill_lading) and $bill_lading->origin_country_id > 0) ? $bill_lading->origin_country->name : null), 'Country') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {!! Form::bsText('col-md-3', 'col-md-9', 'Customs Code', 'customs_code', null, null) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'IT Number', 'it_number', null, null) !!}
                </div>
                <div class="col-md-6">{!! Form::bsSelect('col-md-6', 'col-md-6', ' Incoterm', 'incoterm_type', Sass\Incoterm::all()->lists('code', 'id'), null) !!}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {!! Form::bsComplete('col-md-3', 'col-md-9','Co-Loader ', 'coloader_id', 'coloader_name', Request::get('term'),((isset($bill_lading) and $bill_lading->coloader_id > 0) ? $bill_lading->coloader->name : null), null) !!}
            </div>
        </div>

    <div class="row">
        <div class="col-md-12">
            {!! Form::bsComplete('col-md-3', 'col-md-9', 'Forwarding Agent', 'forwarding_agent_id', 'forwarding_agent_name', Request::get('term'), ((isset($booking_entry) and $booking_entry->forwarding_agent_id > 0) ? $booking_entry->forwarding_agent->name : null), 'Customers...') !!}
        </div>
    </div>
</div>
</fieldset>
