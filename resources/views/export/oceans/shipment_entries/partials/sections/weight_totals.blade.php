<legend>Weight Totals</legend>
<div class="row row-padding">
    <div class="col-md-12">
        <div class="col-md-1">{{ Form::bsText(null, null, 'Quantity', 'total_quantity', null) }}</div>
        <div class="col-md-1">{!! Form::bsSelect(null, null, 'Kgs/Lbs', 'total_unit_weight', array('K' => 'Kgs','L' => 'Lbs'), null) !!}</div>
        <div class="col-md-1">{{ Form::bsText(null, null, 'T Weight', 'total_weight', null, '0.00') }}</div>
        <div class="col-md-1">{{ Form::bsText(null, null, 'Cubic', 'total_cubic', null, '0.00') }}</div>
        <div class="col-md-2"> {!! Form::bsComplete(null, null, 'Cargo Type', 'total_cargo_type_id', 'total_cargo_type_code', Request::get('term'), ((isset($shipment_entry) and $shipment_entry->total_cargo_type_id > 0) ? $shipment_entry->total_cargo_type->name : null), null) !!}</div>
        <div class="col-md-2"> {!! Form::bsComplete(null, null, 'Commodity', 'total_commodity_id', 'total_commodity_name', Request::get('term'), ((isset($shipment_entry) and $shipment_entry->total_commodity_id > 0) ? $shipment_entry->total_commodity->name : null), null, 'options.maintenance.items.commodities', 'options.maintenance.items.commodities', 'maintenance.items.commodities.index') !!}</div>
        <div class="col-md-2">{!! Form::bsSelect(null, null, 'F. Charges', 'freight_charges', array('C' => '1. COLLECTED','P' => '2. PREPAID'), null) !!}</div>
        <div class="col-md-2">{!! Form::bsSelect(null, null, 'O. Charges', 'other_charges', array('C' => '1. COLLECTED','P' => '2. PREPAID'), null) !!}</div>
    </div>
</div>