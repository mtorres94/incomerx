{!! Form::hidden('open_status', (isset($user_open_id) ? ($user_open_id == Auth::user()->id ? "0" : "1") : "0"), ['id' => 'open_status', 'class' => 'form-control input-sm']) !!}
{!! Form::bsText('col-md-4', 'col-md-6', 'Code', 'code', null, 'Enter the code for the currency') !!}
{!! Form::bsText('col-md-4', 'col-md-6', 'Description', 'name', null, 'Enter the description for the currency') !!}
{!! Form::bsComplete('col-md-4', 'col-md-6', 'Country', 'country_id', '_28', Request::get('term'),
    ((isset($currency) and $currency->country_id > 0) ? $currency->country->name : null), 'Countries...') !!}
@section('scripts')
    <script>
    </script>
    @include('maintenance.countries_destinations.currencies.partials.scripts.init')
@stop