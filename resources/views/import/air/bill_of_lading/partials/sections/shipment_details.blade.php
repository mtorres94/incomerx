<div class="form-horizontal">
    <div class="col-md-12">
        <div class="col-md-4">
            <div class="row">{!! Form::bsComplete("col-md-4", "col-md-8",'Routing # ', 'routing_order_id', 'routing_order_code', Request::get('term'),    ((isset($bill_of_lading) and ($bill_of_lading->routing_order_id > 0) )? $bill_of_lading->routing_order->code : null) , '') !!}</div>

            <div class="row">{!! Form::bsText("col-md-4", "col-md-8",'DAWB / MAWB # ', 'mbl_number',null,  '') !!}</div>
            <div class="row">{!! Form::bsText("col-md-4", "col-md-8",'HAWB', 'code', null, '') !!}</div>
            <div class="row">{!! Form::bsText("col-md-4", "col-md-8",'Customer Ref#', 'customer_reference', null, '') !!}</div>
            <div class="row">{!! Form::bsText("col-md-4", "col-md-8",'Our Reference', 'our_reference', null, '') !!}</div>
        </div>
        <div class="col-md-4">

            <div class="row">{!! Form::bsComplete("col-md-4", "col-md-8",'Port of Loading ', 'port_loading_id', 'port_loading_name', Request::get('term'),    ((isset($bill_of_lading) and $bill_of_lading->port_loading_id) > 0 ? $bill_of_lading->port_loading_name->name : null), '') !!}</div>
            <div class="row">{!! Form::bsComplete("col-md-4", "col-md-8",'Port of Unloading', 'port_unloading_id', 'port_unloading_name', Request::get('term'),((isset($bill_of_lading) and $bill_of_lading->port_unloading_id > 0) ? $bill_of_lading->port_unloading_name->name : null), '') !!}</div>
            <div class="row">{!! Form::bsComplete("col-md-4", "col-md-8",'Place of Delivery ', 'place_delivery_id', 'place_delivery_name', Request::get('term'),((isset($bill_of_lading) and $bill_of_lading->place_delivery_id > 0) ? $bill_of_lading->place_delivery_name->name : null), '') !!}</div>
            <div class="row">{!! Form::bsComplete("col-md-4", "col-md-8",'Destiny Country', 'destiny_country_id', 'destiny_country_name', Request::get('term'),((isset($bill_of_lading) and $bill_of_lading->destiny_country_id > 0) ? $bill_of_lading->destiny_country->name : null), '') !!}</div>
            <div class="row">{!! Form::bsComplete("col-md-4", "col-md-8",'Place of Receipt ', 'place_receipt_id', 'place_receipt_name', Request::get('term'),((isset($bill_of_lading) and $bill_of_lading->place_receipt_id > 0) ? $bill_of_lading->place_receipt_name->name : null), '') !!}</div>
        </div>
        <div class="col-md-4">

            <div class="row">{!! Form::bsDate("col-md-4", "col-md-8",'Departure', 'departure_date', null, '') !!}</div>
            <div class="row">{!! Form::bsDate("col-md-4", "col-md-8",'Arrival', 'arrival_date', null, '') !!}</div>
            <div class="row">{!! Form::bsSelect("col-md-4", "col-md-8", ' Terms', 'term_type', Sass\Incoterm::all()->lists('code', 'id'), null) !!}</div>
            <div class="row">{!! Form::bsText("col-md-4", "col-md-8",'Shipment # ', 'shipment_code',null,  '') !!}</div>
            <div class="row">{!! Form::bsComplete("col-md-4", "col-md-8",'Carrier', 'carrier_id', 'carrier_name', Request::get('term'),    ((isset($bill_of_lading) and $bill_of_lading->carrier_id > 0) ? $bill_of_lading->carrier->name : null), '') !!}</div>
        </div>
    </div>
</div>