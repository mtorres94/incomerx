<div class="easyui-tabs">
    <div title="Charges Details">
                <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
                    <button type="button" id="btn-charges"class="btn btn-default" data-toggle="modal" data-target="#Charge_Details" onclick="cleanModalFields('Charge_Details')">
                        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-danger" onclick="clearTable('charge_details')">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
                <table class="table table-bordered table-condensed" id="charge_details">
                    <thead>
                    <tr>
                        <th  data-override="charge_id" hidden></th>
                        <th data-override="billing_billing_id" hidden></th>
                        <th width="15%" data-override="billing_billing_code">Billing Code</th>
                        <th width="15%" data-override="billing_billing_description">Description</th>
                        <th width="10%" data-override="billing_bill_type">Bill type</th>
                        <th width="10%" data-override="billing_bill_party">Bill Party</th>
                        <th width="10%" data-override="billing_quantity">Qty</th>
                        <th width="10%" data-override="billing_rate">Rate</th>
                        <th width="10%" data-override="billing_amount">Amount</th>
                        <th width="15%" data-override="billing_currency_type">Currency</th>
                        <th width="20%" data-override="billing_customer_name">Bill to</th>
                        <th width="10%" data-override="cost_amount">Cost</th>
                        <th width="10%" data-override="cost_currency_type">Currency</th>
                        <th width="15%" data-override="cost_invoice">Vendor Inv</th>
                        <th width="15%" data-override="cost_reference">Vendor Ref</th>
                        <th width="0%"/>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($charge_details))
        @foreach($charge_details as $charge_detail)
            <tr id="{{ $charge_detail -> line }} ">
                <td hidden>{{$charge_detail -> line}}<input  hidden type='text' name='charge_id[{{ $charge_detail->line }}]' value='{{ $charge_detail->line }}' /></td>
                <td hidden>{{$charge_detail -> billing_id}}<input hidden type='text' name='billing_billing_id[{{ $charge_detail->line }}]' value='{{ $charge_detail->billing_id }}' /></td>
                <td >{{ ((isset($charge_detail) and $charge_detail->billing_id> 0) ? $charge_detail->billing_billing->code : null) }}<input hidden type='text' name='billing_billing_code[{{ $charge_detail->line  }}]' value='{{  ((isset($charge_detail) and $charge_detail->billing_id> 0) ? $charge_detail->billing_billing->code : null)  }}' /></td>
                <td >{{$charge_detail -> billing_description}}<input hidden type='text' name='billing_billing_description[{{ $charge_detail->line  }}]' value='{{ $charge_detail -> billing_description }}' /></td>
                <td >{{$charge_detail -> bill_type}}<input hidden type='text' name='billing_bill_type[{{ $charge_detail->line }}]' value='{{ $charge_detail->bill_type }}' /></td>
                <td >{{$charge_detail -> bill_party}}<input hidden type='text' name='billing_bill_party[{{ $charge_detail->line  }}]' value='{{ $charge_detail->bill_party }}' /></td>
                <td >{{$charge_detail -> billing_quantity}}<input hidden type='text' name='billing_quantity[{{ $charge_detail->line  }}]' value='{{ $charge_detail->billing_quantity }}' /></td>
                <td >{{$charge_detail -> billing_rate}}<input hidden type='text' name='billing_rate[{{ $charge_detail->line  }}]' value='{{ $charge_detail->billing_rate }}' /></td>
                <td >{{$charge_detail -> billing_amount}}<input hidden type='text' name='billing_amount[{{ $charge_detail->line  }}]' value='{{ $charge_detail->billing_quantity }}' /></td>
                <td >{{$charge_detail -> billing_currency_type}}<input hidden type='text' name='billing_currency_type[{{ $charge_detail->line }}]' value='{{ $charge_detail->billing_currency_type }}' /></td>
                <td>{{ ((isset($charge_detail)and $charge_detail->billing_customer_id >0) ? $charge_detail->billing_customer->name: null)  }}<input hidden type='text' name='billing_customer_name[{{ $charge_detail->line  }}]' value='{{  ((isset($charge_detail)and $charge_detail->billing_customer_id >0) ? $charge_detail->billing_customer->name: null)  }}' /></td>
                <td >{{$charge_detail -> cost_amount}}<input hidden type='text' name='cost_amount[{{ $charge_detail->line  }}]' value='{{ $charge_detail->cost_amount }}' /></td>
                <td >{{$charge_detail -> cost_currency_type}}<input hidden type='text' name='cost_currency_type[{{ $charge_detail->line  }}]' value='{{ $charge_detail->cost_currency_type }}' /></td>
                <td >{{$charge_detail -> cost_invoice}}<input hidden type='text' name='cost_invoice[{{ $charge_detail->line  }}]' value='{{ $charge_detail->cost_invoice }}' /></td>
                <td >{{$charge_detail -> cost_reference}}<input hidden type='text' name='cost_reference[{{ $charge_detail->line  }}]' value='{{ $charge_detail->cost_reference }}' /></td>
                <td hidden>{{$charge_detail -> billing_notes}}<input hidden type='text' name='billing_notes[{{ $charge_detail->line  }}]' value='{{ $charge_detail->billing_notes }}' /></td>
                <td hidden>{{$charge_detail -> billing_unit_id}}<input hidden type='text' name='billing_unit_id[{{ $charge_detail->line  }}]' value='{{ $charge_detail->billing_unit_id }}' /></td>
                <td hidden>{{  ((isset($charge_detail)and $charge_detail->billing_unit_id >0) ? $charge_detail->billing_unit->code: null)   }}<input hidden type='text' name='billing_unit_name[{{ $charge_detail->line}}]' value='{{ ((isset($charge_detail)and $charge_detail->billing_unit_id >0) ? $charge_detail->billing_unit->code: null) }}' /></td>
                <td hidden>{{$charge_detail -> billing_exchange_rate}}<input hidden type='text' name='billing_exchange_rate[{{ $charge_detail->line }}]' value='{{ $charge_detail->billing_exchange_rate }}' /></td>
                <td hidden>{{$charge_detail -> billing_customer_id}}<input hidden type='text' name='billing_customer_id[{{ $charge_detail->line  }}]' value='{{ $charge_detail->billing_customer_id }}' /></td>
                <td hidden>{{$charge_detail -> cost_quantity}}<input hidden type='text' name='cost_quantity[{{ $charge_detail->line  }}]' value='{{ $charge_detail->cost_quantity }}' /></td>
                <td hidden>{{$charge_detail -> cost_unit_id}}<input hidden type='text' name='cost_unit_id[{{ $charge_detail->line  }}]' value='{{ $charge_detail->cost_unit_id }}' /></td>
                <td hidden>{{ ((isset($charge_detail)and $charge_detail->cost_unit_id >0) ? $charge_detail->cost_unit->code: null)  }}<input hidden type='text' name='cost_unit_name[{{ $charge_detail->line  }}]' value='{{  ((isset($charge_detail)and $charge_detail->cost_unit_id >0) ? $charge_detail->cost_unit->code: null)   }}' /></td>
                <td hidden>{{$charge_detail -> cost_rate}}<input hidden type='text' name='cost_rate[{{ $charge_detail->line  }}]' value='{{ $charge_detail->cost_rate }}' /></td>
                <td >{{$charge_detail -> cost_center}} <input hidden type='text' name='cost_cost_center[{{ $charge_detail->line  }}]' value='{{ $charge_detail->cost_center }}' /></td>
                <td hidden>{{$charge_detail -> cost_exchange_rate}}<input hidden type='text' name='cost_exchange_rate[{{ $charge_detail->line  }}]' value='{{ $charge_detail->cost_exchange_rate }}' /></td>
                <td hidden>{{$charge_detail -> vendor_id}}<input hidden type='text' name='billing_vendor_code[{{ $charge_detail->line  }}]' value='{{ $charge_detail->vendor_id }}' /></td>
                <td hidden>{{  ((isset($charge_detail)and $charge_detail->vendor_id >0) ? $charge_detail->billing_vendor->name: null)   }}<input hidden type='text' name='billing_vendor_name[{{ $charge_detail->line  }}]' value='{{ ((isset($charge_detail)and $charge_detail->vendor_id >0) ? $charge_detail->billing_vendor->name: null) }}' /></td>
                <td hidden>{{$charge_detail -> cost_date}}<input hidden type='text' name='cost_date[{{ $charge_detail->line  }}]' value='{{ $charge_detail->cost_date }}' /></td>
                <td hidden>{{$charge_detail -> billing_increase}}<input hidden type='text' name='billing_increase[{{ $charge_detail->line }}]' value='{{ $charge_detail->billing_increase }}' /></td>
                <td><div class='btn-group btn-group-sm pull-right' role='group'><a class='btn btn-default' id="btn_edit_charge"><span class='icon ion-edit' aria-hidden='true'></span></a><a class='btn btn-danger'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></div>

            </tr>
        @endforeach
        @endif
                    </tbody>
                </table>
        <div class="row row-panel">
            <div class="pull-left">
                <button type="button" id="btn-calculate_rate"class="btn btn-default" >Calculate Rate</button>
            </div>
            <div class="col-md-3">{!! Form::bsCheck('Do not bill from this transactions', 'charges_check') !!}</div>
            <div class="col-md-1">{!! Form::bsText(null,null, 'Bill', 'charges_bill', null, '0.00') !!}</div>
            <div class="col-md-1">{!! Form::bsText(null,null, 'Cost', 'charges_cost', null, '0.00') !!}</div>
            <div class="col-md-1">{!! Form::bsText(null,null, 'Profit', 'charges_profit', null, '0.00') !!}</div>
            <div class="col-md-1">{!! Form::bsText(null,null, 'Profit %', 'charges_profit_p', null, '0.00') !!}</div>
        </div>
    </div>
    <div title="Transportation Plans">
        <div class="btn-group btn-group-sm pull-right" role="group" style="padding-bottom: 10px;">
            <button type="button" id="btn-transportation"class="btn btn-default" data-toggle="modal" data-target="#Transportation_Details" onclick="cleanModalFields('Transportation_Details')">
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
                <th width="10%" data-override="transportation_leg">Leg</th>
                <th width="10%" data-override="transportation_mode">Mode</th>
                <th  data-override="transportation_carrier_id" hidden></th>
                <th width="25%"data-override="transportation_carrier">Carrier</th>
                <th  data-override="transportation_loading_id" hidden></th>
                <th width="10%"data-override="transportation_loading">Loading</th>
                <th  data-override="transportation_unloading_id" hidden></th>
                <th width="10%"data-override="transportation_unloading">Unloading</th>
                <th width="10%"data-override="transportation_ETD">ETD</th>
                <th width="15%"data-override="transportation_ETA">ETA</th>
                <th width="15%"data-override="transportation_status">Status</th>
                <th width="15%"data-override="transportation_amount">Amount</th>
                <th width="0%"/>
            </tr>
            </thead>
            <tbody>
            @if(isset($trans_details))
                @foreach($trans_details as $trans_detail)
                    <tr id="{{ $trans_detail->line }}">
                        <td hidden>{{ $trans_detail-> line }}<input hidden type='text' name='transportation_id[{{ $trans_detail-> line }}]' value='{{ $trans_detail-> line }}' /></td>
                        <td >{{ $trans_detail-> leg }}<input hidden type='text' name='transportation_leg[{{ $trans_detail-> line }}]' value='{{ $trans_detail->leg }}' /></td>
                        <td >{{ $trans_detail-> mode }}<input hidden type='text' name='transportation_mode[{{ $trans_detail-> line }}]' value='{{ $trans_detail-> mode }}' /></td>
                        <td hidden>{{ $trans_detail-> carrier_id }}<input hidden type='text' name='transportation_carrier_id[{{ $trans_detail-> line }}]' value='{{ $trans_detail-> carrier_id }}' /></td>
                        <td >{{ ((isset($trans_detail)and $trans_detail->carrier_id >0) ? $trans_detail->transportation_carrier->code : null) }}<input hidden type='text' name='transportation_carrier_name[{{ $trans_detail-> line }}]' value='{{ ((isset($trans_detail)and $trans_detail->carrier_id >0) ? $trans_detail->transportation_carrier->code : null) }}' /></td>
                        <td hidden>{{ $trans_detail->loading_location_id }}<input hidden type='text' name='transportation_loading_location_id[{{ $trans_detail-> line }}]' value='{{ $trans_detail->loading_location_id }}' /></td>

                        <td >{{ ((isset($trans_detail)and $trans_detail->loading_location_id >0) ? $trans_detail->transportation_loading_location->name: null) }}<input hidden type='text' name='transportation_loading_location_name[{{ $trans_detail-> line }}]' value='{{ ((isset($trans_detail)and $trans_detail->loading_location_id >0) ? $trans_detail->transportation_loading_location->name: null) }}' /></td>

                        <td hidden>{{ $trans_detail->unloading_location_id }}<input hidden type='text' name='transportation_unloading_location_id[{{ $trans_detail-> line }}]' value='{{ $trans_detail-> unloading_location_id }}' /></td>

                        <td >{{ ((isset($trans_detail)and $trans_detail->unloading_location_id >0) ? $trans_detail->transportation_unloading_location->name: null) }}<input hidden type='text' name='transportation_unloading_location_name[{{ $trans_detail-> line }}]' value='{{ ((isset($trans_detail)and $trans_detail->unloading_location_id >0) ? $trans_detail->transportation_unloading_location->name: null) }}' /></td>

                        <td >{{ $trans_detail-> ETD_date }}<input hidden type='text' name='transportation_ETD_date[{{ $trans_detail-> line }}]' value='{{ $trans_detail-> ETD_date }}' /></td>
                        <td >{{ $trans_detail-> ETA_date }}<input hidden type='text' name='transportation_ETA_date[{{ $trans_detail-> line }}]' value='{{ $trans_detail-> ETA_date }}' /></td>
                        <td >{{ $trans_detail-> leg_satus }}<input hidden type='text' name='transportation_leg_status[{{ $trans_detail-> line }}]' value='{{ $trans_detail-> leg_status }}' /></td>
                        <td >{{ $trans_detail->amount }}<input hidden type='text' name='transportation_amount[{{ $trans_detail-> line }}]' value='{{ $trans_detail-> amount }}' /></td>

                        <td hidden>{{ $trans_detail->billing_id }}<input hidden type='text' name='transportation_billing_id[{{ $trans_detail-> line }}]' value='{{ $trans_detail-> billing_id }}' /></td>

                        <td hidden>{{ ((isset($trans_detail)and $trans_detail->billing_id >0) ? $trans_detail->transportation_billing->code: null) }}<input hidden type='text' name='transportation_billing_code[{{ $trans_detail-> line }}]' value='{{ ((isset($trans_detail)and $trans_detail->billing_id >0) ? $trans_detail->transportation_billing->code: null) }}' /></td>
                        <td hidden>{{ $trans_detail-> description }}<input hidden type='text' name='transportation_description[{{ $trans_detail-> line }}]' value='{{ $trans_detail-> description }}' /></td>

                        <td hidden>{{ $trans_detail-> service_id }}<input hidden type='text' name='transportation_service_id[{{ $trans_detail-> line }}]' value='{{ $trans_detail-> service_id }}' /></td>

                        <td hidden>{{ ((isset($trans_detail)and $trans_detail->service_id >0) ? $trans_detail->transportation_service->name: null) }}<input hidden type='text' name='transportation_service_id[{{ $trans_detail-> line }}]' value='{{ ((isset($trans_detail)and $trans_detail->service_id >0) ? $trans_detail->transportation_service->name: null) }}' /></td>
                        <td hidden>{{ $trans_detail->notify }}<input hidden type='text' name='transportation_notify[{{ $trans_detail-> line }}]' value='{{ $trans_detail-> notify }}' /></td>
                        <td hidden>{{ $trans_detail->loading_reference }}<input hidden type='text' name='transportation_loading_reference[{{ $trans_detail-> line }}]' value='{{ $trans_detail-> loading_reference }}' /></td>
                        <td hidden>{{ $trans_detail->unloading_reference }}<input hidden type='text' name='transportation_unloading_reference[{{ $trans_detail-> line }}]' value='{{ $trans_detail-> unloading_reference }}' /></td>
                        <td hidden>{{ $trans_detail->origin_from_type }}<input hidden type='text' name='origin_from_type[{{ $trans_detail-> line }}]' value='{{ $trans_detail-> origin_from_type }}' /></td>
                        <td hidden>{{ $trans_detail->origin_from_shipper_id }}<input hidden type='text' name='origin_from_shipper_id[{{ $trans_detail-> line }}]' value='{{ $trans_detail-> origin_from_shipper_id }}' /></td>
                        <td hidden>{{ ((isset($trans_detail)and $trans_detail-> origin_from_shipper_id >0) ? $trans_detail-> origin_from_shipper->name: null) }}<input hidden type='text' name='origin_from_shipper_name[{{ $trans_detail-> line }}]' value='{{ ((isset($trans_detail)and $trans_detail-> origin_from_shipper_id >0) ? $trans_detail-> origin_from_shipper->name: null) }}' /></td>
                        <td hidden>{{ $trans_detail->origin_from_address }}<input hidden type='text' name='origin_from_address[{{ $trans_detail-> line }}]' value='{{ $trans_detail-> origin_from_address }}' /></td>
                        <td hidden>{{ $trans_detail->origin_from_city }}<input hidden type='text' name='origin_from_city[{{ $trans_detail-> line }}]' value='{{ $trans_detail-> origin_from_city }}' /></td>

                        <td hidden>{{ $trans_detail->origin_from_state_id }}<input hidden type='text' name='origin_from_state_id[{{ $trans_detail-> line }}]' value='{{ $trans_detail-> origin_from_state_id }}' /></td>
                        <td hidden>{{ ((isset($trans_detail)and $trans_detail-> origin_from_state_id >0) ? $trans_detail-> origin_from_state->name: null) }}<input hidden type='text' name='origin_from_state_name[{{ $trans_detail-> line }}]' value='{{ ((isset($trans_detail)and $trans_detail-> origin_from_state_id >0) ? $trans_detail-> origin_from_state->name: null) }}' /></td>
                        <td hidden>{{ $trans_detail->origin_from_country_id }}<input hidden type='text' name='origin_from_country_id[{{ $trans_detail-> line }}]' value='{{$trans_detail->origin_from_country_id}}' /></td>
                        <td hidden>{{ ((isset($trans_detail)and $trans_detail->origin_from_country_id >0) ? $trans_detail->origin_from_country->name: null) }}<input hidden type='text' name='origin_from_country_name[{{ $trans_detail-> line }}]' value='{{ ((isset($trans_detail)and $trans_detail->origin_from_country_id >0) ? $trans_detail->origin_from_country->name: null) }}' /></td>
                        <td hidden>{{$trans_detail->origin_from_zip_code_id}}<input hidden type='text' name='origin_from_zip_code_id[{{ $trans_detail-> line }}]' value='{{$trans_detail->origin_from_zip_code_id}}' /></td>
                        <td hidden>{{ ((isset($trans_detail)and $trans_detail-> origin_from_zip_code_id >0) ? $trans_detail-> origin_from_zip_code->code: null) }}<input hidden type='text' name='origin_from_zip_code_code[{{ $trans_detail-> line }}]' value='{{((isset($trans_detail)and $trans_detail-> origin_from_zip_code_id >0) ? $trans_detail-> origin_from_zip_code->code: null)}}'/></td>
                        <td hidden>{{ $trans_detail->origin_from_contact }} <input hidden type='text' name='origin_from_contact[{{ $trans_detail-> line }}]' value='{{$trans_detail->origin_from_contact}}' /></td>
                        <td hidden>{{ $trans_detail->origin_from_phone}} <input hidden type='text' name='origin_from_phone[{{ $trans_detail-> line }}]' value='{{$trans_detail->origin_from_phone}}' /></td>
                        <td hidden>{{ $trans_detail->origin_from_fax}} <input hidden type='text' name='origin_from_fax[{{ $trans_detail-> line }}]' value='{{$trans_detail->origin_from_fax}}' /></td>
                        <td hidden>{{ $trans_detail->origin_to_type }} <input hidden type='text' name='origin_to_type[{{ $trans_detail-> line }}]' value='{{$trans_detail->origin_to_type}}' /></td>
                        <td hidden>{{ $trans_detail->origin_to_consignee_id }} <input hidden type='text' name='origin_to_consignee_id[{{ $trans_detail-> line }}]' value='{{$trans_detail->origin_to_consignee_id}}' /></td>
                        <td hidden>{{ ((isset($trans_detail)and $trans_detail->origin_to_consignee_id >0) ? $trans_detail->origin_to_consignee->name: null) }}<input hidden type='text' name='origin_to_consignee_name[{{ $trans_detail-> line }}]' value='{{ ((isset($trans_detail)and $trans_detail->origin_to_consignee_id >0) ? $trans_detail->origin_to_consignee->name: null) }}' /></td>
                        <td hidden>{{ $trans_detail->origin_to_address }} <input hidden type='text' name='origin_to_address[{{ $trans_detail-> line }}]' value='{{$trans_detail->origin_to_address}}' /></td>
                        <td hidden>{{ $trans_detail->origin_to_city }} <input hidden type='text' name='origin_to_city[{{ $trans_detail-> line }}]' value='{{$trans_detail->origin_to_city}}' /></td>

                        <td hidden>{{ $trans_detail->origin_to_state_id }} <input hidden type='text' name='origin_to_state_id[{{ $trans_detail-> line }}]' value='{{$trans_detail->origin_to_state_id}}' /></td>
                        <td hidden>{{ ((isset($trans_detail)and $trans_detail->origin_to_state_id >0) ? $trans_detail->origin_to_state->name: null) }}<input hidden type='text' name='origin_to_state_name[{{ $trans_detail-> line }}]' value='{{ ((isset($trans_detail)and $trans_detail->origin_to_state_id >0) ? $trans_detail->origin_to_state->name: null) }}' /></td>
                        <td hidden>{{ $trans_detail->origin_to_country_id }} <input hidden type='text' name='origin_to_country_id[{{ $trans_detail-> line }}]' value='{{$trans_detail->origin_to_country_id}}' /></td>
                        <td hidden>{{ ((isset($trans_detail)and $trans_detail->origin_to_country_id >0) ? $trans_detail->origin_to_country->name: null) }} <input hidden type='text' name='origin_to_country_name[{{ $trans_detail-> line }}]' value='{{((isset($trans_detail)and $trans_detail->origin_to_country_id >0) ? $trans_detail->origin_to_country->name: null)}}' /></td>
                        <td hidden>{{ $trans_detail->origin_to_zip_code_id }} <input hidden type='text' name='origin_to_zip_code_id[{{ $trans_detail-> line }}]' value='{{$trans_detail->origin_to_zip_code_id}}' /></td>
                        <td hidden>{{ ((isset($trans_detail)and $trans_detail->origin_to_zip_code_id >0) ? $trans_detail->origin_to_zip_code->code : null)}}<input hidden type='text' name='origin_to_zip_code_code[{{ $trans_detail-> line }}]' value='{{ ((isset($trans_detail)and $trans_detail->origin_to_zip_code_id >0) ? $trans_detail->origin_to_zip_code->code : null) }}' /></td>
                        <td hidden>{{ $trans_detail->origin_to_contact }} <input hidden type='text' name='origin_to_contact[{{ $trans_detail-> line }}]' value='{{$trans_detail->origin_to_contact}}' /></td>
                        <td hidden>{{ $trans_detail->origin_to_phone}} <input hidden type='text' name='origin_to_phone[{{ $trans_detail-> line }}]' value='{{$trans_detail->origin_to_phone}}' /></td>
                        <td hidden>{{ $trans_detail->origin_to_fax}} <input hidden type='text' name='origin_to_fax[{{ $trans_detail-> line }}]' value='{{$trans_detail->origin_to_fax}}' /></td>

                        <td><div class='btn-group btn-group-sm pull-right' role='group'><a class='btn btn-default' id=" btn_edit_transportation"><span class='icon ion-edit' aria-hidden='true'></span></a><a class='btn btn-danger'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></div>


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
