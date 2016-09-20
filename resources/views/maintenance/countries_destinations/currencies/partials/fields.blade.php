{!! Form::bsText('col-md-4', 'col-md-6', 'Code', 'code', null, 'Enter the code for the currency') !!}
{!! Form::bsText('col-md-4', 'col-md-6', 'Description', 'name', null, 'Enter the description for the currency') !!}
{!! Form::bsComplete('col-md-4', 'col-md-6', 'Country', 'country_id', '_28', Request::get('term'),
    ((isset($currency) and $currency->country_id > 0) ? $currency->country->name : null), 'Countries...') !!}