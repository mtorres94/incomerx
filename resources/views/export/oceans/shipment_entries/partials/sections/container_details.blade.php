<legend>Container Details</legend>
<div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
    <button type="button" id="btn_container_details" class="btn btn-default" data-toggle="modal" data-target="#Container_Details" onclick="cleanModalFields('Container_Details'), clearTableCondition('hazardous_details')">
        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
    </button>
    <button type="button"  class="btn btn-danger" id="delete_container">
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
        <th width="10%" data-override="container_unit">Unit</th>
        <th width="10%" data-override="container_status">Status ID</th>
        <th width="10%" data-override="container_weight"> Weight</th>

        <th width="12%"/>
    </tr>
    </thead>
    <tbody>
    @if(isset($shipment_entry))
        @foreach($shipment_entry->container as $detail)
            <tr id="{{ $detail->line }}">
            {!! Form::bsRowTd($detail->line, 'container_line', $detail->line, true) !!}
            {!! Form::bsRowTd($detail->line, 'equipment_type_id', $detail->equipment_type_id, true) !!}
            {!! Form::bsRowTd($detail->line, 'equipment_type_code', ($detail->equipment_type_id >0? $detail->equipment_type->code : "" ), false) !!}
            {!! Form::bsRowTd($detail->line, 'container_number', $detail->container_number, false) !!}
            {!! Form::bsRowTd($detail->line, 'container_seal_number', $detail->container_seal_number, false) !!}
            {!! Form::bsRowTd($detail->line, 'total_weight_unit', $detail->total_weight_unit, false) !!}
            {!! Form::bsRowTd($detail->line, 'container_seal_number2', $detail->container_seal_number2, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_commodity_id', strtoupper($detail->container_commodity), true) !!}
            {!! Form::bsRowTd($detail->line, 'container_commodity_name', strtoupper($detail->container_commodity) , true) !!}
            {!! Form::bsRowTd($detail->line, 'pd_status', $detail->pd_status, false) !!}
            {!! Form::bsRowTd($detail->line, 'container_spotting_date', $detail->spotting_date, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_pull_date', $detail->pull_date, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_carrier_id', $detail->carrier_id, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_carrier_name',($detail->carrier_id >0 ? $detail->carrier->name: ""), true) !!}
            {!! Form::bsRowTd($detail->line, 'container_ventilation', $detail->ventilation, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_degrees', $detail->degrees, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_temperature', $detail->temperature, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_max', $detail->temperature_max, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_min', $detail->temperature_min, true) !!}

            {!! Form::bsRowTd($detail->line, 'container_pickup_id', $detail->pickup_id, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_pickup_name', ($detail->pickup_id >0 ? $detail->pickup->name : ""), true) !!}
            {!! Form::bsRowTd($detail->line, 'container_pickup_type', $detail->pickup_type, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_pickup_address', $detail->pickup_address, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_pickup_city', $detail->pickup_city, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_pickup_state_id', $detail->pickup_state_id, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_pickup_state_name', ($detail->pickup_state_id >0 ? $detail->pickup_state->name : ""), true) !!}
            {!! Form::bsRowTd($detail->line, 'container_pickup_zip_code_id', $detail->pickup_zip_code_id, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_pickup_zip_code_code', ($detail->pickup_zip_code_id >0 ? $detail->pickup_zip_code->code : ""), true) !!}
            {!! Form::bsRowTd($detail->line, 'container_pickup_phone', $detail->pickup_phone, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_pickup_contact', $detail->pickup_contact, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_pickup_date', $detail->pickup_date, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_pickup_number', $detail->pickup_number, true) !!}

            {!! Form::bsRowTd($detail->line, 'container_delivery_id', $detail->delivery_id, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_delivery_name', ($detail->delivery_id >0 ? $detail->delivery->name: ""), true) !!}
            {!! Form::bsRowTd($detail->line, 'container_delivery_type', $detail->delivery_type, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_delivery_address', $detail->delivery_address, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_delivery_city', $detail->delivery_city, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_delivery_state_id', $detail->delivery_state_id, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_delivery_state_name', ($detail->delivery_state_id >0 ? $detail->delivery_state->name : ""), true) !!}
            {!! Form::bsRowTd($detail->line, 'container_delivery_zip_code_id', $detail->delivery_zip_code_id, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_delivery_zip_code_code', ($detail->delivery_zip_code_id >0 ? $detail->delivery_zip_code->code : ""), true) !!}
            {!! Form::bsRowTd($detail->line, 'container_delivery_phone', $detail->delivery_phone, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_delivery_contact', $detail->delivery_contact, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_delivery_date', $detail->delivery_date, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_delivery_number', $detail->delivery_number, true) !!}

            {!! Form::bsRowTd($detail->line, 'container_drop_id', $detail->drop_id, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_drop_name', ($detail->drop_id >0 ? $detail->drop->name : ""), true) !!}
            {!! Form::bsRowTd($detail->line, 'container_drop_type', $detail->drop_type, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_drop_address', $detail->drop_address, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_drop_city', $detail->drop_city, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_drop_state_id', $detail->drop_state_id, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_drop_state_name', ($detail->drop_state_id >0 ? $detail->drop_state->name : ""), true) !!}
            {!! Form::bsRowTd($detail->line, 'container_drop_zip_code_id', $detail->drop_zip_code_id, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_drop_zip_code_code', ($detail->drop_zip_code_id >0 ? $detail->drop_zip_code->code: ""), true) !!}
            {!! Form::bsRowTd($detail->line, 'container_drop_phone', $detail->drop_phone, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_drop_contact', $detail->drop_contact, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_drop_date', $detail->drop_date, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_drop_number', $detail->drop_number, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_hazardous_contact', $detail->hazardous_contact, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_hazardous_phone', $detail->hazardous_phone, true) !!}

            {!! Form::bsRowTd($detail->line, 'container_inner_code', $detail->inner_code, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_inner_quantity', $detail->inner_quantity, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_net_weight', $detail->net_weight, false) !!}
            {!! Form::bsRowTd($detail->line, 'container_number_equipment', $detail->number_equipment, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_outer_code', $detail->outer_code, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_outer_quantity', $detail->outer_quantity, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_release_number', $detail->release_number, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_requested_equipment', $detail->requested_equipment, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_tare_weight', $detail->tare_weight, true) !!}
            {!! Form::bsRowTd($detail->line, 'comments', $detail->container_comments, true) !!}
            {!! Form::bsRowBtns() !!}
            </tr>
        @endforeach
    @endif

    </tbody>
</table>

<table class="table hidden" id="hzd_details">
    <tbody>
    @if(isset($shipment_entry))
        @foreach($shipment_entry->hazardous as $detail)
            <tr id="{{ $detail->line }}">
                {!! Form::bsRowTd($detail->line, 'hzd_container_id', $detail->container_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'hzd_line', $detail->line, true) !!}
                {!! Form::bsRowTd($detail->line, 'hzd_uns_id', $detail->hzd_uns_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'hzd_uns_code',strtoupper(($detail->hzd_uns_id >0) ? $detail->hzd_uns->name: null), true) !!}
                {!! Form::bsRowTd($detail->line, 'hzd_uns_desc', strtoupper($detail->hzd_uns_desc), true) !!}
                {!! Form::bsRowTd($detail->line, 'hzd_uns_note', strtoupper($detail->hzd_uns_note), true) !!}
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

