<table class="table table-bordered table-condensed" id="hbl_details">
    <thead>
    <tr>
        <th hidden></th>
        <th width="5%" >HBL</th>
        <th width="10%" >Shipper Name</th>
        <th width="15%" >Consignee Name</th>
        <th width="5%" >Status</th>
        <th width="5%" >Pieces</th>
        <th width="10%" >Actual Weight</th>
        <th width="10%" >Unit</th>
        <th width="10%" >Charge Weight</th>
    </tr>
    </thead>
    <tbody>
    @if(isset($shipment_entry))
        @foreach($shipment_entry->bill_of_lading as $key=>$detail)
            @if( $detail->bl_class <= 2)
                <tr id="{{ $key+=1 }}">
                    {!! Form::bsRowTd($key+=1, 'hbl_id', $detail->code, false) !!}
                    {!! Form::bsRowTd($key+=1, 'shipper_name', strtoupper($detail->shipper_id > 0 ? $detail->shipper->name : ""), false) !!}
                    {!! Form::bsRowTd($key+=1, 'consignee_name', strtoupper($detail->consignee_id > 0 ? $detail->consignee->name : ""), false) !!}
                    {!! Form::bsRowTd($key+=1, 'status_bl', strtoupper($detail->bl_status), false) !!}
                    {!! Form::bsRowTd($key+=1, 'sum_pieces', $detail->total_pieces, false) !!}
                    {!! Form::bsRowTd($key+=1, 'sum_weight', $detail->total_weight_lbs, false) !!}
                    {!! Form::bsRowTd($key+=1, 'sum_unit_weight', $detail->total_weight_unit_measurement, false) !!}
                    {!! Form::bsRowTd($key+=1, 'sum_cubic', $detail->total_cubic_cbm, false) !!}
                </tr>
            @endif
        @endforeach
    @endif
    </tbody>
</table>

<div class="row pull-right">
    <div class="col-md-12">
        <div class="col-md-3">{!! Form::bsText(null,null, 'Pieces', 'hbl_pieces', null, '0.000') !!}</div>
        <div class="col-md-3">{!! Form::bsText(null,null, 'Act. Weight', 'hbl_actual_weight', null, '0.000') !!}</div>
        <div class="col-md-3">{!! Form::bsText(null,null, 'Charge Weight', 'hbl_charge_weight', null, '0.000') !!}</div>
    </div>


</div>
<table class="table hidden" id="shipment_booking">
    <tbody>
    @if(isset($shipment_entry))
        @foreach($shipment_entry->booking as $key => $detail)
            <tr id="{{ $key+1 }}">
                {!! Form::bsRowTd($key + 1, 'line', $key + 1 , true) !!}
                {!! Form::bsRowTd($key + 1, 'booking_code', $detail->code, true) !!}
                {!! Form::bsRowTd($key + 1, 'shipment_id', $shipment_entry->id, true) !!}
                {!! Form::bsRowTd($key + 1, 'shipment_code',$shipment_entry->code, true) !!}
            </tr>
        @endforeach
    @endif
    </tbody>
</table>