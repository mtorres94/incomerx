<div class="easyui-tabs">
    <div title="Charges Details">
        <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
            <button type="button" id="btn-charges"class="btn btn-default" data-toggle="modal" data-target="#Charge_Details" onclick="cleanModalFields('Charge_Details')">
                <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
            </button>
            <button type="button" class="btn btn-danger" onclick="clearTable('chargeDetails')">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
        </div>
        <table class="table table-bordered table-condensed" id="chargeDetails">
            <thead>
            <tr>
                <th  data-override="charge_id" hidden></th>
                <th data-override="billing_billing_id" hidden></th>
                <th width="10%" data-override="billing_billing_code">Billing Code</th>
                <th width="25%" data-override="billing_billing_description">Description</th>
                <th width="10%" data-override="billing_bill_type">Bill type</th>
                <th width="10%" data-override="billing_bill_party">Bill Party</th>
                <th width="10%" data-override="billing_quantity">Bill Qty</th>
                <th width="10%" data-override="billing_amount">Bill Amount</th>
                <th width="10%" data-override="cost_amount">Cost</th>
                <th width="10%"/>
            </tr>
            </thead>
            <tbody>
            @if(isset($bill_of_lading))
                @foreach($bill_of_lading->charge as $detail)
                    <tr id="{{ $detail->line }}">
                        {!! Form::bsRowTd($detail->line, 'charge_id', $detail->line, true) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_billing_id', $detail->billing_id, true) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_billing_code', strtoupper($detail->billing_id >0 ? $detail->billing->code : ""), false) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_billing_description', ($detail->billing_id > 0 ? $detail->billing->name : ""), false) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_bill_type', $detail->bill_type, false) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_bill_party', $detail->bill_party, false) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_quantity', $detail->billing_quantity, false) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_rate', $detail->billing_rate, true) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_amount', $detail->billing_amount, false) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_currency_type', $detail->billing_currency_type, true) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_customer_name', (($detail->billing_customer_id >0) ? $detail->billing_customer->name: null), true) !!}
                        {!! Form::bsRowTd($detail->line, 'cost_amount', $detail->cost_amount, false) !!}
                        {!! Form::bsRowTd($detail->line, 'cost_currency_type', $detail->cost_currency_type, true) !!}
                        {!! Form::bsRowTd($detail->line, 'cost_invoice', $detail->cost_invoice, true) !!}
                        {!! Form::bsRowTd($detail->line, 'cost_reference', $detail->cost_reference, true) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_notes', $detail->billing_notes,true) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_unit_id', $detail->billing_unit_id, true) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_unit_name', strtoupper($detail->billing_unit_id >0 ? $detail->billing_unit->name : ""), true) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_exchange_rate', $detail->billing_exchange_rate, true) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_customer_id', $detail->billing_customer_id, true) !!}
                        {!! Form::bsRowTd($detail->line, 'cost_quantity', $detail->cost_quantity, true) !!}
                        {!! Form::bsRowTd($detail->line, 'cost_unit_id', $detail->cost_unit_id, true) !!}
                        {!! Form::bsRowTd($detail->line, 'cost_unit_name', strtoupper($detail->cost_unit_id > 0 ? $detail->cost_unit->name : ""), true) !!}
                        {!! Form::bsRowTd($detail->line, 'cost_rate', $detail->cost_rate, true) !!}
                        {!! Form::bsRowTd($detail->line, 'cost_cost_center', $detail->cost_center, true) !!}
                        {!! Form::bsRowTd($detail->line, 'cost_exchange_rate', $detail->cost_exchange_rate, true) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_vendor_code', $detail->billing_vendor_code, true) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_vendor_name', strtoupper(($detail->billing_vendor_code >0) ? $detail->billing_vendor->name: null), true) !!}
                        {!! Form::bsRowTd($detail->line, 'cost_date', $detail->cost_date, true) !!}
                        {!! Form::bsRowTd($detail->line, 'billing_increase', $detail->billing_increase, true) !!}
                        {!! Form::bsRowBtns()!!}
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="pull-right">
            <div class="col-md-3">{!! Form::bsSelect(null, null, 'Freight Payable at', 'payable_at', array('D' => 'Destination', 'O' => 'Origin'), null) !!}</div>
            <div class="col-md-2">{!! Form::bsText(null,null, 'Bill', 'charges_bill', null, '0.00') !!}</div>
            <div class="col-md-2">{!! Form::bsText(null,null, 'Cost', 'charges_cost', null, '0.00') !!}</div>
            <div class="col-md-2">{!! Form::bsText(null,null, 'Profit', 'charges_profit', null, '0.00') !!}</div>
            <div class="col-md-2">{!! Form::bsText(null,null, 'Profit %', 'charges_profit_p', null, '0.00') !!}</div>

        </div>
    </div>
    <div title="Transportation Plans">
        <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
            <button type="button" id="btn-transportation"class="btn btn-default" data-toggle="modal" data-target="#TransportationDetails" onclick="cleanModalFields('TransportationDetails')">
                <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
            </button>
            <button type="button" class="btn btn-danger" onclick="clearTable('transportation_details')">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
        </div>
        <table class="table table-bordered table-condensed" id="transportation_details">
            <thead>
            <tr>
                <th  data-override="transportation_line" hidden></th>
                <th width="5%" data-override="transportation_leg">Leg</th>
                <th width="5%" data-override="transportation_mode">Mode</th>
                <th  data-override="transportation_carrier_id" hidden></th>
                <th width="20%"data-override="transportation_carrier">Carrier</th>
                <th  data-override="transportation_loading_id" hidden></th>
                <th width="10%"data-override="transportation_loading">Loading</th>
                <th  data-override="transportation_unloading_id" hidden></th>
                <th width="10%"data-override="transportation_unloading">Unloading</th>
                <th width="10%"data-override="transportation_ETD">ETD</th>
                <th width="10%"data-override="transportation_ETA">ETA</th>
                <th width="10%"data-override="transportation_status">Status</th>
                <th width="10%"data-override="transportation_amount">Amount</th>
                <th width="10%"/>
            </tr>
            </thead>
            <tbody>

            @if(isset($bill_of_lading))
                @foreach($bill_of_lading->transportation as $detail)
                    <tr id="{{ $detail->line }}">
                        {!! Form::bsRowTd($detail->line, 'transportation_id', $detail->line, true) !!}
                        {!! Form::bsRowTd($detail->line, 'transportation_leg', $detail->leg, false) !!}
                        {!! Form::bsRowTd($detail->line, 'transportation_mode', $detail->mode, false) !!}
                        {!! Form::bsRowTd($detail->line, 'transportation_carrier_id', $detail->carrier_id, true) !!}
                        {!! Form::bsRowTd($detail->line, 'transportation_carrier_name', strtoupper(($detail->carrier_id >0) ? $detail->carrier->name: null), false) !!}
                        {!! Form::bsRowTd($detail->line, 'transportation_loading_location_id', $detail->loading_location_id, true) !!}
                        {!! Form::bsRowTd($detail->line, 'transportation_loading_location_name', strtoupper(($detail->loading_location_id >0) ? $detail->loading_location->name: null), false) !!}
                        {!! Form::bsRowTd($detail->line, 'transportation_unloading_location_id', $detail->unloading_location_id, true) !!}
                        {!! Form::bsRowTd($detail->line, 'transportation_unloading_location_name', strtoupper(($detail->unloading_location_id >0) ? $detail->unloading_location->name: null), false) !!}
                        {!! Form::bsRowTd($detail->line, 'transportation_ETD_date', $detail->ETD_date, false) !!}
                        {!! Form::bsRowTd($detail->line, 'transportation_ETA_date', $detail->ETA_date, false) !!}
                        {!! Form::bsRowTd($detail->line, 'transportation_leg_status', $detail->leg_status, false) !!}
                        {!! Form::bsRowTd($detail->line, 'transportation_amount', $detail->amount, false) !!}
                        {!! Form::bsRowTd($detail->line, 'transportation_billing_id', $detail->billing_id, true) !!}
                        {!! Form::bsRowTd($detail->line, 'transportation_billing_code', strtoupper(($detail->billing_id >0) ? $detail->billing->code: null), true) !!}
                        {!! Form::bsRowTd($detail->line, 'transportation_description', $detail->description, true) !!}
                        {!! Form::bsRowTd($detail->line, 'transportation_service_id', $detail->service_id, true) !!}
                        {!! Form::bsRowTd($detail->line, 'transportation_service_name',strtoupper(($detail->service_id >0) ? $detail->service->name: null), true) !!}
                        {!! Form::bsRowTd($detail->line, 'transportation_notify', $detail->notify, true) !!}
                        {!! Form::bsRowTd($detail->line, 'transportation_loading_reference', $detail->loading_reference, true) !!}
                        {!! Form::bsRowTd($detail->line, 'transportation_unloading_reference', $detail->unloading_reference, true) !!}
                        {!! Form::bsRowTd($detail->line, 'origin_from_type', $detail->origin_from_type, true) !!}
                        {!! Form::bsRowTd($detail->line, 'origin_from_shipper_id', $detail->origin_from_shipper_id, true) !!}
                        {!! Form::bsRowTd($detail->line, 'origin_from_shipper_name', strtoupper(($detail->origin_from_shipper_id >0) ? $detail->origin_from_shipper->name: null), true) !!}
                        {!! Form::bsRowTd($detail->line, 'origin_from_address', strtoupper($detail->origin_from_address), true) !!}
                        {!! Form::bsRowTd($detail->line, 'origin_from_city', strtoupper($detail->origin_from_city), true) !!}
                        {!! Form::bsRowTd($detail->line, 'origin_from_state_id', $detail->origin_from_state_id, true) !!}
                        {!! Form::bsRowTd($detail->line, 'origin_from_state_name', strtoupper(($detail->origin_from_state_id >0) ? $detail->origin_from_state->name: null), true) !!}
                        {!! Form::bsRowTd($detail->line, 'origin_from_country_id', $detail->origin_from_country_id, true) !!}
                        {!! Form::bsRowTd($detail->line, 'origin_from_country_name', strtoupper(($detail->origin_from_country_id >0) ? $detail->origin_from_country->name: null), true) !!}
                        {!! Form::bsRowTd($detail->line, 'origin_from_zip_code_id', $detail->origin_from_zip_code_id, true) !!}
                        {!! Form::bsRowTd($detail->line, 'origin_from_zip_code_code', strtoupper(($detail->origin_from_zip_code_id >0) ? $detail->origin_from_zip_code->name: null), true) !!}
                        {!! Form::bsRowTd($detail->line, 'origin_from_contact', strtoupper($detail->origin_from_contact), true) !!}
                        {!! Form::bsRowTd($detail->line, 'origin_from_phone', $detail->origin_from_phone, true) !!}
                        {!! Form::bsRowTd($detail->line, 'origin_from_fax', $detail->origin_from_fax, true) !!}
                        {!! Form::bsRowTd($detail->line, 'origin_to_type', $detail->origin_to_type, true) !!}
                        {!! Form::bsRowTd($detail->line, 'origin_to_consignee_id', $detail->origin_to_consignee_id, true) !!}
                        {!! Form::bsRowTd($detail->line, 'origin_to_consignee_name', strtoupper(($detail->origin_to_consignee_id >0) ? $detail->origin_to_consignee->name: null), true) !!}
                        {!! Form::bsRowTd($detail->line, 'origin_to_address', strtoupper($detail->origin_to_address), true) !!}
                        {!! Form::bsRowTd($detail->line, 'origin_to_city', strtoupper($detail->origin_to_city), true) !!}
                        {!! Form::bsRowTd($detail->line, 'origin_to_state_id', $detail->origin_to_state_id, true) !!}
                        {!! Form::bsRowTd($detail->line, 'origin_to_state_name',  strtoupper(($detail->origin_to_state_id >0) ? $detail->origin_to_state->name: null), true) !!}
                        {!! Form::bsRowTd($detail->line, 'origin_to_country_id', $detail->origin_to_country_id, true) !!}
                        {!! Form::bsRowTd($detail->line, 'origin_to_country_name',  strtoupper(($detail->origin_to_country_id >0) ? $detail->origin_to_country->name: null), true) !!}
                        {!! Form::bsRowTd($detail->line, 'origin_to_zip_code_id', $detail->origin_to_zip_code_id, true) !!}
                        {!! Form::bsRowTd($detail->line, 'origin_to_zip_code_code',  strtoupper(($detail->origin_to_zip_code_id >0) ? $detail->origin_to_zip_code->name: null), true) !!}
                        {!! Form::bsRowTd($detail->line, 'origin_to_contact', strtoupper($detail->origin_to_contact), true) !!}
                        {!! Form::bsRowTd($detail->line, 'origin_to_phone', $detail->origin_to_phone, true) !!}
                        {!! Form::bsRowTd($detail->line, 'origin_to_fax', $detail->origin_to_fax, true) !!}
                        {!! Form::bsRowBtns() !!}

                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        <div class="pull-right" >
            <div class="col-md-9">{!! Form::bsText(null,null, 'Amount', 'transportation_plans_amount', null, '0.000') !!}</div>
        </div>
    </div>
</div>
