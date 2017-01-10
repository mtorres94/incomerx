<fieldset id="Shipment_details">

    <div class="row">
        <div class="col-md-6">{!! Form::bsText("col-md-6", "col-md-6",'Ship Inst #', 'ship_inst', null, '') !!}</div>
        <div class="col-md-6">{!! Form::bsText("col-md-6", "col-md-6",'Project Number', 'project_number', null, '') !!}</div>
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9','Shipment # ', 'shipment_id', 'shipment_code', Request::get('term'),((isset($bill_of_lading) and $bill_of_lading->shipment_id> 0) ? $bill_of_lading->shipment->code : null), 'Shipment #') !!}
    </div>
    <div class="row">
        {!! Form::bsText('col-md-3', 'col-md-9','Booking Number ', 'booking_code',null, "" ) !!}
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
            <div class="col-md-6">{!! Form::bsCheck('Collect free', 'collect_free', (isset($bill_of_lading) ? $bill_of_lading->collect_free : 0)) !!}</div>
            <div class="col-md-6"> {!! Form::bsCheck('Insurance Requested', 'insurance', (isset($bil_of_lading) ? $bill_of_lading->insurance : 0)) !!}</div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">{!! Form::bsCheck('Stand by', 'stand_by',(isset($bill_of_lading) ? $bill_of_lading->stand_by : 0) ) !!}</div>
        <div class="col-md-4"> {!! Form::bsCheck('Partial', 'partial', (isset($bill_of_lading) ? $bill_of_lading->partial : 0)) !!}</div>
        <div class="col-md-4"> {!! Form::bsCheck('Spot Rate', 'spot_rate', (isset($bill_of_lading) ? $bill_of_lading->spot_rate : 0)) !!}</div>
    </div>
    <div class="row">
        <div class="col-md-4">{!! Form::bsCheck('Confirmed', 'confirmed', (isset($bill_of_lading) ? $bill_of_lading->confirmed : 0)) !!}</div>
        <div class="col-md-4"> {!! Form::bsCheck('POD Information', 'POD_info', (isset($bill_of_lading) ? $bill_of_lading->POD_info : 0)) !!}</div>
        <div class="col-md-4">{!! Form::bsText('col-md-6', 'col-md-6', 'Amt $', 'amount', null, ' ') !!}</div>
    </div>

</fieldset>