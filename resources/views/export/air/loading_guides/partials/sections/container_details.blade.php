
<legend>Container Details</legend>
<div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
    <button type="button" id="btn_container_details" class="btn btn-default" data-toggle="modal" data-target="#container_details" onclick="cleanModalFields('container_details')">
        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
    </button>
    <button type="button"  class="btn btn-danger" id= "delete_container" >
        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
    </button>
</div>

<table class="table table-bordered table-condensed" id="containers">
    <thead>
    <tr>
        <th hidden></th>
        <th width="10%" >Equipment type</th>
        <th width="10%" >Equipment number.</th>
        <th width="10%" >Equip. Seal</th>
        <th width="10%" >Order Number</th>
        <th width="10%" >Loaded Cubic</th>
        <th width="10%" >Loaded Weight</th>
        <th width="10%" >Reference</th>
        <th width="10%"/>
    </tr>
    </thead>
    <tbody>
        @if(isset($loading_guide))
            @foreach($loading_guide->container as $detail )
                <tr id="{{ $detail->line }}">
                    {!! Form::bsRowTd($detail->line, 'container_line', $detail->line, true) !!}
                    {!! Form::bsRowTd($detail->line, 'equipment_type_id', $detail->equipment_type_id, true) !!}
                    {!! Form::bsRowTd($detail->line, 'equipment_type_code',strtoupper($detail->equipment_type_id > 0 ? $detail->equipment_type->code : ""), false) !!}
                    {!! Form::bsRowTd($detail->line, 'container_number', $detail->container_number, false) !!}
                    {!! Form::bsRowTd($detail->line, 'container_seal_number', $detail->seal_number, false) !!}
                    {!! Form::bsRowTd($detail->line, 'container_seal_number2', $detail->seal_number2, true) !!}
                    {!! Form::bsRowTd($detail->line, 'container_order_number', $detail->order_number, false) !!}
                    {!! Form::bsRowTd($detail->line, 'cubic_max', $detail->cubic_max, true) !!}
                    {!! Form::bsRowTd($detail->line, 'cubic_load', $detail->cubic_load, false) !!}
                    {!! Form::bsRowTd($detail->line, 'cubic_load_p', "", true) !!}
                    {!! Form::bsRowTd($detail->line, 'cubic_excess', "", true) !!}
                    {!! Form::bsRowTd($detail->line, 'pieces_loaded', $detail->pieces_load, true) !!}
                    {!! Form::bsRowTd($detail->line, 'max_weight', "", true) !!}
                    {!! Form::bsRowTd($detail->line, 'weight_load', $detail->weight_load, false) !!}
                    {!! Form::bsRowTd($detail->line, 'weight_load_p', "", true) !!}
                    {!! Form::bsRowTd($detail->line, 'weight_excess', "", true) !!}
                    {!! Form::bsRowTd($detail->line, 'reference', $detail->reference, false) !!}
                    {!! Form::bsRowTd($detail->line, 'volume_weight', $detail->volume_weight, true) !!}
                    {!! Form::bsRowBtns() !!}

                </tr>
            @endforeach
        @endif
    </tbody>
</table>
<div class="pull-right">
    <div class="row">
        <div class="col-md-3">{!! Form::bsText(null, null, 'Pieces', 'sum_total_pieces',  null, '') !!}    </div>
        <div class="col-md-3">{!! Form::bsText(null, null, 'Volume Weight(L)', 'sum_total_volume',  null, '') !!}    </div>
        <div class="col-md-3">{!! Form::bsText(null, null, 'Weight(L)', 'sum_total_weight',  null, '') !!}    </div>
        <div class="col-md-3">{!! Form::bsText(null, null, 'Cubic(Cft)', 'sum_total_cubic',  null, '') !!}    </div>
    </div>
</div>
   <!-- <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3">{!! Form::bsText(null, null, 'Volume Weight(K)', 'sum_total_volume_k',  null, '') !!}    </div>
        <div class="col-md-3">{!! Form::bsText(null, null, 'Weight(K)', 'sum_total_weight_k',  null, '') !!}    </div>
        <div class="col-md-3">{!! Form::bsText(null, null, 'Cubic(Cbm)', 'sum_total_cubic_k',  null, '') !!}    </div>
    </div>->
</div>

<!--  WAREHOUSE -->
<table id="hidden_warehouse" class="hidden">
    <tbody>
    @if(isset($loading_guide))
        @foreach($loading_guide->receipt_entry as $key => $detail )
            <tr data-id="{{ $detail->line }}">
                {!! Form::bsRowTd($key + 1, 'hidden_warehouse_line', $key + 1, true) !!}
                {!! Form::bsRowTd($key + 1, 'hidden_warehouse_number', $detail->code, true) !!}
                {!! Form::bsRowTd($key + 1, 'hidden_date_in', $detail->date_in, true) !!}
                {!! Form::bsRowTd($key + 1, 'hidden_shipper_id', $detail->shipper_id, true) !!}
                {!! Form::bsRowTd($key + 1, 'hidden_shipper_name', strtoupper($detail->shipper_id > 0 ? $detail->shipper->name : ""), true) !!}
                {!! Form::bsRowTd($key + 1, 'hidden_consignee_id', $detail->consignee_id, true) !!}
                {!! Form::bsRowTd($key + 1, 'hidden_consignee_name', strtoupper($detail->consignee_id ? $detail->consignee->name : ""), true) !!}
                {!! Form::bsRowTd($key + 1, 'hidden_status', $detail->status, true) !!}
                {!! Form::bsRowTd($key + 1, 'hidden_sum_pieces', $detail->sum_pieces, true) !!}
                {!! Form::bsRowTd($key + 1, 'hidden_sum_weight', $detail->sum_weight, true) !!}
                {!! Form::bsRowTd($key + 1, 'hidden_sum_cubic', $detail->sum_cubic, true) !!}
                {!! Form::bsRowTd($key + 1, 'hidden_sum_volume_weight', $detail->sum_volume_weight, true) !!}
                {!! Form::bsRowTd($key + 1, 'hidden_warehouse_id', $detail->id, true) !!}
                {!! Form::bsRowTd($key + 1, 'hazardous', strtoupper($detail->is_hazardous), true) !!}
                {!! Form::bsRowTd($key + 1, 'hidden_flag', 1, true) !!}
                {!! Form::bsRowTd($key + 1, 'destination', $detail->location_destination_code, true) !!}
                {!! Form::bsRowTd($key + 1, 'line', $detail->line, true) !!}

            </tr>
        @endforeach
    @endif
    </tbody>
</table>


