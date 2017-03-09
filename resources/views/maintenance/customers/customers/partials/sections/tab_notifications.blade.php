<div class="row">
    <div class="col-md-12">
        <div class="col-md-4">{!! Form::bsCheck('col-md-1', 'col-md-8', 'Email notification', 'email_notification', (isset($customer) ? $customer->consignee : 'off')) !!}</div>
        <div class="col-md-8">{!! Form::bsText(null, 'col-md-9', '', 'emails', null, '') !!}</div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-4">{!! Form::bsCheck('col-md-1', 'col-md-8', 'Attachments notification', 'attachment_notification', (isset($customer) ? $customer->consignee : 'off')) !!}</div>
        <div class="col-md-8">{!! Form::bsText(null, 'col-md-9', '', 'emails', null, '') !!}</div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-3">
            <h3>Warehouse</h3>
            {!! Form::bsCheck('col-md-1', 'col-md-2', 'Receipt', 'receipt', (isset($customer) ? $customer->receipt : 'off')) !!}
            {!! Form::bsCheck('col-md-1', 'col-md-2', 'Withdraw', 'withdraw', (isset($customer) ? $customer->withdraw : 'off')) !!}
            {!! Form::bsCheck('col-md-1', 'col-md-2', 'Shipment', 'shipment', (isset($customer) ? $customer->shipment : 'off')) !!}
        </div>
        <div class="col-md-2">
            <h3>Air Export</h3>
            {!! Form::bsCheck('col-md-1', 'col-md-8', 'Loading Guide', 'ea_loading_guide', (isset($customer) ? $customer->ea_loading_guide : 'off')) !!}
            {!! Form::bsCheck('col-md-1', 'col-md-8', 'Airwaybill', 'ea_airwaybill', (isset($customer) ? $customer->ea_airwaybill : 'off')) !!}
            {!! Form::bsCheck('col-md-1', 'col-md-8', 'Manifest', 'ea_manifest', (isset($customer) ? $customer->ea_manifest : 'off')) !!}
        </div>
        <div class="col-md-2">
            <h3>Ocean Export</h3>
            {!! Form::bsCheck('col-md-1', 'col-md-8', 'Loading Guide', 'eo_loading_guide', (isset($customer) ? $customer->eo_loading_guide : 'off')) !!}
            {!! Form::bsCheck('col-md-1', 'col-md-8', 'Bill of Lading', 'eo_bill_of_lading', (isset($customer) ? $customer->eo_bill_of_lading : 'off')) !!}
            {!! Form::bsCheck('col-md-1', 'col-md-8', 'Manifest', 'eo_manifest', (isset($customer) ? $customer->eo_manifest : 'off')) !!}
        </div>
        <div class="col-md-3">
            <h3>3PL Warehouse</h3>
            {!! Form::bsCheck('col-md-1', 'col-md-8', 'Sales Order', 'w_sales_order', (isset($customer) ? $customer->w_sales_order : 'off')) !!}
            {!! Form::bsCheck('col-md-1', 'col-md-8', 'Bill of Lading', 'w_bill_of_lading', (isset($customer) ? $customer->w_bill_of_lading: 'off')) !!}
            {!! Form::bsCheck('col-md-1', 'col-md-8', 'Receiving Log', 'w_receiving_log', (isset($customer) ? $customer->w_receiving_log : 'off')) !!}
        </div>
        <div class="col-md-2">
            <h3>A/B Invoice</h3>
            {!! Form::bsCheck('col-md-1', 'col-md-8', 'Invoice', 'i_invoice', (isset($customer) ? $customer->i_invoice : 'off')) !!}
            {!! Form::bsCheck('col-md-1', 'col-md-8', 'Select/ Deselect', 'select_all', null) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="col-md-3">
            <h3>Pickup Delivery</h3>
            {!! Form::bsCheck('col-md-1', 'col-md-8', 'Orders', 'pd_orders', (isset($customer) ? $customer->pd_orders : 'off')) !!}
        </div>
        <div class="col-md-2">
            <h3>Air Import</h3>
            {!! Form::bsCheck('col-md-1', 'col-md-8', 'Airwaybill', 'ia_airwaybill', (isset($customer) ? $customer->ia_airwaybill: 'off')) !!}
        </div>
        <div class="col-md-2">
            <h3>Ocean Import</h3>
            {!! Form::bsCheck('col-md-1', 'col-md-8', 'Bill of Lading', 'io_bill_of_lading', (isset($customer) ? $customer->io_bill_of_lading : 'off')) !!}
        </div>
        <div class="col-md-3">
            <h3>Customer Service</h3>
            {!! Form::bsCheck('col-md-1', 'col-md-9', 'Shipping Instructions', 'c_shipping', (isset($customer) ? $customer->c_shipping : 'off')) !!}
        </div>
        <div class="col-md-2">
            <h3>PO Mngmt</h3>
            {!! Form::bsCheck('col-md-1', 'col-md-8', 'PO Orders', 'po_orders', (isset($customer) ? $customer->po_orders : 'off')) !!}
        </div>
    </div>
</div>
