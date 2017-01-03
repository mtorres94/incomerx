<fieldset id="Carrier/ Vessel/Voyage">
    <legend>Carrier/Vessel/Voyage</legend>
    <div class="row">
        <div class="col-md-12">
            <div class="row"> {!! Form::bsComplete('col-md-3', 'col-md-9', 'Carrier', 'carrier_id', 'carrier_name', Request::get('term'), ((isset($shipment_entry) and $shipment_entry->carrier_id > 0) ? $shipment_entry->carrier->name : null), 'Carriers') !!} </div>
            <div class="row"> {!! Form::bsText('col-md-3', 'col-md-9', 'Vessel', 'vessel_name', null, '') !!}</div>
            <div class="row"> {!! Form::bsText('col-md-3', 'col-md-9', 'Voyage', 'voyage_name', null, '') !!}</div>

            <div class="row">
                {!! Form::bsDate('col-md-3', 'col-md-4', 'Departure', 'departure_date', null, '') !!}
            </div>
            <div class="row">
                {!! Form::bsDate('col-md-3', 'col-md-4', 'Arrival', 'arrival_date', null, '') !!}
            </div>
            <div class="row">
                {!! Form::bsText('col-md-3', 'col-md-4', 'Booking #', 'booking_code', null, '') !!}
            </div>
            <div class="row">
                {!! Form::bsDate('col-md-3', 'col-md-4', 'Release date', 'release_date', null, '') !!}
            </div>
            <div class="row">
                {!! Form::bsDate('col-md-3', 'col-md-4', 'Loading date', 'loading_date', null, '') !!}
            </div>
            <div class="row">
                {!! Form::bsDate('col-md-3', 'col-md-4', 'Cut off date', 'cut_off_date', null, '') !!}
            </div>

        </div>
    </div>


</fieldset>