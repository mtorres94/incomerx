<div class="row">
        {!! Form::hidden('transportation_id', null, ['id' => 'transportation_id', 'class' => 'form-control input-sm']) !!}
        <div class="col-md-3">{!! Form::bsText(null, null, 'Leg', 'transportation_leg', null, '0') !!}</div>
        <div class="col-md-3">{!! Form::bsSelect(null, null, 'Mode', 'transportation_mode', array('A' => 'AIR','O' => 'OCEAN','T' => 'TRUCK'), ' ')!!}</div>
        <div class="col-md-6">{!! Form::bsComplete(null, null, 'Billing Code', 'transportation_billing_id', 'transportation_billing_code',  Request::get('term'), null, 'Billing codes...') !!}</div>
</div>
<div class="row">
    <div class="col-md-6">{!! Form::bsText(null, null, 'Description', 'transportation_description', null, ' ') !!}</div>
    <div class="col-md-3">{!! Form::bsText(null, null, 'Amount', 'transportation_amount', null, '0.000') !!}</div>
    <div class="col-md-3">{!! Form::bsSelect(null, null, 'Leg Status', 'transportation_leg_status', array('O' => 'OPEN','B' => 'BOOKED','C' => 'COMPLETED'), ' ')!!}</div>
</div>
<div class="row">
         <div class="col-md-5">{!! Form::bsComplete(null, null, 'Service', 'transportation_service_id', 'transportation_service_name', Request::get('term'), ((isset($order_entry) and $order_entry->transportation_service_id > 0) ? $order_entry->transportation_service->name : null), 'Services...') !!}</div>
         <div class="col-md-5">{!! Form::bsComplete(null, null, 'Carrier', 'transportation_carrier_id', 'transportation_carrier_name', Request::get('term'),null,'Carriers...') !!}</div>
         <div class="col-md-2">{!! Form::bsCheck('Notify', 'transportation_notify') !!}</div>

</div>
<div class="row">
        <div class="col-md-5">{!! Form::bsComplete(null, null, 'Loading', 'transportation_loading_location_id', 'transportation_loading_location_name', Request::get('term'), null, 'World location...') !!}</div>
        <div class="col-md-4">{!! Form::bsText(null, null, 'Reference (Invoice #)', 'transportation_loading_reference', null, null) !!}</div>
        <div class="col-md-3">{!! Form::bsDate(null, null, 'ETD', 'transportation_ETD_date', null, '') !!}</div>
</div>
<div class="row">
        <div class="col-md-5">{!! Form::bsComplete(null, null, 'Unloading', 'transportation_unloading_location_id', 'transportation_unloading_location_name', Request::get('term'), null, 'World location...') !!}</div>
        <div class="col-md-4">{!! Form::bsText(null, null, 'Reference', 'transportation_unloading_reference', null, null) !!}</div>
        <div class="col-md-3">{!! Form::bsDate(null, null, 'ETA', 'transportation_ETA_date', null, '') !!}</div>
</div>