<fieldset>
    <div class="col-md-6">
        <div class="row">{!! Form::bsComplete('col-md-3','col-md-8','Broker ', 'broker_id', 'broker_name', Request::get('term'),((isset($shipment_entry) and $shipment_entry->broker_id > 0) ? $shipment_entry->broker->name : null), 'Vendor', null) !!}</div>
        <div class="row">{!! Form::bsText('col-md-3','col-md-8','Contact', 'broker_contact',null, '') !!}</div>
    </div>
    <div class="col-md-6">
        <div class="row">{!! Form::bsText('col-md-3','col-md-8','Phone', 'broker_phone',null, '') !!}</div>
        <div class="row">{!! Form::bsText('col-md-3','col-md-8','Fax', 'broker_fax',null, '') !!}</div>
    </div>
</fieldset>