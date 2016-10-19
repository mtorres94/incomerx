<div class="row">
    <legend>Charges Details</legend>
                <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
                    <button type="button" class="btn btn-default" id="btn_charge_details" data-toggle="modal"  data-target="#Charge_Details" onclick="cleanModalFields('Charge_Details')">
                        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-danger" onclick="clearTable('charge_details')">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>

                <table class="table table-bordered table-condensed" id="charge_details">
                    <thead>
                    <tr>
                        <th data-override="charge_line" hidden></th>
                        <th width="10%" data-override="charge_billing_code">Billing Code</th>
                        <th width="20%" data-override="charge_description">Description</th>
                        <th width="10%" data-override="charge_bill_type" >Bill type</th>
                        <th width="15%" data-override="charge_bill_party">Bill party</th>
                        <th width="10%" data-override="charge_quantity">Quantity</th>
                        <th width="10%" data-override="charge_rate">Rate</th>
                        <th width="10%" data-override="charge_amount">Amount</th>
                        <th width="15%" data-override="charge_bill_to">Bill to </th>
                        <th width="10%" data-override="charge_cost">Cost </th>
                        <th width="12%"/>
                    </tr>
                    </thead>
                    <tbody>

                    @if(isset($charges))
                        @foreach ($charges as $detail)
                            <tr id="{{ $detail->line }}">
                                {!! Form::bsRowTd($detail->line, 'charge_id', $detail->line, true) !!}
                                {!! Form::bsRowTd($detail->line, 'billing_billing_id', $detail->billing_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'billing_billing_code', $detail->billing_id, false) !!}
                                {!! Form::bsRowTd($detail->line, 'billing_billing_description', $detail->billing_description, false) !!}
                                {!! Form::bsRowTd($detail->line, 'billing_bill_type', $detail->bill_type, false) !!}
                                {!! Form::bsRowTd($detail->line, 'billing_bill_party', $detail->bill_party, false) !!}
                                {!! Form::bsRowTd($detail->line, 'billing_quantity', $detail->billing_quantity, false) !!}
                                {!! Form::bsRowTd($detail->line, 'billing_rate', $detail->billing_rate, false) !!}
                                {!! Form::bsRowTd($detail->line, 'billing_amount', $detail->billing_amount, false) !!}
                                {!! Form::bsRowTd($detail->line, 'billing_currency_type', $detail->billing_currency_type, true) !!}
                                {!! Form::bsRowTd($detail->line, 'billing_customer_name', (($detail->billing_customer_id >0) ? $detail->billing_customer->name: null), false) !!}
                                {!! Form::bsRowTd($detail->line, 'cost_amount', $detail->cost_amount, false) !!}
                                {!! Form::bsRowTd($detail->line, 'cost_currency_type', $detail->cost_currency_type, true) !!}
                                {!! Form::bsRowTd($detail->line, 'cost_invoice', $detail->cost_invoice, true) !!}
                                {!! Form::bsRowTd($detail->line, 'cost_reference', $detail->cost_reference, true) !!}
                                {!! Form::bsRowTd($detail->line, 'billing_notes', $detail->billing_notes, true) !!}
                                {!! Form::bsRowTd($detail->line, 'billing_unit_id', $detail->billing_unit_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'billing_unit_name', (( $detail->billing_unit_id >0) ? $detail->billing_unit->code: null), true) !!}
                                {!! Form::bsRowTd($detail->line, 'billing_exchange_rate', $detail->billing_exchange_rate, true) !!}
                                {!! Form::bsRowTd($detail->line, 'billing_customer_id', $detail->billing_customer_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'cost_quantity', $detail->cost_quantity, true) !!}
                                {!! Form::bsRowTd($detail->line, 'cost_unit_id', $detail->cost_unit_id, true) !!}
                                {!! Form::bsRowTd($detail->line, 'cost_unit_name', (($detail->cost_unit_id >0) ? $detail->cost_unit->code: null), true) !!}
                                {!! Form::bsRowTd($detail->line, 'cost_rate', $detail->cost_rate, true) !!}
                                {!! Form::bsRowTd($detail->line, 'cost_cost_center', $detail->cost_cost_center, true) !!}
                                {!! Form::bsRowTd($detail->line, 'cost_exchange_rate', $detail->cost_exchange_rate, true) !!}
                                {!! Form::bsRowTd($detail->line, 'billing_vendor_code', $detail->billing_vendor_code, true) !!}
                                {!! Form::bsRowTd($detail->line, 'billing_vendor_name',(( $detail->billing_vendor_code >0) ? $detail->billing_vendor->code: null), true) !!}
                                {!! Form::bsRowTd($detail->line, 'cost_date', $detail->cost_date, true) !!}
                                {!! Form::bsRowTd($detail->line, 'billing_increase', $detail->billing_increase, true) !!}
                                {!! Form::bsRowBtns() !!}
                        </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
</div>
<div class="row">
    <legend>Delivery/ Inland Carrier Details</legend>
    <div class="col-md-6">
        <div class="row">{!! Form::bsComplete('col-md-3', 'col-md-6', 'Inland Carrier', 'inland_carrier_id', 'inland_carrier_name', Request::get('term'), ((isset($booking_entry) and $booking_entry->inland_carrier_id > 0) ? $booking_entry->inland_carrier->name : null), 'Carriers') !!}</div>
        <div class="row"> {!! Form::bsComplete('col-md-3', 'col-md-6', 'Driver', 'inland_driver_id', 'inland_driver_name', Request::get('term'), ((isset($booking_entry) and $booking_entry->inland_driver_id > 0) ? $booking_entry->inland_driver->name : null), 'Drivers') !!}</div>
        <div class="row"> {!! Form::bsText('col-md-3', 'col-md-6', 'Lic/ ID #', 'inland_lic_number', null, null) !!} </div>
    </div>
    <div class="col-md-6">
        {!! Form::bsMemo(null, null, 'Instructions', 'inland_instruction', null, 2, ' ') !!}
        {!! Form::bsDate(null, null, 'Date', 'inland_date', null, ' ') !!}
    </div>
</div>

