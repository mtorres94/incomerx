<fieldset id="Shipment_details">
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9','Quote Number ', 'quote_number_id', 'quote_number_code', Request::get('term'),((isset($bill_lading) and $bill_lading->quote_number_id > 0) ? $bill_lading->quote_number->code : null), 'Quote') !!}
    </div>
    <div class="row">
        <div class="col-md-6">{!! Form::bsText("col-md-6", "col-md-6",'Ship Inst #', 'ship_inst', null, '') !!}</div>
        <div class="col-md-6">{!! Form::bsText("col-md-6", "col-md-6",'Project Number', 'project_number', null, '') !!}</div>
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9','Shipment # ', 'shipment_id', 'shipment_code', Request::get('term'),((isset($bill_lading) and $bill_lading->shipment_id> 0) ? $bill_lading->shipment->shipment_code : null), 'Shipment #') !!}
    </div>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9','Booking Number ', 'booking_entry_id', 'booking_entry_code', Request::get('term'),((isset($bill_lading) and $bill_lading->booking_entry_id > 0) ? $bill_lading->booking_entry->name : null), 'Booking') !!}
    </div>
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
            <div class="col-md-6">{!! Form::bsCheck('Collect free', 'collect_free') !!}</div>
            <div class="col-md-6"> {!! Form::bsCheck('Insurance Requested', 'insurance') !!}</div>
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