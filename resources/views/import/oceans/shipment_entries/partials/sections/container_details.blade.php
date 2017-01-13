<legend>Container Details</legend>
<div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
    <button type="button" id="btn_container_details" class="btn btn-default" data-toggle="modal" data-target="#Container_Details" onclick="cleanModalFields('Container_Details')">
        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
    </button>
    <button type="button"  class="btn btn-danger" onclick="clearTable('container_details'), clearTable('hazardous-details')">
        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
    </button>
</div>

<table class="table table-bordered table-condensed" id="container_details">
    <thead>
    <tr>
        <th data-override="container_line" hidden></th>
        <th width="15%" data-override="equipment_type">Equipment type</th>
        <th width="15%" data-override="equipment_number">Equipment number.</th>
        <th width="15%" data-override="equipment_seal" >Equip. Seal</th>
        <th width="15%" data-override="container_pickup">Pick up</th>
        <th width="15%" data-override="container_delivery">Delivery</th>
        <th width="15%" data-override="container_drop"> Drop</th>
        <th width="10%"/>
    </tr>
    </thead>
    <tbody>
    @if(isset($shipment_entry))
        @foreach ($shipment_entry->container_details as $detail)

            <tr id="{{ $detail->line }}">
            {!! Form::bsRowTd($detail->line, 'container_line', $detail->line, true) !!}
            {!! Form::bsRowTd($detail->line, 'equipment_type_id', $detail->equipment_type_id, true) !!}
            {!! Form::bsRowTd($detail->line, 'equipment_type_code', ($detail->equipment_type_id >0? $detail->equipment_type->code: null), false) !!}
            {!! Form::bsRowTd($detail->line, 'container_number', $detail->container_number, false) !!}
            {!! Form::bsRowTd($detail->line, 'container_seal_number', $detail->container_seal_number, false) !!}
            {!! Form::bsRowTd($detail->line, 'container_seal_number_2', $detail->container_seal_number2, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_commodity_id', $detail->container_commodity_id, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_commodity_name', ($detail->container_commodity_id >0 ? $detail->container_commodity->name : null), true) !!}
            {!! Form::bsRowTd($detail->line, 'container_status', $detail->container_status, false) !!}
            {!! Form::bsRowTd($detail->line, 'container_spotting_date', $detail->container_spotting_date, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_pull_date', $detail->container_pull_date, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_carrier_id', $detail->container_carrier_id, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_carrier_name', ($detail->container_carrier_id > 0? $detail->container_carrier->name : null), true) !!}
            {!! Form::bsRowTd($detail->line, 'container_ventilation', $detail->container_ventilation, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_degrees', $detail->container_degrees, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_temperature', $detail->container_temperature, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_max', $detail->container_max, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_min', $detail->container_min, true) !!}

            {!! Form::bsRowTd($detail->line, 'container_pickup_id', $detail->container_pickup_id, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_pickup_name',($detail->container_pickup_id > 0 ? $detail->container_pickup->name : null) , false) !!}
            {!! Form::bsRowTd($detail->line, 'container_pickup_type', $detail->container_pickup_type, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_pickup_address', $detail->container_pickup_address, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_pickup_city', $detail->container_pickup_city, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_pickup_state_id', $detail->container_pickup_state_id, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_pickup_state_name', ($detail->container_pickup_state_id > 0? $detail->container_pickup_state->name : null), true) !!}
            {!! Form::bsRowTd($detail->line, 'container_pickup_zip_code_id', $detail->container_pickup_zip_code_id, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_pickup_zip_code_code',($detail->container_pickup_zip_code_id >0 ? $detail->container_pickup_zip_code->code: null), true) !!}
            {!! Form::bsRowTd($detail->line, 'container_pickup_phone', $detail->container_pickup_phone, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_pickup_contact', $detail->container_pickup_contact, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_pickup_date', $detail->container_pickup_date, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_pickup_number', $detail->container_pickup_number, true) !!}

            {!! Form::bsRowTd($detail->line, 'container_delivery_id', $detail->container_delivery_id, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_delivery_name', ($detail->container_delivery_id >0 ? $detail->container_delivery->name : null), false) !!}
            {!! Form::bsRowTd($detail->line, 'container_delivery_type', $detail->container_delivery_type, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_delivery_address', $detail->container_delivery_address, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_delivery_city', $detail->container_delivery_city, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_delivery_state_id',$detail->container_delivery_state_id, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_delivery_state_name', ($detail->container_delivery_state_id >0 ? $detail->container_delivery_state->name : null), true) !!}
            {!! Form::bsRowTd($detail->line, 'container_delivery_zip_code_id', $detail->container_delivery_zip_code_id, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_delivery_zip_code_code',($detail->container_delivery_zip_code_id >0 ? $detail->container_delivery_zip_code->code : null), true) !!}
            {!! Form::bsRowTd($detail->line, 'container_delivery_phone', $detail->container_delivery_phone, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_delivery_contact', $detail->container_delivery_contact, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_delivery_date', $detail->container_delivery_date, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_delivery_drop_off', $detail->container_delivery_drop_off, true) !!}

            {!! Form::bsRowTd($detail->line, 'container_drop_id', $detail->container_drop_id, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_drop_name', $detail->container_drop_name, false) !!}
            {!! Form::bsRowTd($detail->line, 'container_drop_type', $detail->container_drop_type, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_drop_address', $detail->container_drop_address, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_drop_city', $detail->container_drop_city, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_drop_state_id', $detail->container_drop_state_id, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_drop_state_name', ($detail->container_drop_state_id >0? $detail->container_drop_state->name : null), true) !!}
            {!! Form::bsRowTd($detail->line, 'container_drop_zip_code_id', $detail->container_drop_zip_code_id, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_drop_zip_code_code', ($detail->container_drop_zip_code_id >0 ? $detail->container_drop_zip_code->code : null), true) !!}
            {!! Form::bsRowTd($detail->line, 'container_drop_phone', $detail->container_drop_phone, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_drop_contact', $detail->container_drop_contact, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_drop_date', $detail->container_drop_date, true) !!}
            {!! Form::bsRowTd($detail->line, 'container_comments', $detail->container_comments, true) !!}
            {!! Form::bsRowBtns() !!}

        @endforeach
    @endif

    </tbody>
</table>
