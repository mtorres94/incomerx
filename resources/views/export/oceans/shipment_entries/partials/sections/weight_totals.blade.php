<legend>Weight Totals</legend>
<div class="row row-panel">
    <div class="col-md-1">{!! Form::bsText(null,null, 'Qty', 'total_quantity', null, '0') !!}</div>
    <div class="col-md-1">{!! Form::bsSelect(null, null, 'Kgs/Lbs.', 'total_weight_unit_measurement',  array('K' => 'KGS','L' => 'LBS' ), null)!!}</div>
    <div class="col-md-1">{!! Form::bsText(null,null, 'Total Wght', 'total_weight', null, '0.000') !!}</div>
    <div class="col-md-1">{!! Form::bsText(null,null, 'Cubic', 'total_cubic', null, '0.000') !!}</div>
    <div class="col-md-1">{!! Form::bsSelect(null, null, 'Dim fact', 'total_dim_fact', array('I' => 'INT','D' => 'DOM' ), null) !!}</div>
    <div class="col-md-1">{!! Form::bsText(null,null, 'Vol. Weight', 'total_volume_weight', null, '0.000') !!}</div>
    <div class="col-md-2">{!! Form::bsComplete(null, null,'Cargo Type', 'total_cargo_type_id', 'total_cargo_type_code', Request::get('term'), ((isset($shipment_entry) and $shipment_entry->total_cargo_type > 0) ? $shipment_entry->total_cargo_type->code : null), 'Type') !!}</div>

    <div class="col-md-2">{!! Form::bsComplete(null, null,'Commodity', 'total_commodity_id', 'total_commodity_name', Request::get('term'), ((isset($shipment_entry) and $shipment_entry->total_commodity_id > 0) ? $shipment_entry->total_commodity->code : null), 'Commodity') !!}</div>


    <div class="col-md-1">{!! Form::bsSelect(null, null, 'Freight Chrgs.', 'total_freight_charge',  array('C' => 'C - COLLECTED','P' => 'P - PREPAID' ), null)!!}</div>
    <div class="col-md-1">{!! Form::bsSelect(null, null, 'Other Chrgs', 'total_other_charge',  array('C' => 'C - COLLECTED','P' => 'P - PREPAID' ), null)!!}</div>

</div>
