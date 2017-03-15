
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
                {!! Form::bsSelect('col-md-3', 'col-md-9','Shipment # ', 'shipment_id', Sass\EoShipmentEntry::all()->sortByDesc('id')->where('status', 'O')->lists('code', 'id'), 'FILE#', 'body', 'false') !!}
            </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! Form::bsSelect('col-md-3', 'col-md-9','Cargo Loader # ', 'cargo_loader_id', Sass\EoCargoLoader::all()->sortByDesc('id')->where('cargo_loader_status', 'O')->lists('code', 'id')->take(10), 'CARGO LOADER#', 'body', 'false') !!}
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
            <div class="col-md-6">{!! Form::bsCheck('col-md-1', 'col-md-6','Collect free', 'collect_free', (isset($bill_of_lading) ? $bill_of_lading->collect_free : 'off')) !!}</div>
            <div class="col-md-6"> {!! Form::bsCheck('col-md-1', 'col-md-6','Insurance Requested', 'insurance', (isset($bil_of_lading) ? $bill_of_lading->insurance : 'off')) !!}</div>
        </div>
