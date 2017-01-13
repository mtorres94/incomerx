<fieldset id="From">
    <legend>Shipper</legend>
    <div class="row">
        <div class="col-md-12">
            {!! Form::bsComplete('col-md-3', 'col-md-9', 'Shipper', 'shipper_id', 'shipper_name', Request::get('term'), ((isset($routing_order) and $routing_order->shipper_id > 0) ? $routing_order->shipper->name : null), 'Customers...') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'Contact', 'shipper_contact', null, ' ') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-12"> {!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'shipper_address', null, 1, ' ') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-6"> {!! Form::bsText('col-md-6', 'col-md-6', 'Phone', 'shipper_phone', null, '') !!}</div>
        <div class="col-md-6">  {!! Form::bsText('col-md-6', 'col-md-6', 'Fax', 'shipper_fax', null, '') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-12">
        {!! Form::bsText('col-md-3', 'col-md-9', 'Email address', 'shipper_email', null, ' ') !!}
        </div>
    </div>
</fieldset>