<fieldset>


  <div class=" row">
      <div class=" col-md-6">
          <legend>Origin </legend>
          <div class="row">
              {!! Form::bsComplete('col-md-3', 'col-md-9','Place of Receipt ', 'location_origin_id', 'location_origin_name', Request::get('term'),((isset($shipment_entry) and $shipment_entry->place_receipt_id > 0) ? $shipment_entry->place_receipt->name : null), 'World Location') !!}
          </div>
          <div class="row">
              {!! Form::bsComplete('col-md-3', 'col-md-9','Port of Loading ', 'loading_port_id', 'loading_port_name', Request::get('term'),((isset($shipment_entry) and $shipment_entry->port_loading_id > 0) ? $shipment_entry->port_loading->name : null), 'Ports') !!}
          </div>
      </div>
      <div class=" col-md-6">
          <legend>Destination</legend>
          <div class="row">
              {!! Form::bsComplete('col-md-3', 'col-md-9','Place of delivery ', 'location_destination_id', 'location_destination_name', Request::get('term'),((isset($shipment_entry) and $shipment_entry->place_delivery_id > 0) ? $shipment_entry->place_delivery->name : null), 'World Location') !!}
          </div>
          <div class="row">
              {!! Form::bsComplete('col-md-3', 'col-md-9','Port of Unloading ', 'unloading_port_id', 'unloading_port_name', Request::get('term'),((isset($shipment_entry) and $shipment_entry->port_unloading_id > 0) ? $shipment_entry->port_unloading->name : null), 'Ports') !!}
          </div>
      </div>

  </div>
</fieldset>