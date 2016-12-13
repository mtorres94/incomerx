<!-- Tabs Carriers -->

<div class="easyui-tabs">
    <div title="Carriers">
        <div class="form-horizontal">
            <div class="row">
                    {!! Form::bsComplete('col-md-4','col-md-7' , 'Carrier', 'carriers_carrier_id', 'carriers_carrier_name', Request::get('term'), ((isset($order_entry) and $order_entry->carriers_carrier_id > 0) ? $order_entry->carriers_carrier->name : null),  'Carriers...') !!}
            </div>
            <div class="row">
                {!! Form::bsComplete('col-md-4','col-md-7' , 'Equipment Type', 'equipment_type_id', 'equipment_type_code',  Request::get('term'), ((isset($order_entry) and $order_entry->equipment_type_id > 0) ? $order_entry->equipment_type->name : null), ' ') !!}

            </div>
            <div class="row">
                {!! Form::bsText('col-md-4','col-md-7', 'Load #', 'carriers_load', null, '') !!}
            </div>
            <div class="row">
                    {!! Form::bsComplete('col-md-4','col-md-7', 'Driver', 'receiving_driver_id', 'receiving_driver_name',  Request::get('term'), ((isset($order_entry) and $order_entry->receiving_driver_id > 0) ? $order_entry->receiving_driver->name : null), 'Drivers...') !!}
            </div>
            <div class="row">
                        {!! Form::bsText('col-md-4','col-md-7', 'AWB/ Tracking #', 'receiving_receiving_by', null, '') !!}
            </div>

        </div>
    </div>

    <!-- Tab Stops -->
    <div title="Stops">
        <div class="form-horizontal">

            <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#Stop_Details" onclick="cleanModalFields('Stop_Details')">
                    <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-danger" onclick="clearTable('stop-details')">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </button>
            </div>
            <table class="table table-bordered table-condensed" id="stop-details">
                <thead>
                <tr>
                    <th  data-override="stop_line" hidden>Line</th>
                    <th width="10%" data-override="stop_id" width="50%">Stop ID</th>
                    <th  data-override="stop_customer_id" hidden></th>
                    <th width="40%" data-override="stop_customer_name">Customer</th>
                    <th width="25%"data-override="stop_city">City</th>
                    <th width="25%"data-override="stop_phone">Phone</th>
                    <th width="0%"/>
                </tr>
                </thead>
                <tbody>
                @if (isset($order_entry))
                @foreach ($order_entry->stop_numbers as $detail)
                    <tr id="{{ $detail->line }}">
                        {!! Form::bsRowTd($detail->line, 'stop_id', $detail->line, false) !!}
                        {!! Form::bsRowTd($detail->line, 'stop_customer_name', ((isset($detail)and $detail->stop_customer_id >0) ? $detail->stop_customer->name: null), false) !!}
                        {!! Form::bsRowTd($detail->line, 'stop_city', $detail->stop_city, false) !!}
                        {!! Form::bsRowTd($detail->line, 'stop_phone', $detail->stop_phone, false) !!}
                        {!! Form::bsRowTd($detail->line, 'stop_quantity', $detail->stop_quantity, true) !!}
                        {!! Form::bsRowTd($detail->line, 'stop_cargo_type_id', $detail->stop_cargo_type_id, true) !!}
                        {!! Form::bsRowTd($detail->line, 'stop_cargo_type_code', ((isset($detail)and $detail->stop_cargo_type_id >0) ? $detail->stop_cargo_type->code: null), true) !!}
                        {!! Form::bsRowTd($detail->line, 'stop_unit', $detail->stop_unit, true) !!}
                        {!! Form::bsRowTd($detail->line, 'stop_length', $detail->stop_length, true) !!}
                        {!! Form::bsRowTd($detail->line, 'stop_width', $detail->stop_width, true) !!}
                        {!! Form::bsRowTd($detail->line, 'stop_height', $detail->stop_height, true) !!}
                        {!! Form::bsRowTd($detail->line, 'stop_weight', $detail->stop_weight, true) !!}
                        {!! Form::bsRowTd($detail->line, 'stop_appt', $detail->stop_appt, true) !!}
                        {!! Form::bsRowTd($detail->line, 'stop_date', $detail->stop_date, true) !!}
                        {!! Form::bsRowTd($detail->line, 'stop_customer_id', $detail->stop_customer_id, true) !!}
                        {!! Form::bsRowTd($detail->line, 'stop_address', $detail->stop_address, true) !!}
                        {!! Form::bsRowTd($detail->line, 'stop_state_id', $detail->stop_state_id, true) !!}
                        {!! Form::bsRowTd($detail->line, 'stop_state_name', ((isset($detail)and $detail->stop_state_id >0) ? $detail->stop_state->name: null), true) !!}
                        {!! Form::bsRowTd($detail->line, 'stop_zip_code_id', $detail->stop_zip_code_id, true) !!}
                        {!! Form::bsRowTd($detail->line, 'stop_zip_code_code', ((isset($detail)and $detail->stop_zip_code_id >0) ? $detail->stop_zip_code->code: null), true) !!}
                        {!! Form::bsRowTd($detail->line, 'stop_contact', $detail->stop_contact, true) !!}
                        {!! Form::bsRowTd($detail->line, 'stop_ref', $detail->stop_ref, true) !!}
                        {!! Form::bsRowTd($detail->line, 'stop_reference', $detail->stop_reference, true) !!}
                        {!! Form::bsRowTd($detail->line, 'stop_direction', $detail->stop_direction, true) !!}
                        {!! Form::bsRowTd($detail->line, 'stop_instruction', $detail->stop_instruction, true) !!}
                        {!! Form::bsRowTd($detail->line, 'stop_type', $detail->stop_type, true) !!}
                        {!! Form::bsRowBtns() !!}
                    </tr>
                @endforeach
                @endif
                </tbody>
            </table>

        </div>
    </div>

    <!-- Tab Appt -->
    <div title="Appt">
        <div class="form-horizontal">
            <div class="row">
                <div class="col-md-7 form-tab">
                   <h4>Pickup Appointment</h4>
                    {!! Form::bsDate('col-md-5', 'col-md-7', 'Date', 'appt_date', null, '') !!}
                    {!! Form::bsText('col-md-5', 'col-md-7', 'Pick up #', 'pickup_number', null, '') !!}
                </div>
                <div class="col-md-7 form-tab">
                    <h4>Delivery Appointment</h4>
                    {!! Form::bsDate('col-md-5', 'col-md-7', 'Date', 'delivery_date', null, '') !!}
                    {!! Form::bsText('col-md-5', 'col-md-7', 'Dropoff #', 'dropoff_number', null, '') !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Tab POD Info -->
    <div title="POD Info">
        <div class="form-horizontal">
            <div class="row">
                <div class="col-md-6 form-tab">
                    {!! Form::bsDate('col-md-5', 'col-md-7', 'Date', 'POD_info_date', null, '') !!}
                </div>
                <div class="col-md-6 form-tab">

                    {!! Form::bsDate('col-md-5', 'col-md-7', 'Expected Date', 'POD_info_expected_date', null, '') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-9 form-tab">
                    {!! Form::bsText('col-md-5', 'col-md-7', 'Received by', 'received_by', null, '') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-9 form-tab">
                    {!! Form::bsText('col-md-5', 'col-md-7', 'Incident', 'incident', null, 'Incidents...') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-9 form-tab">
                    {!! Form::bsMemo('col-md-5', 'col-md-7', 'Notes', 'POD_notes', null, 4, '') !!}
                </div>
            </div>
        </div>
    </div>


    <!-- Tab PRO -->
    <div title="PRO">
        <div class="form-horizontal">

            <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#PRO-Numbers" onclick="cleanModalFields('PRO-Numbers')">
                    <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-danger" onclick="clearTable('PRO_details')">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </button>
            </div>
            <table class="table table-bordered table-condensed" id="PRO_details">
                <thead>
                <tr>
                    <th data-override="PRO_line" hidden>Line</th>
                    <th data-override="PRO_number" width="20%">PRO Number</th>
                    <th data-override="PRO_reference">Details</th>
                    <th data-override="PRO_remarks" hidden width="35%">Remarks/ Comments</th>
                    <th width="15%"/>
                </tr>
                </thead>
                <tbody>
                @if(isset($order_entry))
                @foreach ($order_entry->pro_numbers as $detail)
                    <tr id="{{ $detail->line }}">
                        {!! Form::bsRowTd($detail->line, 'PRO_line', $detail->line, true) !!}
                        {!! Form::bsRowTd($detail->line, 'PRO_number', $detail->pro_number, false) !!}
                        {!! Form::bsRowTd($detail->line, 'PRO_reference', $detail->pro_detail, false) !!}
                        {!! Form::bsRowTd($detail->line, 'PRO_remarks', $detail->pro_comment, true) !!}
                        {!! Form::bsRowBtns() !!}
                    </tr>
                @endforeach
                @endif
                </tbody>
            </table>

        </div>
    </div>

    <!-- Tab Hazardous -->
    <div title="Hazardous">
        <div class="form-horizontal">
            <div class="row-form">
                {!! Form::bsText('col-md-3', 'col-md-7', 'Contact', 'hazardous_contact', null, 'Hazardous contact...') !!}
            </div>
            <div class="row-form">
                {!! Form::bsText('col-md-3', 'col-md-5', 'Phone', 'hazardous_phone', null, 'Hazardous contact...') !!}
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#UNs" onclick="cleanModalFields('UNs')">
                    <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-danger" onclick="clearTable('hazardous-details')">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </button>
            </div>
            <table class="table table-bordered table-condensed" id="hazardous-details">
                <thead>
                <tr>
                    <th hidden data-override="hazardous_details_uns_id">?</th>
                    <th hidden data-override="hazardous_details_line">Line</th>
                    <th width="15%" data-override="hazardous_details_uns_code">UN #</th>
                    <th width="50%" data-override="hazardous_details_uns_description">Description</th>

                    <th width="15%"></th>
                </tr>
                </thead>
                <tbody>
                @if(isset($order_entry))
                @foreach($order_entry->hazardous as $detail)
                <tr id="{{ $detail->line }}">
                    {!! Form::bsRowTd($detail->line, 'hazardous_uns_id', $detail->uns_id, false) !!}
                    {!! Form::bsRowTd($detail->line, 'hazardous_uns_line', $detail->line, true) !!}
                    {!! Form::bsRowTd($detail->line, 'hazardous_uns_code', ((isset($detail)and $detail->uns_id >0) ? $detail->hazardous_uns->code: null), true) !!}
                    {!! Form::bsRowTd($detail->line, 'hazardous_uns_desc', $detail->description, false) !!}
                    {!! Form::bsRowTd($detail->line, 'hazardous_uns_note', $detail->notes, true) !!}
                    {!! Form::bsRowBtns() !!}
                </tr>
                @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tab Custom Brokers-->
    <div title="Custom Brokers">
        <div class="form-horizontal">
            <div class="row">

                    {!! Form::bsComplete('col-md-3', 'col-md-9','Broker', 'vendor_code', 'vendor_name', Request::get('term'), ((isset($order_entry) and $order_entry->vendor_code > 0) ? $order_entry->vendor->name : null), 'Vendors...') !!}

            </div>
            <div class="row">
                <div class="col-md-6">{!! Form::bsText('col-md-4', 'col-md-8', 'Phone', 'vendor_phone', null, '') !!}</div>
                <div class="col-md-6">{!! Form::bsText('col-md-4', 'col-md-8', 'Reference', 'vendor_reference', null, '') !!}</div>
            </div>
            <div class="row">

                    {!! Form::bsComplete('col-md-3', 'col-md-9', 'Destination Broker', 'destination_vendor_code', 'destination_vendor_name', Request::get('term'), ((isset($order_entry) and $order_entry->destination_vendor_code > 0) ? $order_entry->destination_vendor->name : null), 'Vendors...') !!}

            </div>
            <div class="row">
                <div class="col-md-6">{!! Form::bsText('col-md-4', 'col-md-8', 'Phone', 'destination_vendor_phone', null, '') !!} </div>
                <div class="col-md-6">{!! Form::bsText('col-md-4', 'col-md-8', 'Reference', 'destination_vendor_reference', null, '') !!}</div>
            </div>
        </div>
    </div>


</div>