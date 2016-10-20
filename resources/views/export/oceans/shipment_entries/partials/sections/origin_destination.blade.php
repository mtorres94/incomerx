<fieldset>


  <div class=" row">
      <div class=" col-md-6">
          <legend>Origin </legend>
          <div class="row">
              {!! Form::bsComplete('col-md-3', 'col-md-9','Place of Receipt ', 'place_receipt_id', 'place_receipt_name', Request::get('term'),((isset($shipment_entry) and $shipment_entry->place_receipt_id > 0) ? $shipment_entry->place_receipt->name : null), 'World Location') !!}
          </div>
          <div class="row">
              {!! Form::bsComplete('col-md-3', 'col-md-9','Port of Loading ', 'port_loading_id', 'port_loading_name', Request::get('term'),((isset($shipment_entry) and $shipment_entry->port_loading_id > 0) ? $shipment_entry->port_loading->name : null), 'Ports') !!}
          </div>
      </div>
      <div class=" col-md-6">
          <legend>Destination</legend>
          <div class="row">
              {!! Form::bsComplete('col-md-3', 'col-md-9','Place of delivery ', 'place_delivery_id', 'place_delivery_name', Request::get('term'),((isset($shipment_entry) and $shipment_entry->place_delivery_id > 0) ? $shipment_entry->place_delivery->name : null), 'World Location') !!}
          </div>
          <div class="row">
              {!! Form::bsComplete('col-md-3', 'col-md-9','Port of Unloading ', 'port_unloading_id', 'port_unloading_name', Request::get('term'),((isset($shipment_entry) and $shipment_entry->port_unloading_id > 0) ? $shipment_entry->port_unloading->name : null), 'Ports') !!}
          </div>
      </div>

  </div>
</fieldset>