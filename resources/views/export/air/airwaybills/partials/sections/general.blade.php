
<div class="row">
    <legend>Airway Bills</legend>
</div>
{!! Form::hidden('shipment_code', ((isset($airway_bill) and ($airway_bill->shipment_id > 0))? $airway_bill->shipment->code : ""), ['id' => 'shipment_code', 'class' => 'form-control input-sm']) !!}
{!! Form::hidden('booking_id', ((isset($airway_bill) and ($airway_bill->booking_id > 0))? $airway_bill->booking->id : ""), ['id' => 'booking_id', 'class' => 'form-control input-sm']) !!}

<div class="row">
    <div class="col-md-1">{!! Form::bsSelect(null, null, ' AWB Class', 'awb_class', array( '1' => 'DAWB', '2' => 'HAWB', '3' => 'MAWB'), 'Class') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, 'Awb Type', 'awb_type', array('C' => 'COLLECT','P' => 'PREPAID'), 'Type') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null, ' Status', 'status', array( 'O' => 'OPEN', 'P' => 'IN PROCESS', 'C' => 'CLOSED', 'H' => 'HOLD', 'V' => 'VOID'), 'STATUS') !!}</div>
    <div class="col-md-2">{!! Form::bsDate(null, null,'Date', 'date', null, '') !!}</div>
    <div class="col-md-3">{!! Form::bsText(null, null,'DAWB / MAWB', 'booking_code', null, '') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null, 'User', 'user_id', ((isset($airway_bill) and $airway_bill->user_create_id > 0) ? $airway_bill->user_create->username :  Auth::user()->username), '') !!}</div>

</div>
<div class="row">
    <div class="col-md-2">{!! Form::bsDate(null, null,'Departure', 'departure_date', null, '') !!}</div>
    <div class="col-md-2">{!! Form::bsDate(null, null,'Arrival', 'arrival_date', null, '') !!}</div>
    <div class="col-md-2">{!! Form::bsSelect(null, null,'Shipment # ', 'shipment_id', Sass\EaShipmentEntry::all()->lists('code', 'id'), 'FILE#', 'body', 'false') !!}</div>
    <div class="col-md-3">{!! Form::bsText(null, null,'Customer Ref#', 'customer_reference', null, '') !!}</div>
    <div class="col-md-1">{!! Form::bsSelect(null, null,'Currency ', 'currency_id', Sass\Currency::all()->lists('code', 'id'), 'Currency', 'body', 'false') !!}</div>
    <div class="col-md-2">{!! Form::bsText(null, null,'HAWB', 'code', null, '') !!}</div>


</div>
