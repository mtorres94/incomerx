<div class="container-fluid">
    <div class="col-md-6">
        {!! Form::bsText('col-md-4', 'col-md-8', 'Code', 'code', null, 'Enter the code for the world location') !!}
        {!! Form::bsText('col-md-4', 'col-md-8', 'Name', 'name', null, 'Enter the name for the world location') !!}
        {!! Form::bsText('col-md-4', 'col-md-8', 'Latitude', 'latitude', null, 'Enter the latitude for the world location') !!}
        {!! Form::bsText('col-md-4', 'col-md-8', 'Longitude', 'longitude', null, 'Enter the longitude for the world location') !!}
        {!! Form::bsSelect('col-md-4', 'col-md-8', 'Scheduled D & K', 'scheduled_id', Sass\ScheduleDk::all()->lists('name', 'id'), 'Choose one of the following scheduleds...') !!}
        {!! Form::bsSelect('col-md-4', 'col-md-8', 'Country', 'country_id', Sass\Country::all()->lists('name', 'id'), 'Choose one of the following countries...') !!}
        {!! Form::bsText('col-md-4', 'col-md-8', 'City', 'city', null, 'Enter the city for the world location') !!}
        {!! Form::bsSelect('col-md-4', 'col-md-8', 'State', 'state_id', Sass\State::all()->lists('name', 'id'), 'Choose one of the following states...') !!}
        {!! Form::bsMemo('col-md-4', 'col-md-8', 'Comments', 'comments', null, 2, 'Enter some comments for this world location') !!}
    </div>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-header">Types</div>
            <div class="panel-body">
                <div class="row no-padding-top">
                    <div class="col-md-4">{!! Form::bsCheck('Ocean Port', 'ocean_port') !!}</div>
                    <div class="col-md-4">{!! Form::bsCheck('Airport', 'airport') !!}</div>
                    <div class="col-md-4">{!! Form::bsCheck('Inland Port', 'inland_port') !!}</div>
                </div>
                <div class="row no-padding-top">
                    <div class="col-md-4">{!! Form::bsCheck('Border Crossing', 'border_crossing') !!}</div>
                    <div class="col-md-4">{!! Form::bsCheck('Rail Terminal', 'rail_terminal') !!}</div>
                    <div class="col-md-4">{!! Form::bsCheck('Road Terminal', 'road_terminal') !!}</div>
                </div>
                <div class="row no-padding-top">
                    <div class="col-md-4">{!! Form::bsCheck('Multimodal', 'multimodal') !!}</div>
                    <div class="col-md-4">{!! Form::bsCheck('Fix Transportation', 'fix_transportation') !!}</div>
                    <div class="col-md-4">{!! Form::bsCheck('Post Office', 'post_office') !!}</div>
                </div>
                <div class="row no-padding-top">
                    <div class="col-md-4">{!! Form::bsCheck('City', 'city_') !!}</div>
                    <div class="col-md-4">{!! Form::bsCheck('Place', 'place') !!}</div>
                </div>
            </div>
        </div>
    </div>
</div>