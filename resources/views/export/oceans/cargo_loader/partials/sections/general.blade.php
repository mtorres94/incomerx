
    <legend>Cargo Loader </legend>
    {!! Form::hidden('booking_id', (isset($cargo_loader) ? $cargo_loader->booking_id : 0), ['id' => 'booking_id', 'class' => 'form-control input-sm']) !!}
    {!! Form::hidden('shipment_code', null, ['id' => 'shipment_code', 'class' => 'form-control input-sm']) !!}
    {!! Form::hidden('hidden_container_details',(isset($cargo_loader) ? $cargo_loader->hidden_container_details : ""), ['id' => 'hidden_container_details', 'class' => 'form-control input-sm']) !!}
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
        <div class="col-md-3">{!! Form::bsSelect(null, null,'Shipment # ', 'shipment_id', Sass\EoShipmentEntry::all()->sortByDesc('id')->where('status', 'O')->lists('code', 'id'), 'FILE#', 'body', 'false') !!}</div>

        <div class="col-md-3">{!! Form::bsSelect(null, null, ' Status', 'cargo_loader_status', array(
            'O' => 'ORDERED',
            'W' => 'WILL ADVICE',
            'H' => 'HOLD',
            'P' => 'PRE LOADED',
            'L' => 'LOADED',
            'C' => 'COMPLETED',
        ), 'Status'),null !!}</div>
    </div>

