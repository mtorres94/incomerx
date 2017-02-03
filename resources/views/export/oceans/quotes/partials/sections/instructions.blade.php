<div class="row">
    <div class="col-md-12">

            <legend>Container Details</legend>
            <div class="form-horizontal">
                <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">

                    <button type="button" id="btn_container_details" class="btn btn-default" data-toggle="modal" data-target="#Container_Details" onclick="cleanModalFields('Container_Details')">
                        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-danger"  onclick="clearTable('container_details')">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>

                <table class="table table-bordered table-condensed" id="container_details">
                    <thead>
                    <tr>
                        <th data-override="container" hidden></th>
                        <th width="30%" >Equipment Type</th>
                        <th width="25%" >Equipment #</th>
                        <th width="30%" >Seal Number</th>
                        <th width="15%" >Pieces</th>
                        <th width="15%" >Weight</th>
                        <th width="15%" >Cubic</th>
                        <th width="15%"/>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($quotes))
                        @foreach($quotes->container as $detail)
                            <tr id="{{ $detail->line }}">
                                {!! Form::bsRowTd($detail->line, 'container_line', $detail->line, true) !!}
                                {!! Form::bsRowTd($detail->line, 'equipment_type_id', $detail->equipment_type_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'equipment_type_code', ($detail->equipment_type_id >0 ? $detail->equipment_type->code : ""), false) !!}
                                {!! Form::bsRowTd($detail->line, 'container_number', $detail->container_number, false) !!}
                                {!! Form::bsRowTd($detail->line, 'container_seal_number', $detail->seal_number, false) !!}
                                {!! Form::bsRowTd($detail->line, 'container_seal_number2', $detail->seal_number2, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_pieces', $detail->pieces, false) !!}
                                {!! Form::bsRowTd($detail->line, 'container_gross_weight', $detail->gross_weight, false) !!}
                                {!! Form::bsRowTd($detail->line, 'container_cubic', $detail->cubic, false) !!}
                                {!! Form::bsRowTd($detail->line, 'pd_status', $detail->pd_status, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_carrier_id', $detail->carrier_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_carrier_name', ($detail->carrier_id ? $detail->carrier->name : ""), true) !!}
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
                                {!! Form::bsRowTd($detail->line, 'container_pickup_date', $detail->pickup_date, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_pickup_number', $detail->pickup_number, true) !!}

                                {!! Form::bsRowTd($detail->line, 'container_delivery_id', $detail->delivery_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_name', ($detail->delivery_id > 0 ? $detail->delivery->name : ""), true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_type', $detail->delivery_type, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_address', $detail->delivery_address, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_city', $detail->delivery_city, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_state_id', $detail->delivery_state_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_state_name', ($detail->delivery_state_id >0 ? $detail->delivery_state->name : ""), true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_zip_code_id', $detail->delivery_zip_code_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_zip_code_code', ($detail->delivery_zip_code_id >0 ? $detail->delivery_zip_code->code : ""), true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_phone', $detail->delivery_phone, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_date', $detail->delivery_date, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_delivery_number', $detail->delivery_number, true) !!}

                                {!! Form::bsRowTd($detail->line, 'container_drop_id', $detail->drop_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_name', ($detail->drop_id >0 ? $detail->drop->name : ""), true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_type', $detail->drop_type, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_address', $detail->drop_address, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_city', $detail->drop_city, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_state_id', $detail->drop_state_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_state_name', ($detail->drop_state_id > 0 ? $detail->drop_state->name : ""), true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_zip_code_id', $detail->drop_zip_code_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_zip_code_code', ($detail->drop_zip_code_id >0 ? $detail->drop_zip_code->code : ""), true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_phone', $detail->drop_phone, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_drop_date', $detail->drop_date, true) !!}
                                {!! Form::bsRowTd($detail->line, 'container_total_weight_unit', $detail->total_weight_unit, true) !!}
                                {!! Form::bsRowBtns() !!}
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
    </div>
</div>