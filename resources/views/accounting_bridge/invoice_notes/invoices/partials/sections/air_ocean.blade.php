<div class="row"><div class="col-md-12">{!! Form::bsSelect('col-md-3', 'col-md-3', 'Carrier Type', 'carrier_type', array('A' => 'AIRLINE','O' => 'OCEAN CARRIER', 'T' => 'TRUCK'), null) !!}</div>
</div>
<div class="row">
    <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Carrier', 'carrier_id', 'carrier_name', Request::get('term'), ((isset($invoice) and $invoice->bill_to_id > 0) ? $invoice->bill_to->name : null), 'Customers...') !!}</div>

</div>
<div class="row">
    <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Tail/Vessel', 'vessel_name', null, null) !!}</div>
    <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Flight/Voyage', 'voyage_name', null, null) !!}</div>
</div>
<div class="row">
    <div class="col-md-6">{!! Form::bsDate('col-md-6', 'col-md-6', 'Departure', 'departure_date', null, null) !!}</div>
    <div class="col-md-6">{!! Form::bsDate('col-md-6', 'col-md-6', 'Arrival', 'arrival_date', null, null) !!}</div>
</div>
<div class="row">
    <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Origin', 'origin_id', 'origin_name', Request::get('term'), ((isset($invoice) and $invoice->origin_id > 0) ? $invoice->origin->name : null), 'Airports') !!}</div>
</div>
<div class="row">
    <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Destination', 'destination_id', 'destination_name', Request::get('term'), ((isset($invoice) and $invoice->destination_id > 0) ? $invoice->destination->name : null), 'Airports') !!}</div>
</div>
<div class="row">
    <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Place Receipt', 'place_receipt_id', 'place_receipt_name', Request::get('term'), ((isset($invoice) and $invoice->origin_id > 0) ? $invoice->origin->name : null), 'World Location') !!}</div>
</div>
<div class="row">
    <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Ult. Destination', 'ultimate_destination_id', 'ultimate_destination_name', Request::get('term'), ((isset($invoice) and $invoice->ultimate_destination_id > 0) ? $invoice->ultimate_destination->name : null), 'World Location') !!}</div>
</div>
<div class="row">
    <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Commission Amount', 'commission_amount', null, null) !!}</div>
    <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Commisionable Amt', 'commissionable_amount', null, null) !!}</div>
</div>
<div class="row">
    <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Commission Adj', 'commission_adjust', null, null) !!}</div>
</div>
