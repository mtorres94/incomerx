<fieldset id="Broker">
    <legend>Broker</legend>
    <div class="row">
        <div class="col-md-12">{!! Form::bsComplete('col-md-2', 'col-md-9', 'Name', 'broker_id', 'broker_name', Request::get('term'), ((isset($shipment_entry) and ($shipment_entry->broker_id > 0)) ? $shipment_entry->broker->name : null), 'Customers') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-12">{!! Form::bsText('col-md-2', 'col-md-9', 'Contact', 'broker_contact', null, '') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-6">{!! Form::bsText('col-md-4', 'col-md-6', 'Fax', 'broker_fax', null, '') !!}</div>
        <div class="col-md-6">{!! Form::bsText('col-md-4', 'col-md-6', 'Phone', 'broker_phone', null, '') !!}</div>

    </div>

</fieldset>