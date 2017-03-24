<legend>Loading Guide </legend>
{!! Form::hidden('booking_id', (isset($loading_guide) ? $loading_guide->booking_id : 0), ['id' => 'booking_id', 'class' => 'form-control input-sm']) !!}
{!! Form::hidden('loading_guide_id',  (isset($loading_guide) ? $loading_guide->id : 0), ['id' => 'loading_guide_id', 'class' => 'form-control input-sm']) !!}
<div class="row">
    <div class="col-md-3">{!! Form::bsText(null, null,'Cargo Load #', 'code', null, '') !!}</div>
    <div class="col-md-3">{!! Form::bsText(null, null,'Booking # ','booking_code', null, '') !!}</div>
    <div class="col-md-3">{!! Form::bsDate(null, null,'Date', 'date', null, '') !!}</div>
    <div class="col-md-3">{!! Form::bsText(null, null, 'User', 'user_id', ((isset($loading_guide) and $loading_guide->user_create_id > 0) ? $loading_guide->user_create->username :  Auth::user()->username), '') !!}</div>
</div>

<div class="row">
    <div class="col-md-3">{!! Form::bsSelect(null, null, 'Shipment Type', 'shipment_type', array(
            'C' => 'Consolidation shipment',
            'D' => 'Direct Shipment',
        ), 'Type'), null !!}</div>
    <div class="col-md-3">{!! Form::bsSelect(null, null,'Shipment # ', 'shipment_id', Sass\EaShipmentEntry::all()->lists('code', 'id'), 'FILE#', 'body', 'false') !!}</div>

    <div class="col-md-3">{!! Form::bsSelect(null, null, ' Status', 'status', array(
            'O' => 'ORDERED',
            'W' => 'WILL ADVICE',
            'H' => 'HOLD',
            'P' => 'PRE LOADED',
            'L' => 'LOADED',
            'C' => 'COMPLETED',
        ), 'Status'),null !!}</div>
</div>

