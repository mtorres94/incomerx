<fieldset id="additional_section">
    <legend>Destinations</legend>
    <div class="form-horizontal">
        <div class="row">
            {!! Form::bsSelect('col-md-3', 'col-md-6', 'Mode', 'mode', array(
                'A' => 'AIR',
                'O' => 'OCEAN',
                'W' => 'WAREHOUSE',
                'R' => 'TRUCK',
                'T' => 'TBA'), 'Mode...') !!}
        </div>
        <div class="row">
            {!! Form::bsComplete('col-md-3', 'col-md-6', 'Warehouse', 'warehouse_id', 'warehouse_name', Request::get('term'),
((isset($wr_entry) and $wr_entry->warehouse_id > 0) ? $wr_entry->warehouse->name : null), 'Warehouse...') !!}
        </div>
        <div class="row">
            {!! Form::bsComplete('col-md-3', 'col-md-9', 'Origin', 'location_origin_id', 'location_origin_name', Request::get('term'),
((isset($wr_entry) and $wr_entry->location_origin_id > 0) ? $wr_entry->location_origin->name : null), 'Airports...') !!}
        </div>
        <div class="row">
            {!! Form::bsComplete('col-md-3', 'col-md-9', 'Destination', 'location_destination_id', 'location_destination_name', Request::get('term'),
((isset($wr_entry) and $wr_entry->location_destination_id > 0) ? $wr_entry->location_destination->name : null), 'Airports...') !!}
        </div>
        <div class="row">
            {!! Form::bsComplete('col-md-3', 'col-md-9', 'Dest. Country', 'location_country_id', 'location_country_name', Request::get('term'),
((isset($wr_entry) and $wr_entry->location_country_id > 0) ? $wr_entry->location_country->name : null), 'Countries...') !!}
        </div>
        <div class="row">
            {!! Form::bsComplete('col-md-3', 'col-md-9', 'Ult. Destination', 'location_world_location_id', 'location_world_location_name', Request::get('term'),
((isset($wr_entry) and $wr_entry->location_world_location_id > 0) ? $wr_entry->location_world_location->name : null), 'World locations...') !!}
        </div>
        <div class="row">
            {!! Form::bsComplete('col-md-3', 'col-md-9', 'Service', 'location_service_id', 'location_service_name', Request::get('term'),
((isset($wr_entry) and $wr_entry->location_service_id > 0) ? $wr_entry->location_service->name : null), 'Services...') !!}
        </div>
    </div>
</fieldset>