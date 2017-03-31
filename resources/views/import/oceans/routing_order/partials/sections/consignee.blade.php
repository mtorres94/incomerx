<fieldset id="To">
    <legend>Consignee</legend>
    <div class="row">
        <div class="col-md-12">{!! Form::bsComplete('col-md-3', 'col-md-9', 'Consignee', 'consignee_id', 'consignee_name', Request::get('term'), ((isset($routing_order) and $routing_order->consignee_id > 0) ? $routing_order->consignee->name : null), 'Customers...') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'RUC', 'consignee_contact', null, ' ') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-12">{!! Form::bsMemo('col-md-3', 'col-md-9', 'Address', 'consignee_address', null, 1, ' ') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-6"> {!! Form::bsText('col-md-6', 'col-md-6', 'Phone', 'consignee_phone', null, '') !!}</div>
        <div class="col-md-6">  {!! Form::bsText('col-md-6', 'col-md-6', 'Fax', 'consignee_fax', null, '') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'Email address', 'consignee_email', null, ' ') !!}</div>
    </div>
</fieldset>