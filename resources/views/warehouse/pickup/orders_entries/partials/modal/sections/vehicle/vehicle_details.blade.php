<div class="row">
    <div class="col-md-6">
        <h4><b>Vehicle Details</b></h4>
        {!! Form::hidden('vehicle_id', null, ['id' => 'vehicle_id', 'class' => 'form-control input-sm']) !!}
        <div class="col-md-12">{!! Form::bsText(null, null, 'Vin #.', 'vehicle_vin', null, '0') !!}</div>
        <div class="row">
            <div class="col-md-6">{!! Form::bsSelect(null, null, 'Type', 'vehicle_type', array('A' => 'AUTO', 'TU' => 'TRUCK','BO' => 'BOAT', 'M' => 'MOTORCYCLE','V' => 'VAN', 'BU' => 'BUS','4' => '4 WHEELER', '3' => '3 WHEELER','S' => 'SNOWMOBILE', 'TA' => 'TRACTOR','L' => 'LIMO', 'R' => 'RV','J' => 'JETSKI', 'O' => 'OTHER'), ' ') !!}</div>
            <div class="col-md-6">{!! Form::bsText(null, null, 'Color', 'vehicle_color', null, '') !!}</div>
        </div>
        <div class="row">

            <div class="col-md-6">{!! Form::bsText(null, null, 'Year', 'vehicle_year', null, '') !!}</div>
            <div class="col-md-6">{!! Form::bsSelect(null, null, 'Condition', 'vehicle_condition', array('N' => 'NEW', 'U' => 'USED','S' => 'SALVAGE'), ' ') !!}</div>
        </div>
        <div class="row">
             <div class="col-md-6">{!! Form::bsText(null, null, 'Make', 'vehicle_make', null, '') !!}</div>
             <div class="col-md-6">{!! Form::bsText(null, null, 'Keys', 'vehicle_keys', null, '') !!}</div>
        </div>
        <div class="row">
             <div class="col-md-6">{!! Form::bsText(null, null, 'Model', 'vehicle_model', null, '') !!}</div>
             <div class="col-md-6">{!! Form::bsSelect(null, null, 'Running', 'vehicle_running', array('Y' => 'YES', 'N' => 'NO'), ' ') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-6">{!! Form::bsText(null, null, 'Trim', 'vehicle_trim', null, '') !!}</div>
            <div class="col-md-6">{!! Form::bsText(null, null, 'Mileage', 'vehicle_mileage', null, '') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-6">{!! Form::bsText(null, null, 'Engine', 'vehicle_engine', null, '') !!}</div>
            <div class="col-md-6">{!! Form::bsText(null, null, 'Tag #.', 'vehicle_tag', null, '') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-6">{!! Form::bsText(null, null, 'Body', 'vehicle_body', null, '') !!}</div>
            <div class="col-md-6">{!! Form::bsText(null, null, 'Other', 'vehicle_other', null, '') !!}</div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <h4><b>Title</b></h4>
            <div class="col-md-6">{!! Form::bsText(null, null, 'Number', 'vehicle_number', null, '') !!}</div>
            <div class="col-md-6">{!! Form::bsComplete(null, null, 'State/Province', 'vehicle_state_province_id', 'vehicle_state_province_name', Request::get('term'), null, 'Location...') !!}</div>
            <div class="col-md-6">{!! Form::bsDate(null, null, 'Received', 'vehicle_received', null) !!}</div>
        </div>
        <div class="row">
            <h4><b>Inspection</b></h4>
            <div class="col-md-6">{!! Form::bsText(null, null, 'Number', 'vehicle_inspection_number', null, '') !!}</div>
            <div class="col-md-6">{!! Form::bsDate(null, null, 'Date', 'vehicle_inspection_date', null) !!}</div>
            <div class="col-md-12">{!! Form::bsText(null, null, 'By', 'vehicle_inspection_by', null, '') !!}</div>
        </div>
        <div class="row">
            <div class="col-md-6">{!! Form::bsText(null, null, 'Lot #.', 'vehicle_lot_number', null, '') !!}</div>
            <div class="col-md-6">{!! Form::bsText(null, null, 'Buyer #.', 'vehicle_buyer_number', null, '') !!}</div>
        </div>
    </div>
</div>
