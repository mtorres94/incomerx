
    <div class="row">
        <div class="col-md-12">
            {!! Form::bsText("col-md-3", "col-md-9",'Ship Inst #', 'ship_inst', null, '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! Form::bsText("col-md-3", "col-md-9",'Project#', 'project_number', null, '') !!}
        </div>
    </div>
    <div class="row">
            <div class="col-md-12">
                {!! Form::bsComplete('col-md-3', 'col-md-9','Shipment # ', 'shipment_id', 'shipment_code', Request::get('term'),((isset($bill_of_lading) and $bill_of_lading->shipment_id> 0) ? $bill_of_lading->shipment->code : null), 'Shipment #') !!}
            </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! Form::bsComplete('col-md-3', 'col-md-9','Cargo Loader # ', 'cargo_loader_id', 'cargo_loader_code', Request::get('term'),((isset($bill_of_lading) and $bill_of_lading->cargo_loader_id> 0) ? $bill_of_lading->cargo_loader->code : null), 'Cargo loader #') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9','Booking  ', 'booking_code',null, "" ) !!}</div>
    </div>

    <div class="row">
        <div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'MBL', 'mbl_code', null, ' ') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! Form::bsSelect('col-md-3', 'col-md-3', 'Currency', 'currency_type',Sass\Currency::all()->lists('code', 'id'), 'Currency...') !!}
            {!! Form::bsText('col-md-3', 'col-md-3', 'Declared Value $', 'declared_value', null, '0.00') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! Form::bsText('col-md-3', 'col-md-3', 'Insured Value $', 'insured_value', null, '0.00') !!}
            {!! Form::bsText('col-md-3', 'col-md-3', 'Exchange Rate', 'exchange_rate', null, '0.00') !!}
        </div>
    </div>
        <div class="row">
            <div class="col-md-6">{!! Form::bsCheck('Collect free', 'collect_free', (isset($bill_of_lading) ? $bill_of_lading->collect_free : 0)) !!}</div>
            <div class="col-md-6"> {!! Form::bsCheck('Insurance Requested', 'insurance', (isset($bil_of_lading) ? $bill_of_lading->insurance : 0)) !!}</div>
        </div>
