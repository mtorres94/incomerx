{!! Form::bsText('col-md-4', 'col-md-6', 'Code', 'code', null, 'Enter the code for the state') !!}
{!! Form::bsText('col-md-4', 'col-md-6', 'Name', 'name', null, 'Enter the name for the state') !!}
{!! Form::bsComplete('col-md-4', 'col-md-6', 'Country', 'country_id', '_28', Request::get('term'),
    ((isset($state) and $state->country_id > 0) ? $state->country->name : null), 'Countries...') !!}
{!! Form::bsText('col-md-4', 'col-md-3', 'Tax', 'tax', null, 'Enter the tax for the state') !!}
{!! Form::bsText('col-md-4', 'col-md-3', 'Additional tax', 'additional_tax', null, 'Enter the additional tax for the state') !!}
{!! Form::bsMemo('col-md-4', 'col-md-6', 'Comments', 'comments', null, 2, 'Enter some comments for this city') !!}
