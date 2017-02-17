
<legend>Container Details</legend>
<div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
    <button type="button" id="btn_container_details" class="btn btn-default" data-toggle="modal" data-target="#Container_Details" onclick="cleanModalFields('Container_Details'), clearTable('cargo_details')">
        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
    </button>
    <button type="button"  class="btn btn-danger" onclick="clearTable('container_details'), clearTable('hidden_warehouse'), clearTable('hidden_cargo_details'), clearTable('hidden_hazardous')">
        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
    </button>
</div>

<table class="table table-bordered table-condensed" id="container_details">
    <thead>
    <tr>
        <th data-override="container_line" hidden></th>
        <th width="10%" data-override="equipment_type">Equipment type</th>
        <th width="10%" data-override="equipment_number">Equipment number.</th>
        <th width="10%" data-override="equipment_seal" >Equip. Seal</th>
        <th width="10%" data-override="order_number" >Order Number</th>
        <th width="10%" data-override="container_loaded volume">Loaded Cubic</th>
        <th width="10%" data-override="container_loaded_weight">Loaded Weight</th>
        <th width="10%"/>
    </tr>
    </thead>
    <tbody>
    @if(isset($cargo_loader))
        @foreach ($cargo_loader->container_details as $detail)
            <tr id="{{ $detail->line }}">
                {!! Form::bsRowTd($detail->line, 'container_line', $detail->line, true) !!}
                {!! Form::bsRowTd($detail->line, 'equipment_type_id', $detail->equipment_type_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'equipment_type_code', strtoupper($detail->equipment_type_id > 0 ? $detail->equipment_type->code : ""), false) !!}
                {!! Form::bsRowTd($detail->line, 'container_number', strtoupper($detail->container_number), false) !!}
                {!! Form::bsRowTd($detail->line, 'container_seal_number', $detail->container_seal_number, false) !!}
                {!! Form::bsRowTd($detail->line, 'container_seal_number2', $detail->container_seal_number_2, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_order_number', $detail->container_order_number, false) !!}

                {!! Form::bsRowTd($detail->line, 'container_comments', strtoupper($detail->container_comments), true) !!}
                {!! Form::bsRowTd($detail->line, 'cubic_max', $detail->cubic_max, true) !!}
                {!! Form::bsRowTd($detail->line, 'cubic_load', $detail->cubic_load, false) !!}
                {!! Form::bsRowTd($detail->line, 'cubic_load_p', $detail->cubic_load_p, true) !!}
                {!! Form::bsRowTd($detail->line, 'cubic_excess', $detail->cubic_excess, true) !!}
                {!! Form::bsRowTd($detail->line, 'pieces_loaded', $detail->pieces_loaded, true) !!}

                {!! Form::bsRowTd($detail->line, 'max_weight', $detail->max_weight, true) !!}
                {!! Form::bsRowTd($detail->line, 'weight_load', $detail->container_net_weight, false) !!}
                {!! Form::bsRowTd($detail->line, 'weight_load_p', $detail->weight_load_p, true) !!}
                {!! Form::bsRowTd($detail->line, 'weight_excess', $detail->weight_excess, true) !!}

                {!! Form::bsRowTd($detail->line, 'container_commodity_id', $detail->container_commodity_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_commodity_name', strtoupper($detail->container_commodity_id >0 ? $detail->container_commodity->name : ""), true) !!}
                {!! Form::bsRowTd($detail->line, 'pd_status', $detail->pd_status, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_spotting_date', $detail->spoting_date, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_pull_date', $detail->pull_date, true) !!}

                {!! Form::bsRowTd($detail->line, 'container_pickup_id', $detail->pickup_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_pickup_name', strtoupper($detail->pickup_id >0 ? $detail->pickup->name : ""), true) !!}
                {!! Form::bsRowTd($detail->line, 'container_pickup_type', $detail->pickup_type, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_pickup_address', strtoupper($detail->pickup_address), true) !!}
                {!! Form::bsRowTd($detail->line, 'container_pickup_city', $detail->pickup_city, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_pickup_state_id', $detail->pickup_state_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_pickup_state_name', strtoupper($detail->pickup_state_id >0 ? $detail->pickup_state->name : ""), true) !!}
                {!! Form::bsRowTd($detail->line, 'container_pickup_zip_code_id', $detail->pickup_zip_code_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_pickup_zip_code_code', strtoupper($detail->pickup_zip_code_id >0 ? $detail->pickup_zip_code->code: ""), true) !!}
                {!! Form::bsRowTd($detail->line, 'container_pickup_phone', $detail->pickup_phone, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_pickup_contact', $detail->pickup_contact, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_pickup_date', $detail->pickup_date, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_pickup_number', $detail->pickup_number, true) !!}

                {!! Form::bsRowTd($detail->line, 'container_delivery_id', $detail->delivery_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_delivery_name', strtoupper($detail->delivery_id >0 ? $detail->delivery->name : ""), true) !!}
                {!! Form::bsRowTd($detail->line, 'container_delivery_type', $detail->delivery_type, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_delivery_address', strtoupper($detail->delivery_address), true) !!}
                {!! Form::bsRowTd($detail->line, 'container_delivery_city', strtoupper($detail->delivery_city), true) !!}
                {!! Form::bsRowTd($detail->line, 'container_delivery_state_id', $detail->delivery_state_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_delivery_state_name', strtoupper($detail->delivery_state_id >0 ? $detail->delivery_state->name :  ""), true) !!}
                {!! Form::bsRowTd($detail->line, 'container_delivery_zip_code_id', $detail->delivery_zip_code_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_delivery_zip_code_code', strtoupper($detail->delivery_zip_code_id >0 ? $detail->delivery_zip_code->code: ""), true) !!}
                {!! Form::bsRowTd($detail->line, 'container_delivery_phone', $detail->delivery_phone, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_delivery_contact', $detail->delivery_contact, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_delivery_date', $detail->delivery_date, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_delivery_number', $detail->delivery_number, true) !!}

                {!! Form::bsRowTd($detail->line, 'container_drop_id', $detail->drop_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_drop_name', strtoupper($detail->drop_id >0 ? $detail->drop->name : ""), true) !!}
                {!! Form::bsRowTd($detail->line, 'container_drop_type', $detail->drop_type, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_drop_address', strtoupper($detail->drop_address), true) !!}
                {!! Form::bsRowTd($detail->line, 'container_drop_city', strtoupper($detail->drop_city), true) !!}
                {!! Form::bsRowTd($detail->line, 'container_drop_state_id', $detail->drop_state_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_drop_state_name', strtoupper($detail->drop_state_id >0? $detail->drop_state->name : ""), true) !!}
                {!! Form::bsRowTd($detail->line, 'container_drop_zip_code_id', $detail->drop_zip_code_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_drop_zip_code_code', strtoupper($detail->drop_zip_code_id >0 ? $detail->drop_zip_code->code : ""), true) !!}
                {!! Form::bsRowTd($detail->line, 'container_drop_phone', $detail->drop_phone, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_drop_contact', $detail->drop_contact, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_drop_date', $detail->drop_date, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_drop_number', $detail->drop_number, true) !!}

                {!! Form::bsRowTd($detail->line, 'container_hazardous_contact', $detail->container_hazardous_contact, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_hazardous_phone', $detail->container_hazardous_phone, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_degrees', $detail->container_degrees, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_max', $detail->container_max, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_min', $detail->container_min, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_ventilation', $detail->container_ventilation, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_temperature', $detail->container_temperature, true) !!}

                {!! Form::bsRowTd($detail->line, 'container_inner_code', $detail->container_inner_code, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_inner_quantity', $detail->container_inner_quantity, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_net_weight', $detail->container_net_weight, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_number_equipment', $detail->equipment_number, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_outer_code', $detail->outer_code, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_outer_quantity', $detail->outer_quantity, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_release_number', $detail->release_number, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_requested_equipment', $detail->requested_equipment, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_tare_weight', $detail->tare_weight, true) !!}
                {!! Form::bsRowTd($detail->line, 'total_weight_unit', $detail->total_weight_unit, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_carrier_id', $detail->carrier_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_carrier_name', strtoupper($detail->carrier_id >0 ? $detail->carrier->name : ""), true) !!}
                {!! Form::bsRowBtns() !!}
            </tr>
        @endforeach
    @endif


    </tbody>
</table>
<!--  WAREHOUSE -->
<table id="hidden_warehouse" class="hidden">
    <tbody>
    @if(isset($cargo_loader))
        @foreach ($cargo_loader->pivote as $pivot)

               <tr data-id="{!! $pivot->container_line !!}">
                   {!! Form::bsRowTd($pivot->line, 'hidden_container_id',  $pivot->container_line, true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_warehouse_line', $pivot->receipt_entry->id, true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_warehouse_number', $pivot->receipt_entry->code, true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_date_in', $pivot->receipt_entry->date_in, true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_shipper_id', $pivot->receipt_entry->shipper_id, true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_shipper_name', strtoupper($pivot->receipt_entry->shipper_id >0 ? $pivot->receipt_entry->shipper->name : null), true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_shipper_address', strtoupper($pivot->receipt_entry->shipper_address), true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_shipper_city', strtoupper($pivot->receipt_entry->shipper_city), true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_shipper_state_id', $pivot->receipt_entry->shipper_state_id, true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_shipper_state_name',strtoupper($pivot->receipt_entry->shipper_state_id >0 ? $pivot->receipt_entry->shipper_state->name : null), true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_shipper_zip_code_id', $pivot->receipt_entry->shipper_zip_code_id, true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_shipper_zip_code_code', ($pivot->receipt_entry->shipper_zip_code_id >0 ? $pivot->receipt_entry->shipper_zip_code->code : null), true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_shipper_phone', $pivot->receipt_entry->shipper_phone, true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_shipper_fax', $pivot->receipt_entry->shipper_fax, true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_consignee_id', $pivot->receipt_entry->consignee_id, true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_consignee_name', strtoupper($pivot->receipt_entry->consignee_id >0 ? $pivot->receipt_entry->consignee->name : null), true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_consignee_address', $pivot->receipt_entry->consignee_address, true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_consignee_city', $pivot->receipt_entry->consignee_city, true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_consignee_state_id', $pivot->receipt_entry->consignee_state_id, true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_consignee_state_name', ($pivot->receipt_entry->consignee_state_id >0 ? $pivot->receipt_entry->consignee_state->name : null), true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_consignee_zip_code_id', $pivot->receipt_entry->consignee_zip_code_id, true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_consignee_zip_code_code',($pivot->receipt_entry->consignee_zip_code_id >0 ? $pivot->receipt_entry->consignee_zip_code->code: null), true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_consignee_phone', $pivot->receipt_entry->consignee_phone, true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_consignee_fax', $pivot->receipt_entry->consignee_fax, true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_box_number', "", true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_destination_name', ($pivot->receipt_entry->location_destination_id > 0 ? $pivot->receipt_entry->destination->name : ""), true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_status', $pivot->receipt_entry->status, true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_ship_inst_number', "", true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_sum_pieces', $pivot->receipt_entry->sum_pieces, true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_sum_weight', $pivot->receipt_entry->sum_weight, true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_sum_cubic', $pivot->receipt_entry->sum_cubic, true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_sum_volume_weight', $pivot->receipt_entry->sum_volunme_weight, true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_warehouse_id', $pivot->receipt_entry->warehouse_id, true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_warehouse_code', ($pivot->receipt_entry->warehouse_id >0 ?$pivot->receipt_entry->warehouse->name : null ), true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_flag', $pivot->group_by, true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hidden_receipt_entry', $pivot->receipt_entry->id, true) !!}
                   {!! Form::bsRowTd($pivot->line, 'hbl_line_id', '0' , true) !!}
                   {!! Form::bsRowTd($pivot->line, 'equipment_type_code', "", true) !!}
                   {!! Form::bsRowTd($pivot->line, 'container_number',"", true) !!}
                   {!! Form::bsRowTd($pivot->line, 'container_seal_number', "", true) !!}

               </tr>
            @endforeach

    @endif
    </tbody>
</table>

<!--  CARGO DETAILS-->
<table id="hidden_cargo_details" class="hidden">
    <tbody>
    @if(isset($cargo_loader))
        @foreach ($cargo_loader->pivote as $pivot)
            @foreach ($pivot->receipt_entry_details as $detail)

                <tr data-id="{{ $pivot->receipt_entry->code}}">
                {!! Form::bsRowTd($detail->line, 'details_id', $pivot->receipt_entry->code, true) !!}
                {!! Form::bsRowTd($detail->line, 'details_line', $detail->line, true) !!}
                {!! Form::bsRowTd($detail->line, 'details_quantity', $detail->quantity, true) !!}
                {!! Form::bsRowTd($detail->line, 'details_cargo_type_id', $detail->cargo_type_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'details_cargo_type_code', ($detail->cargo_type_id >0 ? $detail->cargo_type->code : null), true) !!}
                {!! Form::bsRowTd($detail->line, 'details_pieces', $detail->pieces, true) !!}
                {!! Form::bsRowTd($detail->line, 'details_weight_unit_measurement_id', $detail->weight_unit_measurement_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'details_metric_unit_measurement_id', $detail->metric_unit_measurement_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'details_length', $detail->length, true) !!}
                {!! Form::bsRowTd($detail->line, 'details_width', $detail->width, true) !!}
                {!! Form::bsRowTd($detail->line, 'details_height', $detail->height, true) !!}
                {!! Form::bsRowTd($detail->line, 'details_total_weight', $detail->total_weight, true) !!}
                {!! Form::bsRowTd($detail->line, 'details_total_cubic', $detail->cubic, true) !!}
                {!! Form::bsRowTd($detail->line, 'details_vol_weight', $detail->volume_weight, true) !!}
                {!! Form::bsRowTd($detail->line, 'details_location_id', $detail->location_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'details_location_name',($detail->location_id >0 ? $detail->location->name: null), true) !!}
                {!! Form::bsRowTd($detail->line, 'details_location_bin_id', $detail->location_bin_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'details_location_bin_name', ($detail->location_bin_id >0 ? $detail->bin->name: null), true) !!}
                {!! Form::bsRowTd($detail->line, 'details_material', $detail->material_description, true) !!}
                {!! Form::bsRowTd($detail->line, 'details_dim_fact', $detail->dim_fact, true) !!}
                {!! Form::bsRowTd($detail->line, 'details_square_foot', "", true) !!}
                {!! Form::bsRowTd($detail->line, 'details_unit_weight', "", true) !!}
                {!! Form::bsRowTd($detail->line, 'details_tare_weight', $detail->tare_weight, true) !!}
                {!! Form::bsRowTd($detail->line, 'details_net_weight', $detail->net_weight, true) !!}
            @endforeach
        @endforeach
    @endif
    </tbody>
</table>

<!--  HAZARDOUS -->
<table id="hidden_hazardous" class="hidden">
    <tbody>
    @if(isset($cargo_loader))
        @foreach ($cargo_loader->hazardous_details as $detail)
            <tr id="{{ $detail->line }}">
            {!! Form::bsRowTd($detail->line, 'hzd_container_id', $detail->container_id, true) !!}
            {!! Form::bsRowTd($detail->line, 'hzd_uns_id', $detail->hzd_uns_id, true) !!}
            {!! Form::bsRowTd($detail->line, 'hzd_line', $detail->line, true) !!}
            {!! Form::bsRowTd($detail->line, 'hzd_uns_code', ($detail->hzd_uns_id >0 ? $detail->hzd_uns->code : null), true) !!}
            {!! Form::bsRowTd($detail->line, 'hzd_uns_desc', $detail->hzd_uns_desc, true) !!}
            {!! Form::bsRowTd($detail->line, 'hzd_uns_note', $detail->hzd_uns_note, true) !!}
        @endforeach
    @endif
    </tbody>
</table>
