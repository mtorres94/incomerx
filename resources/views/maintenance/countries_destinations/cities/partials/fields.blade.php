{!! Form::hidden('open_status', (isset($user_open_id) ? ($user_open_id == Auth::user()->id ? "0" : "1") : "0"), ['id' => 'open_status', 'class' => 'form-control input-sm']) !!}
{!! Form::bsText('col-md-4', 'col-md-6', 'Code', 'code', null, 'Enter the code for the city') !!}
{!! Form::bsText('col-md-4', 'col-md-6', 'Description', 'name', null, 'Enter the description for the city') !!}
{!! Form::bsComplete('col-md-4', 'col-md-6', 'Country', 'country_id', '_28', Request::get('term'),
    ((isset($city) and $city->country_id > 0) ? $city->country->name : null), 'Countries...') !!}
{!! Form::bsMemo('col-md-4', 'col-md-6', 'Comments', 'comments', null, 4, 'Enter some comments for this city') !!}
@section('scripts')
    <script>
    </script>
    @include('maintenance.countries_destinations.cities.partials.scripts.init')
@stop