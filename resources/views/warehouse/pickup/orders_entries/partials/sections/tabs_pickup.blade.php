<!-- Tabs Pickup-->

    <div class="easyui-tabs">
        <div title="From">
            <div class="form-horizontal">
                <div class="row">
                    {!! Form::bsComplete('col-md-3', 'col-md-9', 'Shipper', 'shipper_id', 'shipper_name', Request::get('term'), ((isset($order_entry) and $order_entry->shipper_id > 0) ? $order_entry->shipper->name : null), 'Customers...') !!}
                </div>
                <div class="row">
                    {!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'shipper_address', null, 1, ' ') !!}
                </div>
                <div class="row">
                    {!! Form::bsText('col-md-3', 'col-md-9', 'City', 'shipper_city', null, ' ') !!}
                </div>
                <div class="row">
                    {!! Form::bsComplete('col-md-3', 'col-md-9', 'State', 'shipper_state_id', 'shipper_state_name', Request::get('term'), ((isset($order_entry) and $order_entry->shipper_state_id > 0) ? $order_entry->shipper_state->name : null), 'States...') !!}
                </div>
                <div class="row">
                    {!! Form::bsComplete('col-md-3', 'col-md-9', 'Postal Code', 'shipper_zip_code_id', 'shipper_zip_code_code', Request::get('term'), ((isset($order_entry) and $order_entry->shipper_zip_code_id > 0) ? $order_entry->shipper_zip_code->code : null), 'Zip Code...') !!}
                </div>
                <div class="row">
                    {!! Form::bsText('col-md-3', 'col-md-6', 'Phone', 'shipper_phone', null, '') !!}
                </div>
                <div class="row">
                    {!! Form::bsText('col-md-3', 'col-md-6', 'Fax', 'shipper_fax', null, '') !!}
                </div>
                <div class="row">
                    {!! Form::bsText('col-md-3', 'col-md-6', 'Ref', 'shipper_reference', null, '') !!}
                </div>
            </div>
        </div>

        <div title="Pickup">
            <div class="form-horizontal">
                <div class="row">
                    {!! Form::bsSelect('col-md-3','col-md-9' , 'Type', 'pickup_type', array(
                        '01' => '01 - CARRIERS',
                        '02' => '02 - CUSTOMERS',
                    ), ' ') !!}
                </div>
                <div class="row">
                    {!! Form::bsComplete('col-md-3', 'col-md-9', 'ID', 'pickup_id', 'pickup_name', Request::get('term'), null, '') !!}
                </div>
                <div class="row">
                    {!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'pickup_address', null, 1, 'Address') !!}
                </div>
                <div class="row">
                    {!! Form::bsText('col-md-3', 'col-md-9', 'City', 'pickup_city', null, 'City') !!}
                </div>
                <div class="row">
                    {!! Form::bsComplete('col-md-3', 'col-md-9', 'State', 'pickup_state_id', 'pickup_state_name', Request::get('term'), ((isset($order_entry) and $order_entry->pickup_state_id > 0) ? $order_entry->pickup_state->name : null), 'States...') !!}
                </div>
                <div class="row">
                    {!! Form::bsComplete('col-md-3', 'col-md-9', 'Postal Code', 'pickup_zip_code_id', 'pickup_zip_code_code', Request::get('term'), ((isset($order_entry) and $order_entry->pickup_zip_code_id > 0) ? $order_entry->pickup_zip_code->code : null), 'Zip Code...') !!}
                </div>
                <div class="row">
                    {!! Form::bsText('col-md-3', 'col-md-4', 'Phone', 'pickup_phone', null, '') !!}
                </div>
                <div class="row">
                    {!! Form::bsText('col-md-3', 'col-md-4', 'Fax', 'pickup_fax', null, '') !!}
                </div>
                <div class="row">
                    {!! Form::bsText('col-md-3', 'col-md-4', 'Ref', 'pickup_reference', null, '') !!}
                </div>
            </div>
        </div>

        <div title="Pickup Instructions">
            <div class="form-horizontal">
                <div class="col-md-12">
                    <div style="padding-top: 10px;padding-bottom: 15px;">
                        {!! Form::bsMemo(null, null, 'Instructions', 'instructions_comments', null, 4, '') !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
