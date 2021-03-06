
    <div class="form-horizontal">
        <div class="row">

            <div class="col-md-6">
                {!! Form::bsText('col-md-4', 'col-md-8', 'Reference', 'reference', null, 'Reference...') !!}
            </div>
            <div class="col-md-6">
                {!! Form::bsText('col-md-4', 'col-md-8', 'RMA', 'RMA', null, '') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                {!! Form::bsComplete('col-md-4', 'col-md-8', 'Service', 'location_service_id', 'location_service_name', Request::get('term'),
((isset($order_entry) and $order_entry->location_service_id > 0) ? $order_entry->location_service->name : null), 'Services...') !!}
            </div>
            <div class="col-md-6">
                {!! Form::bsComplete('col-md-4', 'col-md-8', 'Origin', 'location_world_location_id', 'location_world_location_name', Request::get('term'),
((isset($order_entry) and $order_entry->location_world_location_id > 0) ? $order_entry->location_world_location->name : null), 'World location...') !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
            {!! Form::bsComplete('col-md-4', 'col-md-8', 'Destination', 'destination_world_location_id', 'destination_world_location_name', Request::get('term'),
((isset($order_entry) and $order_entry->destination_world_location_id > 0) ? $order_entry->destination_world_location->name : null), 'World location...') !!}
            </div>
            <div class="col-md-6">
                {!! Form::bsComplete('col-md-4', 'col-md-8', 'Final Destination', 'final_world_location_id', 'final_world_location_name', Request::get('term'),
((isset($order_entry) and $order_entry->final_world_location_id > 0) ? $order_entry->final_world_location->name : null), 'World location..') !!}
            </div>
</div>
        <div class="row">
            <div class="col-md-12">
            {!! Form::bsComplete('col-md-2', 'col-md-10', 'Fow Agent', 'agent_id', 'agent_name', Request::get('term'), ((isset($order_entry) and $order_entry->agent_id > 0) ? $order_entry->agent->name : null), 'Customers...') !!}
            </div>
        </div>


    </div>

