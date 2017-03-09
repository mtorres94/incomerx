{!! Form::hidden('open_status', (isset($user_open_id) ? ($user_open_id == Auth::user()->id ? "0" : "1") : "0"), ['id' => 'open_status', 'class' => 'form-control input-sm']) !!}
{!! Form::bsText('col-md-4', 'col-md-6', 'Code', 'code', null, 'Enter the code for the country') !!}
{!! Form::bsText('col-md-4', 'col-md-6', 'Description', 'name', null, 'Enter the description for the country') !!}
{!! Form::bsText('col-md-4', 'col-md-6', 'Zone', 'zone', null, 'Enter the zone for the country') !!}
{!! Form::bsMemo('col-md-4', 'col-md-6', 'Comments', 'comments', null, 4, '') !!}
@section('scripts')
    <script>
    </script>
    @include('maintenance.countries_destinations.countries.partials.scripts.init')
@stop