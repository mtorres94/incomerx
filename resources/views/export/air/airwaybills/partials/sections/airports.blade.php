<div class="col-md-4">
    <div class="row">
            {!! Form::bsComplete('col-md-3', 'col-md-9','Origin ', 'origin_id', 'origin_name', Request::get('term'),((isset($airway_bill) and $airway_bill->origin_id > 0) ? $airway_bill->origin->name : null), 'Airports') !!}
    </div>
    <div class="row">
            {!! Form::bsComplete('col-md-3', 'col-md-9','Destination ', 'destination_id', 'destination_name', Request::get('term'),((isset($airway_bill) and $airway_bill->destination_id > 0) ? $airway_bill->destination->name : null), 'Airports') !!}
    </div>
    <div class="row">
            {!! Form::bsComplete('col-md-3', 'col-md-9','Carrier ', 'carrier_id', 'carrier_name', Request::get('term'),((isset($airway_bill) and $airway_bill->carrier_id > 0) ? $airway_bill->carrier->name : null), 'Carrier') !!}
    </div>
    <div class="row">
        {!! Form::bsText('col-md-3', 'col-md-3', 'Dec. Value', 'dec_value', null, '') !!}
        {!! Form::bsText('col-md-3', 'col-md-3', 'Ins. Value', 'ins_value', null, '') !!}
    </div>
    <div class="row">
            {!! Form::bsText('col-md-3', 'col-md-3', 'Flight', 'flight', null, '') !!}
    </div>
</div>
<div class="col-md-3">
    <div class="row">{!! Form::bsCheck('col-md-2', 'col-md-6','Stand By', 'stand_by', (isset($airway_bill) ? $airway_bill->stand_by : 'off')) !!}</div>
    <div class="row">{!! Form::bsCheck('col-md-2', 'col-md-6','Partial', 'partial', (isset($airway_bill) ? $airway_bill->partial : 'off')) !!}</div>
    <div class="row">{!! Form::bsCheck('col-md-2', 'col-md-6','POD Information', 'pod_information', (isset($airway_bill) ? $airway_bill->pod_information : 'off')) !!}</div>
    <div class="row">{!! Form::bsCheck('col-md-2', 'col-md-6','Confirmed', 'confirmed', (isset($airway_bill) ? $airway_bill->confirmed : 'off')) !!}</div>
</div>





