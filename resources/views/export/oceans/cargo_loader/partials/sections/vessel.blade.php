
    <div class="row">
        {!! Form::bsText('col-md-3', 'col-md-9', 'Vessel', 'vessel_name',null,  '') !!}
    </div>
    <div class="row">
        {!! Form::bsText('col-md-3', 'col-md-9', 'Voyage', 'voyage_name',null,  '') !!}
    </div>
    <div class="row">
            <div class="col-md-6"> {!! Form::bsDate('col-md-6', 'col-md-6', 'Release Date', 'release_date', null, '') !!}</div>
            <div class="col-md-6">{!! Form::bsDate('col-md-6', 'col-md-6', 'Loading Date', 'loading_date', null, '') !!}</div>
    </div>
    <div class="row">
            <div class="col-md-6">{!! Form::bsDate('col-md-6', 'col-md-6', 'Departure', 'departure_date',  null, '') !!}</div>
            <div class="col-md-6">{!! Form::bsDate('col-md-6', 'col-md-6', 'Arrival', 'arrival_date', null, '') !!}</div>
    </div>
    <div class="row">
        <div class="col-md-6">{!! Form::bsDate('col-md-6', 'col-md-6', 'Cut off', 'cut_off_date', null, '') !!}</div>
    </div>
