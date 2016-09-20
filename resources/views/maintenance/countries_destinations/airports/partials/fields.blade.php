{!! Form::bsText('col-md-4', 'col-md-6', 'Code', 'code', null, 'Enter the code for the airport') !!}
{!! Form::bsText('col-md-4', 'col-md-6', 'Description', 'name', null, 'Enter the name for the airport') !!}
{!! Form::bsComplete('col-md-4', 'col-md-6', 'Country', 'country_id', '_28', Request::get('term'),
    ((isset($airport) and $airport->country_id > 0) ? $airport->country->name : null), 'Countries...') !!}
{!! Form::bsText('col-md-4', 'col-md-6', 'Zip Code', 'zip', null, 'Enter the zip code for the airport') !!}
{!! Form::bsSelect('col-md-4', 'col-md-6', 'Type', 'type', array('1' => 'INTERNATIONAL', 2 => 'DOMESTIC'), 'Choose one of the following types...') !!}
{!! Form::bsComplete('col-md-4', 'col-md-6', 'Schedule D & K', 'scheduled_id', '_58', Request::get('term'),
    ((isset($airport) and $airport->scheduled_id > 0) ? $airport->scheduled->name : null), 'Schedule D & K...') !!}
{!! Form::bsMemo('col-md-4', 'col-md-6', 'Comments', 'comments', null, 2, 'Enter some comments for this airport') !!}
