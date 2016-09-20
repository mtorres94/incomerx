<!-- Tabs Delivery -->

<div class="easyui-tabs">
    <div title="To">
        <div class="form-horizontal">
            <div class="row">
                {!! Form::bsComplete('col-md-3', 'col-md-9', 'Consignee', 'consignee_id', 'consignee_name', Request::get('term'), ((isset($order_entry) and $order_entry->consignee_id > 0) ? $order_entry->consignee->name : null), 'Customers...') !!}
            </div>
            <div class="row">
                {!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'to_address', null, 1, '') !!}
            </div>
            <div class="row">
                {!! Form::bsText('col-md-3', 'col-md-9', 'City', 'to_city', null, '') !!}
            </div>
            <div class="row">
                {!! Form::bsComplete('col-md-3', 'col-md-9', 'State', 'to_state_id', 'to_state_name', Request::get('term'), ((isset($order_entry) and $order_entry->to_state_id > 0) ? $order_entry->to_state->name : null), 'States...') !!}
            </div>
            <div class="row">
                {!! Form::bsComplete('col-md-3', 'col-md-9', 'Postal Code', 'to_zip_code_id', 'to_zip_code_code', Request::get('term'), ((isset($order_entry) and $order_entry->to_zip_code_id > 0) ? $order_entry->to_zip_code->code : null), 'Zip Code...') !!}
            </div>
            <div class="row">
                {!! Form::bsText('col-md-3', 'col-md-4', 'Phone', 'to_phone', null, '') !!}
            </div>
            <div class="row">
                {!! Form::bsText('col-md-3', 'col-md-4', 'Fax', 'to_fax', null, '') !!}
            </div>
            <div class="row">
                {!! Form::bsText('col-md-3', 'col-md-4', 'Ref', 'to_reference', null, '') !!}
            </div>
        </div>
    </div>

    <div title="Delivery">
        <div class="form-horizontal">
            <div class="row">
                {!! Form::bsSelect('col-md-3','col-md-9' , 'Type', 'delivery_type', array(
                    '01' => '01 - CARRIERS',
                    '02' => '02 - CUSTOMERS',
                ), ' ') !!}
            </div>
            <div class="row">
                {!! Form::bsComplete('col-md-3', 'col-md-9', 'ID', 'delivery_id', 'delivery_name', Request::get('term'), ((isset($order_entry) and $order_entry->delivery_id > 0) ? $order_entry->delivery->name : null), '') !!}
            </div>
            <div class="row">
                {!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'delivery_address', null, 1, 'Address') !!}
            </div>
            <div class="row">
                {!! Form::bsText('col-md-3', 'col-md-9', 'City', 'delivery_city', null, 'City') !!}
            </div>
            <div class="row">
                {!! Form::bsComplete('col-md-3', 'col-md-9', 'State', 'delivery_state_id', 'delivery_state_name', Request::get('term'), ((isset($order_entry) and $order_entry->delivery_state_id > 0) ? $order_entry->delivery_state->name : null), 'States...') !!}
            </div>
            <div class="row">
                {!! Form::bsComplete('col-md-3', 'col-md-9', 'Postal Code', 'delivery_zip_code_id', 'delivery_zip_code_code', Request::get('term'), ((isset($order_entry) and $order_entry->delivery_zip_code_id > 0) ? $order_entry->delivery_zip_code->code : null), 'Zip Code...') !!}
            </div>
            <div class="row">
                {!! Form::bsText('col-md-3', 'col-md-4', 'Phone', 'delivery_phone', null, '') !!}
            </div>
            <div class="row">
                {!! Form::bsText('col-md-3', 'col-md-4', 'Fax', 'delivery_fax', null, '') !!}
            </div>
            <div class="row">
                {!! Form::bsText('col-md-3', 'col-md-4', 'Ref', 'delivery_reference', null, '') !!}
            </div>
        </div>
    </div>

    <div title="Delivery Instructions">
        <div class="form-horizontal">
            <div class="col-md-12">
                <div style="padding-top: 10px;padding-bottom: 15px;">
                    {!! Form::bsMemo(null, null, 'Instructions', 'delivery_comment', null, 4, '') !!}
                </div>
            </div>
        </div>
    </div>

</div>
