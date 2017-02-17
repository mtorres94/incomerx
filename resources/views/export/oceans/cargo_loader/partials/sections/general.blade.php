
    <legend>Cargo Loader </legend>

    <div class="row">
        <div class="col-md-3">{!! Form::bsText(null, null,'Cargo Load #', 'code', null, '') !!}</div>
        <div class="col-md-3">{!! Form::bsText(null, null,'Booking # ','booking_code', null, '') !!}</div>
        <div class="col-md-3">{!! Form::bsDate(null, null,'Date', 'date_today', null, '') !!}</div>
        <div class="col-md-3">{!! Form::bsText(null, null, 'User', 'user_id', ((isset($cargo_loader) and $cargo_loader->user_create_id > 0) ? $cargo_loader->user_create->username :  Auth::user()->username), '') !!}</div>
    </div>

    <div class="row">
        <div class="col-md-3">{!! Form::bsSelect(null, null, 'Shipment Type', 'shipment_type', array(
            'C' => 'Consolidation shipment',
            'D' => 'Direct Shipment',
        ), 'Type'), null !!}</div>
        <div class="col-md-3">{!! Form::bsComplete(null, null,'Shipment # ', 'shipment_id', 'shipment_code', Request::get('term'),((isset($cargo_loader) and $cargo_loader->shipment_id > 0) ? $cargo_loader->shipment->code : null), '') !!}</div>

        <div class="col-md-3">{!! Form::bsSelect(null, null, ' Status', 'cargo_loader_status', array(
            'O' => 'ORDERED',
            'W' => 'WILL ADVICE',
            'H' => 'HOLD',
            'P' => 'PRE LOADED',
            'L' => 'LOADED',
            'C' => 'COMPLETED',
        ), 'Status'),null !!}</div>
    </div>

