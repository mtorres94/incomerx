<fieldset>
    <div class="row">
        <legend>Delivery/ Inland Carrier Details</legend>
        <div class="col-md-6">
            <div class="row">{!! Form::bsComplete('col-md-3', 'col-md-6', 'Inland Carrier', 'inland_carrier_id', 'inland_carrier_name', Request::get('term'), ((isset($booking_entry) and $booking_entry->inland_carrier_id > 0) ? $booking_entry->inland_carrier->name : null), 'Carriers') !!}</div>
            <div class="row"> {!! Form::bsComplete('col-md-3', 'col-md-6', 'Driver', 'inland_driver_id', 'inland_driver_name', Request::get('term'), ((isset($booking_entry) and $booking_entry->inland_driver_id > 0) ? $booking_entry->inland_driver->name : null), 'Drivers') !!}</div>
            <div class="row"> {!! Form::bsText('col-md-3', 'col-md-6', 'Lic/ ID #', 'inland_lic_number', null, null) !!} </div>
        </div>
        <div class="col-md-6">
            <div class="row">{!! Form::bsMemo(null, null, 'Instructions', 'inland_instruction', null, 2, ' ') !!}</div>
            <div class="row">
                <div class="col-md-4">{!! Form::bsDate(null, null, 'Release Date', 'release_date', null, ' ') !!}</div>
                <div class="col-md-4">{!! Form::bsDate(null, null, 'Loading Date', 'loading_date', null, ' ') !!}</div>
                <div class="col-md-4">{!! Form::bsDate(null, null, 'Cut off Date', 'cut_off_date', null, ' ') !!}</div>
            </div>
        </div>
    </div>

</fieldset>