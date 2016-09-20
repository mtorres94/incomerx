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
                @if (isset($stop_numbers))
                @foreach ($stop_numbers as $stop_number)
                    <tr id="{{ $stop_number->line }}">
                        <td>{{ $stop_number->line }}<input hidden type='text' name='stop_id[{{ $stop_number->line }}]' value='{{ $stop_number->line }} ' /></td>
                        <td>{{ ((isset($stop_number)and $stop_number->stop_customer_id >0) ? $stop_number->stop_customer->name: null) }}<input hidden type='text' name='stop_customer_name[{{ $stop_number->line }}]' value='{{ ((isset($stop_number)and $stop_number->stop_customer_id >0) ? $stop_number->stop_customer->name: null) }}' /></td>
                        <td>{{ $stop_number->stop_city }}<input hidden type='text' name='stop_city[{{ $stop_number->line }}]' value='{{ $stop_number->stop_city }} ' /></td>
                        <td>{{ $stop_number->stop_phone }}<input hidden type='text' name='stop_phone[{{ $stop_number->line  }}]' value='{{ $stop_number->stop_phone }} ' /></td>
                        <td hidden >{{ $stop_number->stop_quantity }}<input hidden type='text' name='stop_quantity[{{ $stop_number->line }}]' value='{{ $stop_number->stop_quantity }} ' /></td>
                        <td hidden >{{ $stop_number->stop_cargo_type_id }}<input hidden type='text' name='stop_cargo_type_id[{{ $stop_number->line }}]' value='{{ $stop_number->stop_cargo_type_id }} ' /></td>
                        <td hidden >{{ ((isset($stop_number)and $stop_number->stop_cargo_type_id >0) ? $stop_number->stop_cargo_type->code: null) }}<input hidden type='text' name='stop_cargo_type_code[{{ $stop_number->line  }}]' value='{{((isset($stop_number)and $stop_number->stop_cargo_type_id >0) ? $stop_number->stop_cargo_type->code: null)}} ' /></td>
                        <td hidden >{{ $stop_number->stop_unit }}<input hidden type='text' name='stop_unit[{{ $stop_number->line  }}]' value='{{ $stop_number->stop_unit }} ' /></td>
                        <td hidden >{{ $stop_number->stop_length }}<input hidden type='text' name='stop_length[{{ $stop_number->line  }}]' value='{{ $stop_number->stop_length }} ' /></td>
                        <td hidden >{{ $stop_number->stop_width }}<input hidden type='text' name='stop_width[{{ $stop_number->line  }}]' value='{{ $stop_number->stop_width }} ' /></td>
                        <td hidden >{{ $stop_number->stop_height }}<input hidden type='text' name='stop_height[{{ $stop_number->line  }}]' value='{{ $stop_number->stop_height }} ' /></td>
                        <td hidden >{{ $stop_number->stop_weight }}<input hidden type='text' name='stop_weight[{{ $stop_number->line  }}]' value='{{ $stop_number->stop_weight }} ' /></td>
                        <td hidden >{{ $stop_number->stop_appt }}<input hidden type='text' name='stop_appt[{{ $stop_number->line  }}]' value='{{ $stop_number->stop_appt }} ' /></td>
                        <td hidden >{{ $stop_number->stop_date }}<input hidden type='text' name='stop_date[{{ $stop_number->line  }}]' value='{{ $stop_number->stop_date }} ' /></td>
                        <td hidden >{{ $stop_number->stop_customer_id }}<input hidden type='text' name='stop_customer_id[{{ $stop_number->line  }}]' value='{{ $stop_number->stop_customer_id }} ' /></td>
                        <td hidden >{{ $stop_number->stop_address }}<input hidden type='text' name='stop_address[{{ $stop_number->line  }}]' value='{{ $stop_number->stop_address }} ' /></td>
                        <td hidden >{{ $stop_number->stop_state_id }}<input hidden type='text' name='stop_state_id[{{ $stop_number->line  }}]' value='{{ $stop_number->stop_state_id }} ' /></td>
                        <td hidden >{{ ((isset($stop_number)and $stop_number->stop_state_id >0) ? $stop_number->stop_state->name: null) }}<input hidden type='text' name='stop_state_name[{{ $stop_number->line  }}]' value='{{ ((isset($stop_number)and $stop_number->stop_state_id >0) ? $stop_number->stop_state->name: null) }} ' /></td>
                        <td hidden >{{ $stop_number->stop_zip_code_id }}<input hidden type='text' name='stop_zip_code_id[{{ $stop_number->line  }}]' value='{{ $stop_number->stop_zip_code_id }} ' /></td>
                        <td hidden >{{ ((isset($stop_number)and $stop_number->stop_zip_code_id >0) ? $stop_number->stop_zip_code->code: null)  }} <input hidden type='text' name='stop_zip_code_code[{{ $stop_number->line  }}]' value='{{ ((isset($stop_number)and $stop_number->stop_zip_code_id >0) ? $stop_number->stop_zip_code->code: null) }}' /></td>
                        <td hidden >{{ $stop_number->stop_contact }}<input hidden type='text' name='stop_contact[{{ $stop_number->line  }}]' value='{{ $stop_number->stop_contact }} ' /></td>
                        <td hidden >{{ $stop_number->stop_ref }}<input hidden type='text' name='stop_ref[{{ $stop_number->line  }}]' value='{{ $stop_number->stop_ref }} ' /></td>
                        <td hidden >{{ $stop_number->stop_reference }}<input hidden type='text' name='stop_reference[{{ $stop_number->line  }}]' value='{{ $stop_number->stop_reference }} ' /></td>
                        <td hidden >{{ $stop_number->stop_direction }}<input hidden type='text' name='stop_direction[{{ $stop_number->line }}]' value='{{ $stop_number->stop_direction }} ' /></td>
                        <td hidden >{{ $stop_number->stop_instruction }}<input hidden type='text' name='stop_instruction[{{ $stop_number->line  }}]' value='{{ $stop_number->stop_instruction }} ' /></td>
                        <td hidden >{{ $stop_number->stop_type }}<input hidden type='text' name='stop_type[{{ $stop_number->line  }}]' value='{{ $stop_number->stop_type }} ' /></td>
                        <td><div class='btn-group btn-group-sm pull-right' role='group'><a class='btn btn-default'><span class='icon ion-edit' aria-hidden='true'></span></a><a class='btn btn-danger'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></div>
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
                @if(isset($pro_numbers))
                @foreach ($pro_numbers as $pro_number)
                    <tr id="{{ $pro_number->line }}">
                        <td hidden >{{ $pro_number->line }}<input hidden type='text' name='SO_line[{{ $pro_number->line }}]' value='{{ $pro_number->line }} ' /></td>
                        <td >{{ $pro_number->pro_number }}<input hidden type='text' name='PRO_number[{{ $pro_number->line  }}]' value='{{ $pro_number->pro_number }}' /></td>
                        <td >{{ $pro_number->pro_detail }}<input hidden type='text' name='PRO_reference[{{ $pro_number->line }}]' value='{{ $pro_number->pro_detail }}' /></td>
                        <td hidden>{{ $pro_number->pro_comment }}<input hidden type='text' name='PRO_remarks[{{ $pro_number->line  }}]' value='{{ $pro_number->pro_comment }}'/></td>
                        <td><div class='btn-group btn-group-sm pull-right' role='group'><a class='btn btn-default'><span class='icon ion-edit' aria-hidden='true'></span></a><a class='btn btn-danger'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></div>
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
                @if(isset($uns_numbers))
                @foreach($uns_numbers as $un_number)
                <tr id="{{ $un_number->line }}">
                    <td  >{{ $un_number->uns_id }}<input hidden type='text' name='hazardous_uns_id[{{ $un_number->line  }}]' value='{{ $un_number->uns_id }} ' /></td>
                    <td hidden >{{ $un_number->line }}<input hidden type='text' name='hazardous_uns_line[{{ $un_number->line  }}]' value='{{ $un_number->line }}' /></td>
                    <td hidden><input hidden type='text' name='hazardous_uns_code[{{ $un_number->line  }}]' value='' /></td>
                    <td >{{ $un_number->description }}<input hidden type='text' name='hazardous_uns_desc[{{ $un_number->line  }}]' value='{{ $un_number->description }}'/></td>
                    <td hidden>{{ $un_number->notes }}<input hidden type='text' name='hazardous_uns_note[{{ $un_number->line  }}]' value='{{ $un_number->notes }}'/></td>
                    <td><div class='btn-group btn-group-sm pull-right' role='group'><a class='btn btn-default'><span class='icon ion-edit' aria-hidden='true'></span></a><a class='btn btn-danger'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></div>
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