<fieldset>
    <div class="row">
        <div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'Vessel', 'vessel_name', '') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'Voyage', 'voyage_name', '') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-6">{!! Form::bsDate('col-md-6', 'col-md-6', 'Release Date', 'release_date', '') !!}</div>
        <div class="col-md-6">{!! Form::bsDate('col-md-6', 'col-md-6', 'Loading Date', 'loading_date', '') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-6">{!! Form::bsDate('col-md-6', 'col-md-6', 'Departure', 'departure_date', '') !!}</div>
        <div class="col-md-6">{!! Form::bsDate('col-md-6', 'col-md-6', 'Arrival', 'arrival_date', '') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-6">{!! Form::bsDate('col-md-6', 'col-md-6', 'Cut Off', 'cut_off_date', '') !!}</div>
    </div>
</fieldset>