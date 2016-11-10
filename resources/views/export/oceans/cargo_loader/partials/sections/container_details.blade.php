
<legend>Container Details</legend>
<div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
    <button type="button" id="btn_container_details" class="btn btn-default" data-toggle="modal" data-target="#Container_Details" onclick="cleanModalFields('Container_Details'), clearTable('cargo_details')">
        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
    </button>
    <button type="button"  class="btn btn-danger" onclick="clearTable('container_details')">
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
        <th width="10%" data-override="container_max_volume">Max volume</th>
        <th width="10%" data-override="container_loaded volume">Loaded Vol </th>
        <th width="10%" data-override="container_mas_weight">Max Weight</th>
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
                {!! Form::bsRowTd($detail->line, 'equipment_type_code', ($detail->equipment_type_id >0? $detail->equipment_type->code : null) , false) !!}
                {!! Form::bsRowTd($detail->line, 'container_number', $detail->container_number, false) !!}
                {!! Form::bsRowTd($detail->line, 'container_seal_number', $detail->container_seal_number, false) !!}
                {!! Form::bsRowTd($detail->line, 'container_seal_number2', $detail->container_seal_number_2, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_order_number', $detail->container_order_number, false) !!}
                {!! Form::bsRowTd($detail->line, 'container_hazardous_contact', $detail->container_hazardous_contact, true) !!}
                {!! Form::bsRowTd($detail->line, 'container_hazardous_phone', $detail->container_hazardous_phone, true) !!}
                {!! Form::bsRowTd($detail->line, 'hazardous_degrees', $detail->container_degrees, true) !!}
                {!! Form::bsRowTd($detail->line, 'hazardous_max', $detail->container_max, true) !!}
                {!! Form::bsRowTd($detail->line, 'hazardous_min', $detail->container_min, true) !!}
                {!! Form::bsRowTd($detail->line, 'hazardous_temperature', $detail->container_temperature, true) !!}
                {!! Form::bsRowTd($detail->line, 'comments_instructions', $detail->container_comments, true) !!}
                {!! Form::bsRowTd($detail->line, 'cubic_max', $detail->cubic_max, false) !!}
                {!! Form::bsRowTd($detail->line, 'cubic_load', $detail->cubic_load, false) !!}
                {!! Form::bsRowTd($detail->line, 'cubic_load_p', $detail->cubic_load_p, true) !!}
                {!! Form::bsRowTd($detail->line, 'cubic_excess', $detail->cubic_excess, true) !!}
                {!! Form::bsRowTd($detail->line, 'pieces_loaded', $detail->pieces_loaded, true) !!}
                {!! Form::bsRowTd($detail->line, 'total_weight_unit', $detail->total_weight_unit, true) !!}
                {!! Form::bsRowTd($detail->line, 'max_weight', $detail->max_weight, false) !!}
                {!! Form::bsRowTd($detail->line, 'weight_load', $detail->weight_load, false) !!}
                {!! Form::bsRowTd($detail->line, 'weight_load_p', $detail->weight_load_p, true) !!}
                {!! Form::bsRowTd($detail->line, 'weight_excess', $detail->weight_excess, true) !!}
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
        @foreach ($cargo_loader->warehouse_details as $detail)
            <tr data-id="{{ $detail->container_id }}">
                {!! Form::bsRowTd($detail->line, 'hidden_container_id', $detail->container_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_warehouse_line', $detail->line, true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_warehouse_number', $detail->warehouse_number, true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_date_in', $detail->date_in, true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_shipper_id', $detail->shipper_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_shipper_name', ($detail->shipper_id >0 ? $detail->shipper->name : null), true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_shipper_city', $detail->shipper_city, true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_shipper_state_id', $detail->shipper_state_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_shipper_state_name',($detail->shipper_state_id >0 ? $detail->shipper_state->name : null), true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_shipper_zip_code_id', $detail->shipper_zip_code_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_shipper_zip_code_code', ($detail->shipper_zip_code_id >0 ? $detail->shipper_zip_code->code : null), true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_shipper_phone', $detail->shipper_phone, true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_shipper_fax', $detail->shipper_fax, true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_consignee_id', $detail->consignee_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_consignee_name', ($detail->consignee_id >0 ? $detail->consignee->name : null), true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_consignee_city', $detail->consignee_city, true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_consignee_state_id', $detail->consignee_state_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_consignee_state_name', ($detail->consignee_state_id >0 ? $detail->consignee_state->name : null), true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_consignee_zip_code_id', $detail->consignee_zip_code_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_consignee_zip_code_code',($detail->consignee_zip_code_id >0 ? $detail->consignee_zip_code->code: null), true) !!}

                {!! Form::bsRowTd($detail->line, 'hidden_consignee_phone', $detail->consignee_phone, true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_consignee_fax', $detail->consignee_fax, true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_box_number', $detail->box_number, true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_destination_name', $detail->desination_name, true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_status', $detail->status, true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_ship_inst_number', $detail->ship_inst_number, true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_sum_pieces', $detail->sum_pieces, true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_sum_weight', $detail->sum_weight, true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_sum_cubic', $detail->sum_cubic, true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_sum_volume_weight', $detail->sum_volunme_weight, true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_warehouse_id', $detail->warehouse_id, true) !!}
                {!! Form::bsRowTd($detail->line, 'hidden_warehouse_code', ($detail->warehouse_id >0 ?$detail->warehouse->name : null ), true) !!}
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

<!--  CARGO DETAILS-->
<table id="hidden_cargo_details" class="hidden">
    <tbody>
    @if(isset($cargo_loader))
        @foreach ($cargo_loader->cargo_details as $detail)
            <tr data-id="{{ $detail->cargo_id }}">
            {!! Form::bsRowTd($detail->line, 'details_id', $detail->cargo_id, true) !!}
            {!! Form::bsRowTd($detail->line, 'details_line', $detail->line, true) !!}
            {!! Form::bsRowTd($detail->line, 'details_quantity', $detail->quantity, true) !!}
            {!! Form::bsRowTd($detail->line, 'details_cargo_type_id', $detail->cargo_type_id, true) !!}
            {!! Form::bsRowTd($detail->line, 'details_cargo_type_code', ($detail->cargo_type_id >0 ? $detail->cargo_type->code : null), true) !!}
            {!! Form::bsRowTd($detail->line, 'details_pieces', $detail->pieces, true) !!}
            {!! Form::bsRowTd($detail->line, 'details_metric_unit', $detail->metric_unit, true) !!}
            {!! Form::bsRowTd($detail->line, 'details_length', $detail->length, true) !!}
            {!! Form::bsRowTd($detail->line, 'details_width', $detail->width, true) !!}
            {!! Form::bsRowTd($detail->line, 'details_height', $detail->height, true) !!}
            {!! Form::bsRowTd($detail->line, 'details_total_weight', $detail->total_weight, true) !!}
            {!! Form::bsRowTd($detail->line, 'details_total_cubic', $detail->cubic, true) !!}
            {!! Form::bsRowTd($detail->line, 'details_vol_weight', $detail->volume_weight, true) !!}
            {!! Form::bsRowTd($detail->line, 'details_location_id', $detail->location_id, true) !!}
            {!! Form::bsRowTd($detail->line, 'details_location_name',($detail->location_id >0 ? $detail->location->name: null), true) !!}
            {!! Form::bsRowTd($detail->line, 'details_location_bin_id', $detail->location_bin_id, true) !!}
            {!! Form::bsRowTd($detail->line, 'details_location_bin_name', ($detail->location_bin_id >0 ? $detail->location_bin->name: null), true) !!}
            {!! Form::bsRowTd($detail->line, 'details_material', $detail->material_description, true) !!}
            {!! Form::bsRowTd($detail->line, 'details_dim_fact', $detail->dim_fact, true) !!}
            {!! Form::bsRowTd($detail->line, 'details_square_foot', $detail->square_foot, true) !!}
            {!! Form::bsRowTd($detail->line, 'details_unit_weight', $detail->unit_weight, true) !!}
            {!! Form::bsRowTd($detail->line, 'details_tare_weight', $detail->tare_weight, true) !!}
            {!! Form::bsRowTd($detail->line, 'details_net_weight', $detail->net_weight, true) !!}
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
