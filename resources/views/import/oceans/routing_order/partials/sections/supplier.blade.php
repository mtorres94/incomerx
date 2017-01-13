<div class="col-md-6">

    <h4>Supplier</h4>
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Name', 'supplier_id', 'supplier_name', Request::get('term'),((isset($routing_order) and $routing_order->supplier_id > 0) ? $routing_order->supplier->name : null), 'Customers...') !!}
    </div>
    <div class="row">
        {!! Form::bsText('col-md-3', 'col-md-9', 'Contact', 'supplier_contact', null, ' ') !!}
    </div>
    <div class="row">
        {!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'supplier_address', null, 1, ' ') !!}
    </div>
    <div class="row">
        <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Phone', 'supplier_phone', null, '') !!}</div>
        <div class="col-md-6">{!! Form::bsText('col-md-6', 'col-md-6', 'Fax', 'supplier_fax', null, '') !!}</div>
    </div>
    <div class="row">
        {!! Form::bsText('col-md-3', 'col-md-9', 'Email', 'supplier_email', null, ' ') !!}
    </div>

</div>
<div class="col-md-6">
    <div class="row">
        {!! Form::bsComplete('col-md-3', 'col-md-9', 'Commodity', 'supplier_commodity_id', 'supplier_commodity_code', Request::get('term'), ((isset($routing_order) and $routing_order->supplier_commodity_id > 0) ? $routing_order->supplier_commodity->code : null), 'Commodity') !!}
    </div>
    <div class="row">
        {!! Form::bsText('col-md-3', 'col-md-6', 'PO Number', 'supplier_po_number', null, '') !!}
    </div>
    <div class="row">
           {!! Form::bsSelect('col-md-3', 'col-md-3', ' Unit', 'unit_weight', array(
                'K' => 'Kgs',
                'L' => 'Lbs'
            ), null) !!}
    </div>
    <div class="row">
            {!! Form::bsText('col-md-3', 'col-md-3', 'Weight', 'supplier_weight', null, '') !!}

    </div>
    <div class="row">

            {!! Form::bsText('col-md-3', 'col-md-3', 'Volume', 'supplier_volume', null, '') !!}

    </div>
</div>