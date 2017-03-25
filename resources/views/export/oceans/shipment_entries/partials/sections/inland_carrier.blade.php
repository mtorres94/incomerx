<div class="row">
    <div class="col-md-4">{!! Form::bsComplete('col-md-4', 'col-md-8', 'Carrier', 'carrier_id', 'carrier_name', Request::get('term'), ((isset($shipment_entry) and $shipment_entry->carrier_id > 0) ? $shipment_entry->carrier->name : null), 'Carriers') !!}</div>
    <div class="col-md-4"> {!! Form::bsComplete('col-md-4', 'col-md-8', 'Inland Carrier', 'inland_carrier_id', 'inland_carrier_name', Request::get('term'), ((isset($shipment_entry) and $shipment_entry->inland_carrier_id > 0) ? $shipment_entry->inland_carrier->name : null), 'Inland Carrier') !!}</div>
  <!--  <div class="col-md-4"> {!! Form::bsText('col-md-4', 'col-md-8', 'License/ ID #', 'inland_lic_number', null, null) !!} </div>
    </div>-->