<fieldset>
    <div class="row">
        <div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'Vessel', 'vessel_name',null,  '') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-12">{!! Form::bsText('col-md-3', 'col-md-9', 'Voyage', 'voyage_name',null,  '') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! Form::bsDate('col-md-3', 'col-md-3', 'Release Date', 'release_date', null, '') !!}
            {!! Form::bsDate('col-md-3', 'col-md-3', 'Loading Date', 'loading_date', null, '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! Form::bsDate('col-md-3', 'col-md-3', 'Departure', 'departure_date',  null, '') !!}
            {!! Form::bsDate('col-md-3', 'col-md-3', 'Arrival', 'arrival_date',  null, '') !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! Form::bsDate('col-md-3', 'col-md-3', 'Cut Off', 'cut_off_date',  null, '') !!}
        </div>
    </div>
</fieldset>