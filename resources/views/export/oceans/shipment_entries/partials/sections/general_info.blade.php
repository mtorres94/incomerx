<fieldset>
    <legend>Shipment Entry</legend>
    <div class="row pull-right">

    </div>
    <div class="row">
        <div class="col-md-2">{!! Form::bsText(null, null,'Shipment #', 'code',null, '') !!}</div>
        <div class="col-md-2">{!! Form::bsSelect(null, null, ' Shipment Type', 'shipment_type', array(
            'C' => 'Consolidation',
            'D' => 'Direct',
        ), 'Type') !!}</div>
        <div class="col-md-2">{!! Form::bsDate(null, null,'Date', 'date_today', null, '') !!}</div>
        <div class="col-md-2">{!! Form::bsSelect(null, null, 'Rate Class', 'rate_class', array(
            '1' => '1 - 100 LB/ 1CFT',
            '2' => '2 - 2000 LB/ 40CFT',
            '3' => '3 - 1000 KG/ 1CBM',
            '4' => '4 - FIXED AMOUNT',
            '5' => '5 - CONTAINER',
            '6' => '6 - 50 LB/ 1CFT',
            '7' => '7 - OTHER',
        ), null) !!}</div>
        <div class="col-md-2">{!! Form::bsSelect(null, null, ' Status', 'bl_status', array(
            'O' => 'OPEN',
            'P' => 'POSTED',
            'C' => 'CLOSED',
            'V' => 'VOID',
        ), 'Status') !!}</div>
        <div class="col-md-2">{!! Form::bsText(null, null, 'User', 'user_id', ((isset($shipment_entry) and $shipment_entry->user_create_id > 0) ? $shipment_entry->user_create->username :  Auth::user()->username), '') !!}</div>


    </div>
    <div class="row">
        <div class="col-md-2">{!! Form::bsDate(null, null, 'Booked on (1)', 'booked_date', null, '') !!}</div>
        <div class="col-md-2">{!! Form::bsDate(null, null, 'Loading date (2)', 'loading_date', null, '') !!}</div>
        <div class="col-md-2">{!! Form::bsDate(null, null, 'Equipment Cut off (3)', 'equipment_cut_off_date', null, '') !!}</div>
        <div class="col-md-2">{!! Form::bsDate(null, null, 'Documents Cut off (4)', 'documents_cut_off_date', null, '') !!}</div>
        <div class="col-md-2">{!! Form::bsDate(null, null, 'Departure (5)', 'departure_date', null, '') !!}</div>
        <div class="col-md-2">{!! Form::bsDate(null, null, 'Arrival (6)', 'arrival_date', null, '') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-2">{!! Form::bsComplete(null, null,'Quote#', 'quote_id', 'quote_code', Request::get('term'),
    ((isset($quotes) and $quotes->quote_id > 0) ? $quotes->quote->name : null), 'Quote Number') !!}</div>
        <div class="col-md-2">{!! Form::bsText(null, null,'Booking #', 'booking_code', null, '') !!}</div>
        <div class="col-md-2">{!! Form::bsText(null, null, 'Vessel', 'vessel_name', null, '') !!}</div>
        <div class="col-md-2">{!! Form::bsText(null, null, 'Voyage', 'voyage_name', null, '') !!}</div>
        <div class="col-md-4">{!! Form::bsText(null, null, 'References', 'reference', null, '') !!}</div>
    </div>


</fieldset>