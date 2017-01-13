<fieldset>
    <div class="col-md-6">
        <div class="row">{!! Form::bsText('col-md-3','col-md-5','BL #', 'bl_number',null, '') !!}</div>
        <div class="row">{!! Form::bsSelect('col-md-3','col-md-5', ' BL Type', 'bl_type', array('C' => 'Prepaid','P' => 'Collected'), 'Type') !!}</div>

        <div class="row">{!! Form::bsText('col-md-3','col-md-8','Reference', 'bl_reference',null, '') !!}</div>
        <div class="row">{!! Form::bsComplete('col-md-3','col-md-8','Agent ', 'agent_id', 'agent_name', Request::get('term'),
    ((isset($shipment_entry) and $shipment_entry->agent_id > 0) ? $shipment_entry->agent->name : null), 'Customers', null) !!}</div>
        <div class="row">{!! Form::bsComplete('col-md-3','col-md-8','Country Origin ', 'country_origin_id', 'country_origin_name', Request::get('term'),
    ((isset($shipment_entry) and $shipment_entry->country_origin_id > 0) ? $shipment_entry->country_origin->name : null), 'Country', null) !!}</div>
        <div class="row">{!! Form::bsComplete('col-md-3','col-md-8','Carrier ', 'carrier_id', 'carrier_name', Request::get('term'),
    ((isset($shipment_entry) and $shipment_entry->carrier_id > 0) ? $shipment_entry->carrier->name : null), 'Customers', null) !!}</div>
        <div class="row">{!! Form::bsDate('col-md-3','col-md-5','Departure', 'departure_date', null, '') !!}</div>
        <div class="row">{!! Form::bsDate('col-md-3','col-md-5','Arrival', 'arrival_date', null, '') !!}</div>
    </div>
    <div class="col-md-6">

        <div class="row">{!! Form::bsText('col-md-3','col-md-8','Vessel', 'vessel_name',null, '') !!}</div>
        <div class="row">{!! Form::bsText('col-md-3','col-md-8','Voyage', 'voyage_name',null, '') !!}</div>
        <div class="row">{!! Form::bsText('col-md-3','col-md-8','Customs. Reg.', 'custom_reg',null, '') !!}</div>
        <div class="row">
            <h4>Totals</h4>
        </div>
        <div class="row">
            <div class="col-md-2">{!! Form::bsText(null, null,'Quantity', 'total_quantity',null, '0') !!}</div>
            <div class="col-md-2">{!! Form::bsText(null, null,'# Houses', 'total_house',null, '0') !!}</div>
            <div class="col-md-2">{!! Form::bsText(null, null,'Cubic', 'total_cubic',null, '0.000') !!}</div>
            <div class="col-md-2">{!! Form::bsSelect(null, null, ' Kgs/ Lbs', 'total_weight_unit', array('K' => 'Kgs','L' => 'Lbs'), null) !!}</div>
            <div class="col-md-2">{!! Form::bsText(null, null,'Total Wght', 'total_weight',null, '0.000') !!}</div>
        </div>
    </div>
</fieldset>