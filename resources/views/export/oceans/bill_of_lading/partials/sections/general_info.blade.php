
    <div class="row">
        <legend>Bill of Lading</legend>

    </div>
    {!! Form::hidden('shipment_code', ((isset($bill_of_lading) and ($bill_of_lading->shipment_id > 0))? $bill_of_lading->shipment->id : ""), ['id' => 'shipment_code', 'class' => 'form-control input-sm']) !!}

    <div class="row">
        <div class="col-md-1">{!! Form::bsSelect(null, null, ' BL Class', 'bl_class', array(
            '1' => 'DBL',
            '2' => 'HBL',
            '3' => 'MBL',
        ), 'Class') !!}</div>
        <div class="col-md-2">{!! Form::bsSelect(null, null, 'BL Type', 'bl_type', array(
            'C' => 'COLLECT',
            'P' => 'PREPAID',
        ), 'Type') !!}</div>
        <div class="col-md-2">{!! Form::bsSelect(null, null, ' Status', 'bl_status', array(
            'O' => 'OPEN',
            'P' => 'IN PROCESS',
            'C' => 'CLOSED',
            'V' => 'VOID',
        ), 'STATUS') !!}</div>
        <div class="col-md-2">{!! Form::bsDate(null, null,'Date', 'bl_date', null, '') !!}</div>
        <div class="col-md-3">{!! Form::bsSelect(null, null, 'Rate Class', 'rate_class', array(
            '1' => '1 - 100 LB/ 1CFT',
            '2' => '2 - 2000 LB/ 40CFT',
            '3' => '3 - 1000 KG/ 1CBM',
            '4' => '4 - FIXED AMOUNT',
            '5' => '5 - CONTAINER',
            '6' => '6 - 50 LB/ 1CFT',
            '7' => '7 - OTHER',
        ), null, 'body') !!}</div>

        <div class="col-md-2">{!! Form::bsText(null, null, 'User', 'user_id', ((isset($bill_of_lading) and $bill_of_lading->user_create_id > 0) ? $bill_of_lading->user_create->username :  Auth::user()->username), '') !!}</div>
    </div>
    <div class="row">
            <div class="col-md-3">{!! Form::bsText(null, null, 'Vessel', 'vessel_name', null, null) !!}</div>
            <div class="col-md-3">{!! Form::bsText(null, null, 'Voyage', 'voyage_name', null, null) !!}</div>
            <div class="col-md-2">{!! Form::bsDate(null, null, 'Departure', 'departure_date', null, '') !!}</div>
            <div class="col-md-2">{!! Form::bsDate(null, null, 'Arrival', 'arrival_date', null, '') !!}</div>
            <div class="col-md-2">{!! Form::bsText(null, null, 'HBL / DBL', 'code', null, ' ') !!}</div>
    </div>
