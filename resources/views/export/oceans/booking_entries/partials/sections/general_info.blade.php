<fieldset>
    <legend>Booking Entry</legend>
    <div class="row">
        <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
            @if(isset($booking_entry) and $booking_entry->cargo_loader_id >0)
                <a class="btn btn-default" href='#' target="_blank" role="button" onclick="addSubtab('Cargo Loader', 'http://incomerx.app/export/oceans/cargo_loader/{{ $booking_entry->cargo_loader_id }}/edit')"><i class="fa fa-cubes"></i> Cargo Loader</a>
            @else
                <a class="btn btn-default" href='#' target="_blank" role="button" onclick="addSubtab('Cargo Loader', 'http://incomerx.app/export/oceans/cargo_loader/create')"><i class="fa fa-cubes"></i> Cargo Loader</a>

            @endif


        </div>
</div>
    <div class="row">
        <div class="col-md-2">{!! Form::bsText(null, null,'Booking #', 'booking_code', null, '') !!}</div>
        <div class="col-md-3">{!! Form::bsComplete(null, null,'Division ', 'division_id', 'division_name', Request::get('term'),((isset($booking_entry) and $booking_entry->division_id > 0) ? $booking_entry->division->name : null), 'Divisions...', 'options.maintenance.divisions.divisions', 'options.maintenance.divisions.divisions', 'maintenance.divisions_departments.divisions.index') !!}</div>
        <div class="col-md-2">{!! Form::bsText(null, null, 'User', 'user_id', ((isset($booking_entry) and $booking_entry->user_create_id > 0) ? $booking_entry->user_create->username :  Auth::user()->username), '') !!}</div>
        <div class="col-md-3">{!! Form::bsText(null, null,'Shipping Inst #', 'shipping_number', null, '') !!}</div>
        <div class="col-md-2">{!! Form::bsSelect(null, null, ' Status', 'booking_status', array(
            'O' => 'OPEN',
            'P' => 'IN PROCESS',
            'C' => 'CLOSED',
            'V' => 'VOID',
        ), 'Status') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-2">{!! Form::bsSelect(null, null, 'Shipment Type', 'shipment_type', array(
            'C' => 'Consolidation shipment',
            'D' => 'Direct Shipment',
        ), 'Type') !!}</div>
        <div class="col-md-2">{!! Form::bsSelect(null, null, 'BL Type', 'bl_type', array(
            'C' => 'COLLECT',
            'P' => 'PREPAID',
        ), 'Type') !!}</div>
        <div class="col-md-2">{!! Form::bsText(null, null,'BL #', 'bl_number', null, '') !!}</div>
        <div class="col-md-2">{!! Form::bsComplete(null, null,'Shipment # ', 'shipment_id', 'shipment_code', Request::get('term'),((isset($booking_entry) and $booking_entry->shipment_id > 0) ? $booking_entry->shipment->shipment_code : null), '') !!}</div>

        <div class="col-md-2">{!! Form::bsSelect(null, null, 'Currency', 'currency_type', Sass\Currency::all()->lists('code', 'id'), ' ') !!}</div>
        <div class="col-md-2">{!! Form::bsSelect(null, null, 'Rate Class', 'rate_class', array(
            '1' => '1 - 100 LB/ 1CFT',
            '2' => '2 - 2000 LB/ 40CFT',
            '3' => '3 - 1000 KG/ 1CBM',
            '4' => '4 - FIXED AMOUNT',
            '5' => '5 - CONTAINER',
            '6' => '6 - 50 LB/ 1CFT',
            '7' => '7 - OTHER',
        ), ' ') !!}</div>

    </div>


</fieldset>